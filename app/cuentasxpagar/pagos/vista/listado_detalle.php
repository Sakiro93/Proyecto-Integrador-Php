<article id="content">
    <div class="container-fluid">

        <div class="row">
            <div class="row-fluid">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li><a href="../principal/admin.php">Inicio</a><span class="divider"></span></li>
                        <li><a href="pagos.php" class="active">Deudas</a> <span class="divider">/</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <?= $q = "" ?>
                <div class="panel panel-default panel-table panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-1">
                                <img src="../../static/img/menu/cta2.png" height="65">
                            </div>
                            <div class="col col-xs-4">
                                <h3>Consulta Deudas a Pagar</h3>
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
                                        <input type="text" class="form-control" name="q" placeholder="Buscar Deudas por Factura" value="<?= $q ?>">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                        </span> 
                                    </div>
                                </form>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <div class="btn-group">
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
                                    <th>No. Cuota</th>
                                    <th>Fecha</th>                                        
                                    <th>Valor Cuota</th>
                                    <th>Accion</th>
                                </tr> 
                            </thead>
                            <tbody id="tdetalle">
                                <?php foreach ($this->dao->listarDetalle($_GET['id']) as $pagos): ?>

                                    <?php for ($i = 1; $i <= $pagos->ccpNumCuo; $i++): ?> 
                                        <tr>
                                            <td align="center"><?= $i ?></td>
                                            <td align="center"> <?= $nuevafecha = date('Y-m-j', strtotime('+' . ($i - 1) . 'month', strtotime($pagos->ccpFecIni))); ?>   </td>
                                            <td align="center"><?= $pagos->ccpValCuo ?></td>
                                            <td class="text-center">
                                                <a  href="pagos.php?action=detalle"  class="btn btn-primary btn-sm">
                                                    <i class="glyphicon glyphicon-log-in"></i> Pagar</a>           
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
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