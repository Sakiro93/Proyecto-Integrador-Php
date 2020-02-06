<?php

/**
 * Description of CtrUsuario
 *
 * @author DocenteUNEMI
 */
class CtrLogin {

    private $model;
    private $dao;

    public function __construct() {
        
        require '../modulobase/parametros.php';      
        require '../modulobase/DataConection.php';

        require '../seguridad/usuario/interfaz/IntUsuario.php';        
        require '../seguridad/usuario/entidad/EntUsuario.php';        
        require '../seguridad/usuario/dao/DaoUsuario.php';      

        $this->model = new EntUsuario();
        $this->dao = new DaoUsuario();
    }

    public function view() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['action'])) {

                $cuenta = $_POST['cuenta'];
                $passw = $_POST['clave'];

                $this->model = $this->dao->login($cuenta, $passw);
                if (is_object($this->model)) {
                    if (session_id() == '') {
                        session_start();
                    }
                    $_SESSION['_USER_'] = $this->model;
                    die('{"resp":true}');
                }
                echo '{"resp":false}';
            }
        }
    }

}
