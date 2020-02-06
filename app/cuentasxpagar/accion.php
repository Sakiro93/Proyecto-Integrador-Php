<?php
require '../seguridad/usuario/entidad/EntUsuario.php';
if (session_id() == '') {
    session_start();
}
$user = $_SESSION['_USER_'];

if (isset($_POST['model'])) {    
      switch ($_POST['model']) {       
        case 'categoria':
            require 'categoria/controlador/CtrCategoria.php';
            $ctrcategoria = new CtrCategoria();
            $ctrcategoria->view($user->usuId);
            break;
        case 'grupo':
            
            require 'grupo/controlador/CtrGrupo.php';
            $ctrgrupo = new CtrGrupo;           
            $ctrgrupo->view($user->usuId);
            break;

        
        case 'pagos':
            require './pagos/controlador/CtrPagos.php';
            $ctrpagos = new CtrPagos;           
            $ctrpagos->view($user->usuId);
            break;
        
        default:
            break;
    }
}
echo '{"error":"Parametros incorrectos.."}';
