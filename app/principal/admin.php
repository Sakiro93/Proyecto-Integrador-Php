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
    </head>
    <body>        
        <?php require 'header.php'; ?>
        
        <article id="content">
            <div class="container">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading "><h4>Modulos del Sistema</h4></div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row-fluid" id="menu">
                                <a href="../ventas/venta.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/usuario.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Ventas</h4>
                                            <span class="icondesc">Registro de Ventas</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="./wcategoriaPersonal.php?action=tabla" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/ct5.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Categoria Personal</h4>
                                            <span class="icondesc">Administración de Categoria Personal</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="wpersonal.php?action=tabla" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/per.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Personal</h4>
                                            <span class="icondesc">Administración de Personal</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="wproveedorContacto.php?action=tabla" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/pc1.jpeg" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Proveedor Contacto</h4>
                                            <span class="icondesc">Administración de Proveedor Contacto</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="warticulo.php?action=tabla" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/cacao.jpg" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Prod. Cacaos</h4>
                                            <span class="icondesc">Administración de Prod. Cacaos</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="../ventas/categoria.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/fondo3.JPG" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Categorias De Articulos </h4>
                                            <span class="icondesc">Administración de Categorias De Articulos</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="../ventas/grupo.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/ciudad5.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Grupo</h4>
                                            <span class="icondesc">Administración de Grupos</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="wprovincia.php?action=tabla" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/provincia1.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Provincia</h4>
                                            <span class="icondesc">Administración de Provincias</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="wcliente.php?action=tabla" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/cliente.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Clientes</h4>
                                            <span class="icondesc">Administración de Clientes</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="wproveedor.php?action=tabla" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/proveedor.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Proveedores</h4>
                                            <span class="icondesc">Administración de Proveedores</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="../../app/vista/vVentaEstable.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/caja.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Punto de venta</h4>
                                            <span class="icondesc">Facturación de Articulos</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="../../app/vista/vCompra.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/compra2.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Punto de Compra</h4>
                                            <span class="icondesc">Compra de Articulos</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="../../app/reporte/vReportesEstable.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/reporte.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Reportes</h4>
                                            <span class="icondesc">Administracón de Reportes</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="../../app/reporte/vReportesTop.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/top1.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Top Clientes</h4>
                                            <span class="icondesc">Reportes de Clientes en Ventas</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="../../app/cuentasxpagar/pagos.php" class="icon well sbox">
                                    <div class="iconimage">
                                        <div class="pd">
                                            <img src="../../static/img/menu/reporte.png" border="0">
                                        </div>
                                    </div>
                                    <div class="iconname">
                                        <div class="pd">
                                            <h4 class="tituloicon">Cuentas por Pagar</h4>
                                            <span class="icondesc">Administracón de Cuentas por Pagar</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <script src="../../static/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../../static/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
