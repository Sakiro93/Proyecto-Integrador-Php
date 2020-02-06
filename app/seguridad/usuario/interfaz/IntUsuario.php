<?php

/**
 *
 * @author DocenteUNEMI
 */
interface IntUsuario {

    function add(Usuario $user);

    function editar(Usuario $user);

    function eliminar($id);

    function buscar($id);

    function login($cuenta, $passw);

    function listar();

}
