<?php

class CtrCategoria {

    private $model;
    private $dao;

    function __construct() {
        
        require '../modulobase/parametros.php';        
        require '../modulobase/DataConection.php';
        require 'categoria/entidad/EntCategoria.php';
        require 'categoria/interfaz/IntCategoria.php';
        require 'categoria/dao/DaoCategoria.php';        
        $this->model = new EntCategoria();
        $this->dao = new DaoCategoria();  
        
    }

    public function view($uid=null) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['action'])) { // PETICIONES USANDO AJAX           
                $frm = (object) $_POST;

                switch ($frm->action) {
                    case 'nuevo':
                        $this->model = new EntCategoria(0, $frm->nombre,$uid);
                        if ($this->dao->crear($this->model)) {
                            die('{"resp" : true}');
                        }
                        echo '{"resp" : false,"error" : "El registro no se guardo"}';
                        break;

                    case 'editar':

                        $this->model = new EntCategoria($frm->id, $frm->nombre,$uid, $frm->estado ? true : false);
                        if ($this->dao->editar($this->model)) {
                            die('{"resp" : true}');
                        }
                        echo '{"resp" : false,"error" : "El registro no se Edito"}';
                        break;

                    case 'eliminar':
                        if ($this->dao->eliminar($frm->id,$uid)) {
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
                //mostramos formulario 
                require 'categoria/vista/form.php';
            } else {
                if (isset($_GET['q'])) { //question de busqueda
                    $q = $_GET['q'];
                    $this->dao->where = $q;
                }
                //mostramos el listado de registros
                require 'categoria/vista/listado.php';
            }
        }
    }

}
