<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author DocenteUNEMI
 */
interface IntPagos {

    function crearDeuda(\EntCabPagos $pagos);

    function crearDetalle(\EntDetPagos $detalle);

    function listarCli();

    function listarCompras($id);

    function listarArt();

    function listarFac();

    function listarPlanCuenta();

    function listar();

    function listarProv($id);

    function listarDetalle($id);

    function buscar($id);

    function buscarDetalle($id);

    function actualizarStock($id, $cantidad);

    function crearLibroGlosa(\EntCabCompra $pagos);

    function auditoria($id, $accion, $usuId);
}
