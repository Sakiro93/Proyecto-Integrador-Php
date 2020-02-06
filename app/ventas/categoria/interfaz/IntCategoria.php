<?php
/**
 * Description of IntCategoria
 *
 * @author DocenteUNEMI
 */
interface IntCategoria {
    function crear(\EntCategoria  $categoria);
    function editar(\EntCategoria $categoria);
    function eliminar($id,$uid);
    function listar();
    function buscar($id);

}
