<?php

class CtrVenta {
    private $model;
    private $modelDetalle;
    private $dao;

    function __construct() {
        require '../modulobase/parametros.php';
        require '../modulobase/DataConection.php';
        require 'venta/entidad/EntCabVenta.php';
        require 'venta/entidad/EntDetVenta.php';
        
        require '../compras/articulo/entidad/EntArticulo.php';
        require '../contabilidad/plancuenta/entidad/EntPlanCuenta.php';
        require '../cuentasxcobrar/cliente/entidad/EntCliente.php';
        
        require 'venta/interfaz/IntVenta.php';
        require 'venta/dao/DaoVenta.php';
        $this->model = new EntCabVenta;
        $this->dao = new DaoVenta;
        $this->modelDetalle = new EntDetVenta();
    }
    
    public function view($usid = null) {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $frm = (object) $_POST;
            
            if (isset($_POST['action'])) { // PETICIONES USANDO AJAX           
                
                $frm = (object) $_POST;

                switch ($frm->action) {
                    case 'nuevo':
                        $venta = json_decode($frm->venta);
                        
                        $this->model = new EntCabVenta(0, $venta->cliente,null,$venta->formapago,$venta->total,$venta->subtotal,$venta->descuento,$venta->iva,$usid,$usid,true);

                        $fila = $this->dao->crearVenta($this->model);
                        
                        
                        if ($fila[0]) {
                            
                            $dato = $this->dao->crearLibroGlosa($this->model);
                            
                            foreach ($venta->items as $item) {
                                $this->modelDetalle = new EntDetVenta(0,$fila[1],$item->id,$item->precio,$item->cantidad,$item->subtotal);
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
                $action = $_GET['action'];
                //mostramos formulario 
                require 'venta/vista/form.php';
            } else {
                
                //mostramos el listado de registros
               require 'venta/vista/listado.php';
            }
             
        }
      
     }
}
