<?php
/**
 * Description of IntCategoria
 *
 * @author DocenteUNEMI
 */
interface IntGrupo {
    function crear(\EntGrupo  $grupo);
    function editar(\EntGrupo $grupo);
    function eliminar($id,$uid);
    function listar();
    function buscar($id);

}
