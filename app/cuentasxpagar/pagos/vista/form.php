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
                            <li><a href="/ventas/" class="active">Deudas</a> <span class="divider">/</span></li>
                        </ul>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-offset-0">

                        <div class="lock-screen-wrapper">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <img src="../../static/img/menu/cta2.png" class="img-circle" width="70">
                                    Registro y Control de Deudas
                                </div>
                                <div class="panel-body">
                                    <div class="container-fluid">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <fieldset style="font-family: arial"> 
                                                    <legend style="font-size: 15px;font-weight: bold">Datos del Proveedor
                                                    </legend>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="form-group">
                                                                <label>Proveedor</label>
                                                                <input id="empresa" disabled class="form-control" type="text"
                                                                       placeholder="Proveedor"/>
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

                                                    <legend style="font-size: 15px;font-weight: bold">Datos de la Compra.
                                                    </legend>

                                                    <div class="well well-sm">
                                                        <div class="row">
                                                            <form id="frm-additem">
                                                                <div class="col-xs-5">
                                                                    <select class="chosen-select form-control" id="cbcompra" 
                                                                            data-placeholder="Seleccione Factura">
                                                                        <option value="" >Seleccione Factura</option>
                                                                        <?php foreach ($this->dao->listarFac() as $a): ?>
                                                                            <option data-ajson='<?= $a ?>' value="<?= $a->ccoId ?>" ><?= $a->ccoId ?> </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="col-xs-2">
                                                                    <input id="com-ncuota" class="form-control"
                                                                           type="number" min="1" placeholder="No. Cuota"/>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <input id="com-fecha" disabled
                                                                           class="form-control" type="text"
                                                                           placeholder="Fecha"/>
                                                                </div>
                                                                <div class="col-xs-2"></div>

                                                                <div class="col-xs-1">
                                                                    <button class="btn btn-primary form-control"
                                                                            id="btn-agregar">
                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                    <div class="well well-sm">
                                                        <div class="row">
                                                            <form id="frm-detalle">                           
                                                                <div class="col-xs-2">
                                                                    <div class="input-group">
                                                                        <input id="com-tipoPago" disabled class="form-control" type="text"
                                                                               placeholder="Tipo de Pago"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-2">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"
                                                                              id="basic-addon1">Sub/.</span>
                                                                        <input id="com-subtotal" readonly
                                                                               class="form-control" type="text"
                                                                               placeholder="Subtotal"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-2">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"
                                                                              id="basic-addon1">Desc/.</span>
                                                                        <input id="com-descuento" readonly
                                                                               class="form-control" type="text"
                                                                               placeholder="Descuento"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"
                                                                              id="basic-addon1">IVA/.</span>
                                                                        <input id="com-iva" readonly
                                                                               class="form-control" type="text"
                                                                               placeholder="IVA"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"
                                                                              id="basic-addon1">Total/.</span>
                                                                        <input id="com-total" readonly
                                                                               class="form-control" type="text"
                                                                               placeholder="Total"/>
                                                                    </div>
                                                                </div> 

                                                                <div class="col-xs-2">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"
                                                                              id="basic-addon1">$/.</span>
                                                                        <input id="com-cuota" readonly
                                                                               class="form-control" type="text"
                                                                               placeholder="Cuota"/>
                                                                    </div>
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
                                                                        <th>Factura</th>
                                                                        <th>Valor</th>
                                                                        <th>No. Cuota</th>
                                                                        <th>Valor Cuota</th>
                                                                        <th>Fecha Inicio</th>
                                                                        <th>Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tdetalle" align="center">

                                                                </tbody>
                                                            </table>

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
                                                                            Deuda</strong></span>
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
                                                                            $(function () {
                                                                                $('.chosen-select').chosen();
                                                                                $('#cbcompra').change(function () {
                                                                                    var option = $('#cbcompra option:selected');
                                                                                    if (option.val() !== '') {
                                                                                        var compra = option.data('ajson');
                                                                                        var f = new Date().toJSON().slice(0, 10);
                                                                                        $('#empresa').val(compra.proEmpresa);
                                                                                        $('#ruc').val(compra.proRuc);
                                                                                        $('#direccion').val(compra.proDireccion);
                                                                                        $('#com-tipoPago').val(compra.plcTipPag);
                                                                                        $('#com-subtotal').val(compra.ccoSubtotal);
                                                                                        $('#com-descuento').val(compra.ccoDescuento);
                                                                                        $('#com-iva').val(compra.ccoIva);
                                                                                        $('#com-total').val(compra.ccoTotal);
                                                                                        $('#com-ncuota').val('1');
                                                                                        var valor = $('#com-total').val() / $('#com-ncuota').val();
                                                                                        $('#com-cuota').val(parseFloat(valor.toFixed(2)));
                                                                                        $('#com-fecha').val(f);
                                                                                    } else {
                                                                                        $('#com-total').val('');
                                                                                        $('#com-tipoPago').val('');
                                                                                        $('#com-descuento').val('');
                                                                                        $('#com-subtotal').val('');
                                                                                        $('#com-ncuota').val('');
                                                                                        $('#com-cuota').val('');
                                                                                        $('#com-fecha').val('');
                                                                                        $('#com-iva').val('');
                                                                                        $('#empresa').val('');
                                                                                        $('#ruc').val('');
                                                                                        $('#direccion').val('');
                                                                                        $('#com-prov').val('');
                                                                                    }
                                                                                });


                                                                                $('#cbcompra').change();

                                                                                $('#com-ncuota').change(function () {
                                                                                    if ($('#com-ncuota').val() !== '' && $('#cbcompra').val() !== '') {
                                                                                        var valor = $('#com-total').val() / $('#com-ncuota').val();
                                                                                        $('#com-cuota').val(parseFloat(valor.toFixed(2)));
                                                                                    }
                                                                                });
                                                                                $('#com-ncuota').change();

                                                                                $('#frm-additem').submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    var ncuota = parseInt($('#com-ncuota').val());
                                                                                    var option = $('#cbcompra option:selected');
                                                                                    var fecha = $('#com-fecha').val();
                                                                                    if (option.val() !== '' && ncuota > 0) {
                                                                                        var data = option.data('ajson');
                                                                                        var item = new Object();
                                                                                        item.idfactura = data.ccoId;
                                                                                        item.valor = data.ccoTotal;
                                                                                        item.numcuota = $('#com-ncuota').val();
                                                                                        item.valcuota = $('#com-cuota').val();
                                                                                        item.fechareg = fecha;
                                                                                        app.add(item);
                                                                                    }
                                                                                });


                                                                                $('#btn-registrar').click(function () {

                                                                                    if (app.compra.items.length > 0) {
                                                                                        if ($('#cbcompra').val()) {
                                                                                            app.compra.factura = $('#cbcompra').val();
                                                                                           
//                                                                                            app.compra.total = $('#com-total').val();
//                                                                                            app.compra.ncuota = $('#com-ncuota').val();
//                                                                                            app.compra.vcuota = $('#com-cuota').val();
                                                                                            app.compra.fecha = $('#com-fecha').val();

                                                                                            $.ajax({
                                                                                                url: 'accion.php',
                                                                                                data: {action: 'nuevo', model: 'pagos', compra: JSON.stringify(app.compra)},
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
                                                                                            alert('Debe Seleccionar Factura');
                                                                                        }
                                                                                    } else {
                                                                                        alert('Debe Añadir Facturas a la Lista');
                                                                                    }
                                                                                });
                                                                            });

                                                                            var app = {
                                                                                compra: {
                                                                                    //cabecera
                                                                                    factura: 0,
                                                                                    total: 0,
                                                                                    ncuota: 0,
                                                                                    vcuota: 0,
                                                                                    fecha: '',
//                                                                                    detalle
                                                                                    items: []
                                                                                },

                                                                                add: function (item) {
                                                                                    if (!this.existe(item)) {
                                                                                        item.factura = item.idfactura;
                                                                                        item.total = item.valor;
                                                                                        item.ncuota = item.numcuota;
                                                                                        item.vcuota = item.valcuota;
                                                                                        item.fecha = item.fechareg;
                                                                                        this.compra.items.push(item);
                                                                                    }
                                                                                    this.actualizar();
                                                                                    this.presentar();
                                                                                    return true;
                                                                                },

                                                                                eliminar: function (id) {
                                                                                    for (var i in this.compra.items) {
                                                                                        if (this.compra.items[i].factura == id) {
                                                                                            this.compra.items.splice(i, 1);
                                                                                            this.actualizar();
                                                                                            this.presentar();
                                                                                            return true;
                                                                                        }
                                                                                    }
                                                                                    return false;
                                                                                }
                                                                                ,
                                                                                actualizar: function () {

                                                                                    this.compra.total = 0;
                                                                                    this.compra.ncuota = 0;
                                                                                    this.compra.vcuota = 0;



                                                                                    for (var item of this.compra.items) {

                                                                                        this.compra.total += item.total;
                                                                                        this.compra.ncuota += item.ncuota;
                                                                                        this.compra.vcuota += item.vcuota;

                                                                                    }

//                                                                                    $('#id_msubtotal').val(this.venta.subtotal.toFixed(2));
//                                                                                    $('#id_mdescuento').val(this.venta.descuento.toFixed(2));
//                                                                                    $('#id_miva').val(this.venta.iva.toFixed(2));
//                                                                                    $('#id_mtotal').val(this.venta.total.toFixed(2));

                                                                                },

                                                                                existe: function (item) {
                                                                                    for (var i in this.compra.items) {
                                                                                        if (item.idfactura == this.compra.items[i].factura) {
                                                                                            alert("Ya existe esta Factura");
                                                                                            return true;
                                                                                        }
                                                                                    }
                                                                                    return false;
                                                                                },

                                                                                presentar: function () {
                                                                                    $('#tdetalle').html('');
                                                                                    for (var item of this.compra.items) {
                                                                                        var tr = '<tr>';
                                                                                        tr += '<td>' + item.idfactura + '</td>';
                                                                                        tr += '<td>' + item.valor + '</td>';
                                                                                        tr += '<td>' + item.numcuota + '</td>';
                                                                                        tr += '<td>' + item.valcuota + '</td>';
                                                                                        tr += '<td>' + item.fechareg + '</td>';
                                                                                        tr += '<td><button onclick="app.eliminar(' + item.idfactura + ')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> ELiminar</button></td>';
                                                                                        tr += '</tr>';
                                                                                        $('#tdetalle').append(tr);
                                                                                    }
                                                                                }
                                                                            };


        </script>
    </body>