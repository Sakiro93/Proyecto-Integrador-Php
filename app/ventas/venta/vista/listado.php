<article id="content">
    <div class="container-fluid">

        <div class="row">
            <div class="row-fluid">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li><a href="../principal/admin.php">Inicio</a><span class="divider"></span></li>
                        <li><a href="javascript:window.location.reload();" class="active">Venta De Articulo</a> <span class="divider">/</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">

                <div class="panel panel-default panel-table panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-1">
                                <img src="../../static/img/menu/cta2.png" height="65">
                            </div>
                            <div class="col col-xs-4">
                                <h3>Consulta Ventas de Articulos</h3>
                            </div>                                    
                        </div>
                        <br>
                        <div class="row">
                            <div class="col col-xs-6">
                                <form method="GET" action="venta.php">
                                    <div class="input-group">
                                        <div class="input-group-btn search-panel">
                                            <button type="button" class="btn btn-info">
                                                <span id="search_concept">Buscar Por </span> <span class="caret"></span>
                                            </button>                                            
                                        </div>                                        
                                        <input type="text" class="form-control" name="q" placeholder="Buscar Venta Por Clientes" value="<?=$q?>">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                        </span> 
                                    </div>
                                </form>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <div class="btn-group">
                                    <a class="btn btn-success" href="venta.php?action=nuevo&id=0">
                                        <i class="glyphicon glyphicon-plus-sign"> </i>  
                                        Nuevo Venta
                                    </a>
                                    <a href="javascript:window.location.reload();" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-refresh"> </i>
                                        Actualizar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered table-responsive table-striped" id="tdatos">
                            <thead>
                                <tr>
                                    <th>Factura</th>
                                    <th>Cliente</th>                                        
                                    <th>Fecha</th>
                                    <th>Forma Pago</th>
                                    <th>Total</th>
                                </tr> 
                            </thead>
                            <tbody id="tdetalle">
                                <?php foreach ($this->dao->listar() as $venta): ?>
                                    <tr>
                                        <td align="center"><?= $venta->vcvId ?></td>
                                        <td align="center"><?= $venta->cliId ?></td>
                                        <td align="center"><?= $venta->vcvFecVen ?></td>
                                        <td align="center"><?= $venta->plcTipPag ?></td>
                                        <td align="center"><?= $venta->vcvTotal ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-4">Page 1 of 5
                            </div>
                            <div class="col col-xs-8">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</article>