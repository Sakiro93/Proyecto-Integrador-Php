<?php

class CtrGrupo {

    private $model;
    private $dao;

    function __construct() {
        require '../modulobase/parametros.php';
        require '../modulobase/DataConection.php';
        require 'grupo/entidad/EntGrupo.php';
        require 'grupo/interfaz/IntGrupo.php';
        require 'grupo/dao/DaoGrupo.php';
        $this->model = new EntGrupo;
        $this->dao = new DaoGrupo;
    }

    public function view($usid = null) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['action'])) { // PETICIONES USANDO AJAX           
                $frm = (object) $_POST;

                switch ($frm->action) {
                    case 'nuevo':

                        $this->model = new EntGrupo(0, $frm->nombre,$frm->categId, $usid, $usid);

                        if ($this->dao->crear($this->model)) {
                            die('{"resp" : true}');
                        }
                        echo '{"resp" : false,"error" : "El registro no se guardo"}';
                        break;

                    case 'editar':

                        $this->model = new EntGrupo($frm->id, $frm->nombre, $frm->categId, $usid, $usid, $frm->estado ? true : false);

                        if ($this->dao->editar($this->model)) {
                            die('{"resp" : true}');
                        }
                        echo '{"resp" : false,"error" : "El registro no se Edito"}';
                        break;

                    case 'eliminar':
                        if ($this->dao->eliminar($frm->id, $usid)) {
                            die('{"resp" : true}');
                        }
                        echo '{"resp" : false,"error" : "El registro no se a podido Eliminar"}';
                }
            }
        } else {
            //acciones por GET
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                if ($action == 'editar') {
                    // si es editar creamos el objeto modelo
                    $id = intval($_GET['id']);
                    $this->model = $this->dao->buscar($id);
                }

                require 'categoria/entidad/EntCategoria.php';
                require 'categoria/interfaz/IntCategoria.php';
                require 'categoria/dao/DaoCategoria.php';
                $daoCateg = new DaoCategoria();
                $categorias = $daoCateg->listar();
                require 'grupo/vista/form.php';
                
            } else {
                if (isset($_GET['q'])) { //question de busqueda
                    $q = $_GET['q'];
                    $this->dao->where = $q;
                }
                //mostramos el listado de registros
                require 'grupo/vista/listado.php';
            }
        }
    }

}
