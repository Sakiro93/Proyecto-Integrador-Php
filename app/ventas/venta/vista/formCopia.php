<article id="content">
    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span12">
                <ul class="breadcrumb">
                    <li><a href="/">Inicio</a><span class="divider"></span></li>
                    <li><a href="/ventas/" class="active">ventas</a> <span class="divider">/</span></li>
                </ul>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 col-sm-offset-0">

                <div class="lock-screen-wrapper">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <img src="../static/img/menu/caja.png" class="img-circle" width="70">
                            Registro y Control de 
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
                                                        <select class="chosen-select form-control" id="cbvendedor"
                                                                data-placeholder="Seleccione Vendedor">
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-2">
                                                    <div class="form-group">
                                                        <label>Forma de Pago</label>
                                                        <select class="form-control" id="cbformpago">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-2">
                                                    <div class="form-group">
                                                        <label>Fecha</label>
                                                        <input id="fecha" value="" disabled
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
                                                            <?php foreach ($this->dao->listarCli() as $cli): ?>
                                                                    <option data-cjson='<?=$cli?>' value="<?= $cli->cliId ?>" ><?= $cli->cliNombre ?> </option>
                                                             <?php endforeach;?>
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
                                                        <div class="col-xs-2">
                                                            <input id="art-cod" class="form-control" type="text"
                                                                   placeholder="Codigo" readonly/>
                                                        </div>
                                                        <div class="col-xs-5">
                                                            <select class="chosen-select form-control" id="cbarticulo"
                                                                    data-placeholder="Seleccione Articulo">
                                                                <option value="">Seleccione Articulo</option>
                                                                <?php foreach ($this->dao->listarArt() as $art): ?>
                                                                    <option data-ajson='<?=$art?>' value="<?= $art->artid ?>" ><?= $art->artdescripcion ?> </option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>

                                                        <div class="col-xs-1">
                                                            <input id="art-cantidad" class="form-control"
                                                                   type="number" placeholder="Cant"/>
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
                                                            <th>Total</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="tdetalle">
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
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
                                                    <div class="col-xs-2">
                                                        <button id="btn-registrar" class="btn btn-success"
                                                                type="submit">
                                                                <span id="loading"
                                                                      class="glyphicon glyphicon-save"></span>
                                                                <span id="caption"><strong>Registrar
                                                                    Venta</strong></span>
                                                        </button>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <button type="button" class="btn btn-danger" id="cancelar"
                                                                onclick="window.location='{{ ruta }}'">
                                                            <span class="glyphicon glyphicon-circle-arrow-left"></span>
                                                            Cancelar
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
 
    var iva =<?=IVA?>;
    var descuento = <?=DESCUENTO?>;

    $(function () {
               
        $('.chosen-select').chosen();

        $('#cbcliente').change(function () {
            var cliente = $('#cbcliente option:selected').data('cjson');
            $('#ruc').val(cliente.ruc);
            $('#direccion').val(cliente.direccion);
        });

        $('#cbcliente').change();

        $('#cbarticulo').change(function () {
            var option = $('#cbarticulo option:selected');
            if (option.val() != '') {
                var articulo = option.data('ajson');
                $('#art-cod').val(articulo.artid);
                $('#art-cantidad').val(1);
                $('#art-precio').val(articulo.artPvp);
            } else {
                $('#art-cod').val('');
                $('#art-cantidad').val('');
                $('#art-precio').val('');
            }
        });

        $('#frm-additem').submit(function (e) {
            e.preventDefault();
            var option = $('#cbarticulo option:selected');

            if (option.val() != '') {

                var data = option.data('ajson');

                var item = new Object();
                item.id = data.id;
                item.codigo = data.codigo;
                item.precio = parseFloat(data.precio);
                item.descripcion = option.text();
                item.cantidad = parseInt($('#art-cantidad').val());
                item.coniva = Boolean(data.coniva);

                app.add(item);
                console.log(app.venta);
            }
            return false;
        });


        $('#btn-registrar').click(function(){

            app.venta.formapago = $('#cbformpago').val();
            app.venta.vendedor = $('#cbvendedor').val();
            app.venta.cliente = $('#cbcliente').val();
            app.venta.fecha = $('#fecha').val();


            $.ajax({
                url: '/ventas/venta/',
                data: { 'action': 'add',venta : JSON.stringify(app.venta)},
                method: 'POST',
                dataType: 'json',
                async: false,
            }).done(function (data) {
                console.log(data);
                if(data.resp == true){

                }
            });
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

                if (item.coniva== true) {
                    item.iva = item.subtotal * iva;
                } else {
                    item.iva = 0;
                }

                item.total = item.subtotal + item.iva;
                this.venta.items.push(item);
            }
            this.actualizar();
            this.presentar();
            return true;
        },

        eliminar: function (id) {
            for (var i in this.venta.items) {
                if (this.venta.items[i].id == id) {
                    this.venta.items.splice(i,1)
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

                    if (item.coniva == true) {
                        this.venta.items[i].iva = this.venta.items[i].subtotal * iva;
                    } else {
                        this.venta.items[i].iva = 0;
                    }

                    this.venta.items[i].total = this.venta.items[i].subtotal + this.venta.items[i].iva;
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

            for (let item of this.venta.items) {
                this.venta.subtotal += item.subtotal;
                this.venta.iva += item.iva;
                this.venta.total += item.total;
            }
            this.venta.descuento = this.venta.total * descuento;
            this.venta.total -=this.venta.descuento;

            $('#id_msubtotal').val(this.venta.subtotal.toFixed(2));
            $('#id_miva').val(this.venta.iva.toFixed(2));
            $('#id_mtotal').val(this.venta.total.toFixed(2));
            $('#id_mdescuento').val(this.venta.descuento.toFixed(2));
        },
        presentar: function () {
            $('#tdetalle').html('');
            for (var a of this.venta.items ){
                var tr = '<tr>';
                tr += '<td>' + a.codigo + '</td>';
                tr += '<td>' + a.descripcion + '</td>';
                tr += '<td>' + a.precio + '</td>';
                tr += '<td>' + a.cantidad + '</td>';
                tr += '<td>' + a.total + '</td>';
                tr +='<td><button onclick="app.eliminar('+ a.id +')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> ELiminar</button></td>';
                tr += '</tr>';
                $('#tdetalle').append(tr);
            }
        }
    }
</script>