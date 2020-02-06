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
interface IntVenta {
    function crearVenta(\EntCabVenta  $venta);
    function crearDetalle(\EntDetVenta  $detalle);
    function listarCli();
    function listarArt();
    function listarPlanCuenta();
    function listar();
    function buscar($id);
    function actualizarStock($id,$cantidad);
    function crearLibroGlosa(\EntCabVenta  $venta);
    function auditoria($id,$accion,$usuId);
}
