<?php

class CtrPagos {

    private $modelCompra;
    private $model;
    private $modelDetalle;
    private $dao;

    function __construct() {
        require '../modulobase/parametros.php';
        require '../modulobase/DataConection.php';
        require 'pagos/entidad/EntCabPagos.php';
        require 'pagos/entidad/EntDetPagos.php';


        require 'pagos/entidad/EntCabCompra.php';
        require 'pagos/entidad/EntProveedor.php';
//        require '../compras/proveedor/entidad/EntCabCompra.php';
//        require '../compras/proveedor/entidad/EntDetCompra.php';
        require '../contabilidad/plancuenta/entidad/EntPlanCuenta.php';
        require '../cuentasxcobrar/cliente/entidad/EntCliente.php';

        require 'pagos/interfaz/IntPagos.php';
        require 'pagos/dao/DaoPagos.php';
        $this->modelCompra = new EntCabCompra;
        $this->model = new EntCabPagos;
        $this->dao = new DaoPagos;
        $this->modelDetalle = new EntDetPagos;
    }

    public function view($usid = null) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $frm = (object) $_POST;
            if (isset($_POST['action'])) { // PETICIONES USANDO AJAX           
                $frm = (object) $_POST;

                switch ($frm->action) {
                    case 'nuevo':    
                        $pagos = json_decode($frm->compra);
                        $this->model = new EntCabPagos(0, $pagos->factura, $pagos->total, $pagos->ncuota, $pagos->vcuota, $pagos->vcuota, $pagos->fecha, true);
                        $fila = $this->dao->crearDeuda($this->model);


                        if ($fila[0]) {
                            
                            foreach ($this->dao->listarCompras($pagos->factura)as $pag) {
                                $this->modelCompra = new EntCabCompra($pag->ccoId,$pag->proId,$pag->plcTipPag,$pag->ccoSubtotal,$pag->ccoDescuento,$pag->ccoIva,$pag->ccoTotal,'','','');
                            }
                            $dato = $this->dao->crearLibroGlosa($this->modelCompra);

                            foreach ($pagos->items as $item) {
                                $this->modelDetalle = new EntDetPagos($item->ncuota, $fila[1], $item->fecha, $item->total, $item->fecha, true);
                                $this->dao->crearDetalle($this->modelDetalle);
                            }

                            $this->dao->auditoria($fila[1], 'N', $usid);

                            die('{"resp" : true}');
                        }
                        break;

                    case 'editar':

                        break;
                    case 'eliminar':
                        break;
                }
            }
        } else {
            //acciones por GET
            //mostramos el listado de registros
            if (isset($_GET['action'])) {
                $frm = (object) $_GET;
                switch ($frm->action) {
                    case 'detalle':
                        $action = $_GET['action'];
                        //mostramos formulario 
                        require 'pagos/vista/listado_detalle.php';
                        break;
                    case 'nuevo':
                        $action = $_GET['action'];
                        //mostramos formulario 
                        require 'pagos/vista/form.php';
                        break;
                }
            } else {

                //mostramos el listado de registros
                require 'pagos/vista/listado.php';
            }
        }
    }

}
