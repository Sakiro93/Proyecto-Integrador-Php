<?php 
require '../seguridad/usuario/entidad/EntUsuario.php';
require '../seguridad/validarsession.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../static/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>                
        <link href="../../static/css/table.css" rel="stylesheet" type="text/css"/>        
    </head>
    <body>
        <?php
        
        require '../header.php';
        require 'categoria/controlador/CtrCategoria.php';
        $ctrcategoria = new CtrCategoria();
        $ctrcategoria->view();
        ?>
        <script src="../../static/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../../static/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/accion.js" type="text/javascript"></script>
          
    </body>
</html>
