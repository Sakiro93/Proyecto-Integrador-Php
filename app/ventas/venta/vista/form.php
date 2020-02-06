<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Entidad</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body role="document">

        <article id="content">
            <div class="container-fluid">

                <div class="row-fluid">
                    <div class="span12">
                        <ul class="breadcrumb">
                            <li><a href="../principal/admin.php">Inicio</a><span class="divider"></span></li>
                            <li><a href="/ventas/" class="active">ventas</a> <span class="divider">/</span></li>
                        </ul>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-offset-0">

                        <div class="lock-screen-wrapper">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <img src="../../static/img/menu/cta2.png" class="img-circle" width="70">
                                    Registro y Control de Venta
                                </div>
                                <div class="panel-body">
                                    <div class="container-fluid">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <fieldset style="font-family: arial">
                                                    <legend style="font-size: 15px;font-weight: bold">Datos Vendedor
                                                    </legend>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="form-group">
                                                                <label>Vendedor</label>
                                                                <input type="hidden" id="vendedor" value="<?php $user . id ?>">
                                                                <input id="fecha" value="<?php $user . username ?>" readonly
                                                                       class="form-control" type="text"
                                                                       placeholder="Vendedor"/>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-2">
                                                            <div class="form-group">
                                                                <label>Forma de Pago</label>
                                                                <select class="form-control chosen-select" id="cbformpago">
                                                                    <option>Seleccione Plan de Cuenta</option>
                                                                    <?php foreach ($this->dao->listarPlanCuenta() as $fp): ?>
                                                                        <option  value="<?= $fp->plcCuenta ?>" ><?= $fp->plcDescripcion ?> </option>
                                                                    <?php endforeach; ?>
                                                                    <!--       
                                                                   {% for fp in cuentas %}
                                                                       <option value="{{ fp.plcCuenta }}">{{ fp.plcDescripcion }}</option>
                                                                   {% endfor %}-->
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-2">
                                                            <div class="form-group">
                                                                <label>Fecha</label>
                                                                <input id="fecha" value="<?= date("Y-m-d") ?>" disabled
                                                                       class="form-control" type="text"
                                                                       placeholder="Fecha"/>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <legend style="font-size: 15px;font-weight: bold">Datos del Cliente
                                                    </legend>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="form-group">
                                                                <label>Cliente</label>
                                                                <select class="chosen-select form-control" id="cbcliente"
                                                                        data-placeholder="Seleccione Cliente">
                                                                    <option value="">Seleccione Cliente</option>
                                                                    <?php foreach ($this->dao->listarCli() as $cli): ?>
                                                                        <option data-cjson='<?= $cli ?>' value="<?= $cli->cliId ?>" ><?= $cli->cliNombre ?> </option>
                                                                    <?php endforeach; ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2">
                                                            <div class="form-group">
                                                                <label>RUC</label>
                                                                <input id="ruc" disabled class="form-control" type="text"
                                                                       placeholder="RUC"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <input id="direccion" disabled class="form-control"
                                                                       type="text"
                                                                       placeholder="Dirección"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <legend style="font-size: 15px;font-weight: bold">Datos del Articulo.
                                                    </legend>

                                                    <div class="well well-sm">
                                                        <div class="row">
                                                            <form id="frm-additem">
                                                                <div class="col-xs-1">
                                                                    <input id="art-cod" class="form-control" type="text"
                                                                           placeholder="Codigo" readonly/>
                                                                </div>
                                                                <div class="col-xs-5">
                                                                    <select class="chosen-select form-control" id="cbarticulo"
                                                                            data-placeholder="Seleccione Articulo">
                                                                        <option value="">Seleccione Articulo</option>
                                                                        <?php foreach ($this->dao->listarArt() as $a): ?>
                                                                            <option data-ajson='<?= $a ?>' value="<?= $a->artid ?>" ><?= $a->artdescripcion ?> </option>
                                                                        <?php endforeach; ?>
                                                                        <!--    
                                                                        {% for a in articulos %}
                                                                            <option value="{{ a.id }}"
                                                                                    data-ajson='{"id":"{{ a.id }}","codigo":"{{ a.artCodBar }}","precio":"{{ a.artPvp }}","coniva":"{{ a.artIva }}","stock":"{{ a.artStock }}"}'>{{ a.artDescripcion }}</option>
                                                                        {% endfor %}
                                                                        -->
                                                                    </select>
                                                                </div>

                                                                <div class="col-xs-1">
                                                                    <input id="art-cantidad" class="form-control"
                                                                           type="number" placeholder="Cant"/>
                                                                </div>

                                                                <div class="col-xs-1">
                                                                    <input id="art-stock" class="form-control"
                                                                           type="text" placeholder="Stock" readonly/>
                                                                </div>

                                                                <div class="col-xs-2">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"
                                                                              id="basic-addon1">S/.</span>
                                                                        <input id="art-precio" readonly
                                                                               class="form-control" type="text"
                                                                               placeholder="Precio"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-1">
                                                                    <button class="btn btn-primary form-control"
                                                                            id="btn-agregar">
                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <table class="table table-hover table-bordered table-responsive table-striped"
                                                                   id="tdatos">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Cod</th>
                                                                        <th>Descripción</th>
                                                                        <th>Precio</th>
                                                                        <th>Cantidad</th>
                                                                        <th>Desc.</th>
                                                                        <th>ConIva</th>
                                                                        <th>Total</th>
                                                                        <th>Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tdetalle">

                                                                </tbody>
                                                            </table>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xs-4 col-lg-offset-8">
                                                                <div class="panel panel-info">
                                                                    <div class="panel-heading">
                                                                        <strong class="panel-title">Total a Pagar</strong>
                                                                    </div>
                                                                    <div class="panel-body" style="min-height: 250px">
                                                                        <table class="totales col-xs-offset-1" style="display: block">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-right">
                                                                                        <strong>SUBTOTAL: </strong>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="glyphicon glyphicon-usd"></i>
                                                                                            </span>
                                                                                            <input id="id_msubtotal" readonly="" class="form-control"
                                                                                                   type="text" placeholder="0.00" style="font-weight: bold">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-right">
                                                                                        <strong>DESC: </strong>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="glyphicon glyphicon-usd"></i>
                                                                                            </span>
                                                                                            <input id="id_mdescuento" class="form-control"
                                                                                                   type="text" placeholder="0.00" style="font-weight: bold">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-right">
                                                                                        <strong>IVA: </strong>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="glyphicon glyphicon-usd"></i>
                                                                                            </span>
                                                                                            <input id="id_miva" readonly="" class="form-control"
                                                                                                   type="text" placeholder="0.00" style="font-weight: bold">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td class="text-right">
                                                                                        <strong>TOTAL: </strong>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="glyphicon glyphicon-usd"></i>
                                                                                            </span>
                                                                                            <input id="id_mtotal" readonly="" class="form-control"
                                                                                                   type="text" placeholder="0.00" style="font-weight: bold">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                            <tfoot id="id_cont_efectivo">

                                                                                <tr>
                                                                                    <td class="text-right">
                                                                                        <strong>PAGO: </strong>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="glyphicon glyphicon-usd"></i>
                                                                                            </span>
                                                                                            <input id="id_pagado" class="form-control"
                                                                                                   type="text" placeholder="0.00" style="font-weight: bold">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-right">
                                                                                        <strong>CAMBIO: </strong>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="glyphicon glyphicon-usd"></i>
                                                                                            </span>
                                                                                            <input id="id_cambio" class="form-control"
                                                                                                   type="text" placeholder="0.00" style="font-weight: bold" readonly>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="well well-sm">
                                                        <div class="row">
                                                            <div class="col-xs-3 col-lg-offset-9">
                                                                <button type="button" class="btn btn-danger" id="cancelar"
                                                                        onclick="window.location ='{{ ruta }}'">
                                                                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                                                                    Cancelar
                                                                </button>

                                                                <button id="btn-registrar" class="btn btn-success"
                                                                        type="submit">
                                                                    <span id="loading"
                                                                          class="glyphicon glyphicon-save"></span>
                                                                    <span id="caption"><strong>Registrar
                                                                            Venta</strong></span>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </fieldset>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="container-fluid">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </article>
        <footer>

        </footer>

        <script src="../../static/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script>
                                                                            var iva = <?= IVA ?>;
                                                                            var descuento = <?= DESCUENTO ?>;

                                                                            $(function () {

                                                                                $('.chosen-select').chosen();

                                                                                $('#cbcliente').change(function () {
                                                                                    var option = $('#cbcliente option:selected');
                                                                                    if (option.val() !== '') {
                                                                                        var cliente = option.data('cjson');
                                                                                        $('#ruc').val(cliente.ruc);
                                                                                        $('#direccion').val(cliente.direccion);
                                                                                    } else {
                                                                                        $('#ruc').val('RUC');
                                                                                        $('#direccion').val('Direccion');
                                                                                    }
                                                                                });

                                                                                $('#cbcliente').change();

                                                                                $('#cbarticulo').change(function () {
                                                                                    var option = $('#cbarticulo option:selected');
                                                                                    if (option.val() !== '') {
                                                                                        var articulo = option.data('ajson');
                                                                                        $('#art-cod').val(articulo.artCodBar);
                                                                                        $('#art-cantidad').val(1);
                                                                                        $('#art-precio').val(articulo.artPvp);
                                                                                        $('#art-stock').val(articulo.artstock);
                                                                                    } else {
                                                                                        $('#art-cod').val('');
                                                                                        $('#art-cantidad').val('');
                                                                                        $('#art-precio').val('');
                                                                                    }
                                                                                });

                                                                                $('#frm-additem').submit(function (e) {
                                                                                    e.preventDefault();

                                                                                    var option = $('#cbarticulo option:selected');
                                                                                    var cantidad = parseInt($('#art-cantidad').val());

                                                                                    if (option.val() !== '' && cantidad > 0) {

                                                                                        var data = option.data('ajson');
                                                                                        var stock = parseInt(data.artstock);

                                                                                        if (cantidad > stock) {
                                                                                            alert('Cantidad Supera el Stock');
                                                                                            return;
                                                                                        }

                                                                                        var item = new Object();
                                                                                        item.id = data.artid;
                                                                                        item.codigo = data.artCodBar;
                                                                                        item.precio = parseFloat(data.artPvp);
                                                                                        item.descripcion = option.text();
                                                                                        item.cantidad = cantidad;
                                                                                        item.stock = stock;
                                                                                        item.coniva = data.artiva == true ? true : false;
                                                                                        //alert(data.artiva == true?'aki con iva':'aki sin iva');
                                                                                        if (app.validarStock(item)) {
                                                                                            app.add(item);
                                                                                        } else {
                                                                                            alert('Cantidad Supera el Stock');
                                                                                        }
                                                                                    }
                                                                                });


                                                                                $('#btn-registrar').click(function () {

                                                                                    if (app.venta.items.length > 0 && app.venta.total > 0) {

                                                                                        if ($('#cbcliente').val()) {

                                                                                            app.venta.formapago = $('#cbformpago').val();
                                                                                            app.venta.vendedor = $('#vendedor').val();
                                                                                            app.venta.cliente = $('#cbcliente').val();
                                                                                            app.venta.fecha = $('#fecha').val();
                                                                                            
                                                                                            $.ajax({
                                                                                                url: 'accion.php',
                                                                                                data: {action: 'nuevo', model: 'venta', venta: JSON.stringify(app.venta)},
                                                                                                method: 'POST',
                                                                                                dataType: 'json',
                                                                                                async: false,
                                                                                            }).done(function (data) {
                                                                                                //console.log(data);
                                                                                                //console.log(data);
                                                                                                //alert('lo que viene:  '+data.resp);
                                                                                                if (data.resp === true) {
                                                                                                    alert('Registro Guardado');
                                                                                                    window.location.reload();
                                                                                                } else {
                                                                                                    alert(data.mensaje);
                                                                                                }
                                                                                            }).fail(function (jqXHR, textStatus) {
                                                                                                alert(textStatus);
                                                                                            });
                                                                                        } else {
                                                                                            alert('Debe Seleccionar Cliente');
                                                                                        }
                                                                                    } else {
                                                                                        alert('Debe Ingresar Articulos al Detalle');
                                                                                    }
                                                                                });
                                                                            });

                                                                            var app = {
                                                                                venta: {
                                                                                    //cabecera
                                                                                    fecha: '',
                                                                                    formapago: 0,
                                                                                    vendedor: 0,
                                                                                    cliente: 0,
                                                                                    subtotal: 0,
                                                                                    descuento: 0,
                                                                                    iva: 0,
                                                                                    total: 0,
                                                                                    //detalle
                                                                                    items: []
                                                                                },

                                                                                add: function (item) {

                                                                                    if (!this.existe(item)) {
                                                                                        item.subtotal = item.cantidad * item.precio;
                                                                                        item.descuento = item.subtotal * descuento;

                                                                                        if (item.coniva == true) {
                                                                                            item.iva = (item.subtotal - item.descuento) * iva;
                                                                                        } else {
                                                                                            item.iva = 0;
                                                                                        }
                                                                                        item.total = (item.subtotal - item.descuento) + item.iva;
                                                                                        this.venta.items.push(item);
                                                                                    }

                                                                                    this.actualizar();
                                                                                    this.presentar();
                                                                                    return true;
                                                                                },

                                                                                eliminar: function (id) {
                                                                                    for (var i in this.venta.items) {
                                                                                        if (this.venta.items[i].id == id) {
                                                                                            this.venta.items.splice(i, 1);
                                                                                            this.actualizar();
                                                                                            this.presentar();
                                                                                            return true;
                                                                                        }
                                                                                    }
                                                                                    return false;
                                                                                },

                                                                                existe: function (item) {

                                                                                    for (var i in this.venta.items) {

                                                                                        if (item.id == this.venta.items[i].id) {

                                                                                            this.venta.items[i].cantidad += item.cantidad;
                                                                                            this.venta.items[i].precio = item.precio;
                                                                                            this.venta.items[i].subtotal = this.venta.items[i].cantidad * item.precio;
                                                                                            this.venta.items[i].descuento = this.venta.items[i].subtotal * descuento;

                                                                                            if (item.coniva == true) {
                                                                                                this.venta.items[i].iva = (this.venta.items[i].subtotal - this.venta.items[i].descuento) * iva;
                                                                                            } else {
                                                                                                this.venta.items[i].iva = 0;
                                                                                            }

                                                                                            this.venta.items[i].total = (this.venta.items[i].subtotal - this.venta.items[i].descuento) + this.venta.items[i].iva;
                                                                                            return true;
                                                                                        }
                                                                                    }
                                                                                    return false;
                                                                                },

                                                                                actualizar: function () {
                                                                                    this.venta.subtotal = 0;
                                                                                    this.venta.iva = 0;
                                                                                    this.venta.descuento = 0;
                                                                                    this.venta.total = 0;

                                                                                    for (var item of this.venta.items) {
                                                                                        this.venta.subtotal += item.subtotal;
                                                                                        this.venta.descuento += item.descuento;
                                                                                        this.venta.iva += item.iva;
                                                                                        this.venta.total += item.total;
                                                                                    }

                                                                                    $('#id_msubtotal').val(this.venta.subtotal.toFixed(2));
                                                                                    $('#id_mdescuento').val(this.venta.descuento.toFixed(2));
                                                                                    $('#id_miva').val(this.venta.iva.toFixed(2));
                                                                                    $('#id_mtotal').val(this.venta.total.toFixed(2));

                                                                                },
                                                                                presentar: function () {
                                                                                    $('#tdetalle').html('');
                                                                                    for (var item of this.venta.items) {
                                                                                        var tr = '<tr>';
                                                                                        tr += '<td>' + item.codigo + '</td>';
                                                                                        tr += '<td>' + item.descripcion + '</td>';
                                                                                        tr += '<td>' + item.precio + '</td>';
                                                                                        tr += '<td>' + item.cantidad + '</td>';
                                                                                        tr += '<td>' + item.descuento.toFixed(2) + '</td>';
                                                                                        var icon = item.coniva ? 'ok-sign' : 'remove';
                                                                                        tr += '<td><i class="glyphicon glyphicon-' + icon + '"></i></td>';
                                                                                        tr += '<td>' + item.total.toFixed(2) + '</td>';
                                                                                        tr += '<td><button onclick="app.eliminar(' + item.id + ')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> ELiminar</button></td>';
                                                                                        tr += '</tr>';
                                                                                        $('#tdetalle').append(tr);
                                                                                    }
                                                                                },
                                                                                validarStock: function (item) {
                                                                                    for (var a of this.venta.items) {
                                                                                        if (item.id == a.id) {
                                                                                            return (a.cantidad + item.cantidad) > a.stock ? false : true;
                                                                                        }
                                                                                    }
                                                                                    return true;
                                                                                }
                                                                            }

        </script>
    </body>