<?php

interface IntTipoUsuario {

    function crear(\Tipo_usuario $tipoUsuario);

    function editar(\Tipo_usuario $tipoUsuario);

    function eliminar($id);

    function listar();

    function buscar($id);
    
}
