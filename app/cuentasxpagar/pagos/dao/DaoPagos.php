<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoVenta
 *
 * @author DocenteUNEMI
 */
class DaoPagos implements IntPagos {

    public $where = null;

    public function buscar($id) {
        
    }

    public function buscarDetalle($id) {
        
    }

    public function crearDetalle(\EntDetPagos $detalle) {
        try {
            for ($i = 1; $i <= $detalle->dcpId; $i++) {
                $nuevafecha = date('Y-m-j', strtotime('+' . ($i - 1) . 'month', strtotime($detalle->dcpFecPag)));
                //Abrir la conexion a la BD
                $con = DataConection::getInstancia();
                //Preparar el Query SQL
                $sql = 'INSERT INTO pagdetallepagar(ccpId,dcpFecPag,dcpValPag,dcpFecAbo,dcpEstado)VALUE(:ccpId,:dcpFecPag,:dcpValPag,:dcpFecPag,:dcpEstado)';
                $stmp = $con->prepare($sql);
                // Setear los parametros de la cadena sql en el bindparam
                $stmp->bindParam(':ccpId', $detalle->ccpId, PDO::PARAM_INT);
                $stmp->bindParam(':dcpFecPag', $nuevafecha, PDO::PARAM_STR);
                $stmp->bindParam(':dcpValPag', $detalle->dcpValPag, PDO::PARAM_STR);
                $stmp->bindParam(':dcpEstado', $detalle->dcpEstado, PDO::PARAM_BOOL);
                // ejecutar la sentancia sql
                $stmp->execute();
                // Si se realizo el query con exito se retorna verdadero caso contrario falso
//            return $stmp->rowCount() > 0 ? $this->actualizarStock($detalle->artId,$detalle->dcvCantidad) : false;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function crearDeuda(\EntCabPagos $pagos) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL

            $sql = 'INSERT INTO pagcabecerapagar(ccoId,ccpValor,ccpNumCuo,ccpValCuo,ccpSaldo,ccpFecIni,ccpEstado)VALUE(:ccoId,:ccpValor,:ccpNumCuo,:ccpSaldo,:ccpFecIni,:ccpEstado)';
            $stmp = $con->prepare($sql);
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':ccoId', $pagos->ccoId, PDO::PARAM_INT);
            $stmp->bindParam(':ccpValor', $pagos->ccpValor, PDO::PARAM_STR);
            $stmp->bindParam(':ccpNumCuo', $pagos->ccpNumCuo, PDO::PARAM_INT);
            $stmp->bindParam(':ccpValCuo', $pagos->ccpValCuo, PDO::PARAM_STR);
            $stmp->bindParam(':ccpSaldo', $pagos->ccpSaldo, PDO::PARAM_STR);
            $stmp->bindParam(':ccpFecIni', $pagos->ccpFecIni, PDO::PARAM_STR);
            $stmp->bindParam(':ccpEstado', $pagos->ccpEstado, PDO::PARAM_BOOL);
            // ejecutar la sentancia sql
            $stmp->execute();
            // Si se realizo el query con exito se retorna verdadero caso contrario falso
            return $stmp->rowCount() > 0 ? [true, $con->lastInsertId()] : [false];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function listar() {
        $pagos = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select ccpId fac,ccoId comId, ccpValor val, ccpNumCuo ncuo, ccpValCuo valcuo,ccpSaldo sald,ccpFecIni fec,ccpEstado est  from pagcabecerapagar cabpag where cabpag.ccpEstado=true ';
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $pagos->append(new EntCabPagos($rs->fac, $rs->comId, $rs->val, $rs->ncuo, $rs->valcuo, $rs->sald, $rs->fec, $rs->est));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $pagos;
    }

    public function listarCompras($id) {
        $compras = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select com.ccoId comid, com.proId proid,com.plcTipPag tipag,com.ccoSubtotal sub, com.ccoDescuento descu,com.ccoIva iva,com.ccoTotal total from comcabcompra com where com.ccoId=:id';
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $compras->append(new EntCabCompra($rs->comid, $rs->proid, $rs->tipag, $rs->sub, $rs->descu, $rs->iva, $rs->total,'','',''));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $compras;
    }

    public function listarFac() {
        $compras = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select com.ccoId comid, com.proId proid,com.plcTipPag tipag,com.ccoSubtotal sub, com.ccoDescuento descu,com.ccoIva iva,com.ccoTotal total, proRuc ruc, proEmpresa emp, proDireccion direc from comcabcompra com, pagcabecerapagar pag, comproveedor pro where com.ccoId!=pag.ccoId and pro.proId=com.proId  and ccoEstado=1';
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $compra = new EntCabCompra();
                $compra->ccoId = $rs->comid;
                $compra->proId = $rs->proid;
                $compra->plcTipPag = $rs->tipag;
                $compra->ccoSubtotal = $rs->sub;
                $compra->ccoDescuento = $rs->descu;
                $compra->ccoIva = $rs->iva;
                $compra->ccoTotal = $rs->total;
                $compra->proRuc = $rs->ruc;
                $compra->proEmpresa = $rs->emp;
                $compra->proDireccion = $rs->direc;
                $compras->append($compra);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $compras;
    }

    public function listarDetalle($id) {
        $pagos = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select ccpId fac,ccoId comId, ccpValor val, ccpNumCuo ncuo, ccpValCuo valcuo,ccpSaldo sald,ccpFecIni fec,ccpEstado est  from pagcabecerapagar cabpag where cabpag.ccpEstado=true and cabpag.ccpId=:id';
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(':id', $id, 1);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $pagos->append(new EntCabPagos($rs->fac, $rs->comId, $rs->val, $rs->ncuo, $rs->valcuo, $rs->sald, $rs->fec, $rs->est));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $pagos;
    }

    public function listarProv($id) {
        $proveedores = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select proId id,proEmpresa proEmp, proRuc ruc, proDireccion direc from comproveedor  where proId=:id ';
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(':id', $id, 1);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $proveedor = new EntProveedor();
                $proveedor->proId = $rs->id;
                $proveedor->proRuc = $rs->ruc;
                $proveedor->proEmpresa = $rs->proEmp;
                $proveedor->proDireccion = $rs->direc;
                $proveedores->append($proveedor);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $proveedores;
    }

    public function listarArt() {
        $articulos = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select artid id, artCodBar codBar,artdescripcion des,artstock sto,artPvp pre,artiva iva from comarticulo where artestado=1';
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $articulo = new EntArticulo();
                $articulo->artid = $rs->id;
                $articulo->artCodBar = $rs->codBar;
                $articulo->artdescripcion = $rs->des;
                $articulo->artstock = $rs->sto;
                $articulo->artPvp = $rs->pre;
                $articulo->artiva = $rs->iva;
                $articulos->append($articulo);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $articulos;
    }

    public function listarCli() {
        $clientes = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select cliId id ,cliCedula ced,cliDireccion direccion,cliNombre nom from cobcliente where cliestado=1';
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $cliente = new EntCliente();
                $cliente->cliId = $rs->id;
                $cliente->cliNombre = $rs->nom;
                $cliente->ruc = $rs->ced;
                $cliente->direccion = $rs->direccion;
                $clientes->append($cliente);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $clientes;
    }

    public function listarPlanCuenta() {
        $planCuentas = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select plcId id, plcDescripcion des,plcCuenta cuen from conplccta  where plcEstVta = 1';
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $planCuenta = new EntPlanCuenta();
                $planCuenta->plcId = $rs->id;
                $planCuenta->plcDescripcion = $rs->des;
                $planCuenta->plcCuenta = $rs->cuen;
                $planCuentas->append($planCuenta);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $planCuentas;
    }

    public function actualizarStock($id, $cantidad) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            $sql = 'update comarticulo set artStock = (artStock - :cantidad) where artId = :id';
            $stmp = $con->prepare($sql);
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
            // ejecutar la sentancia sql
            $stmp->execute();
            // Si se realizo el query con exito se retorna verdadero caso contrario falso
            return $stmp->rowCount() > 0 ? true : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function crearLibroGlosa(\EntCabCompra $pagos) {
        try {
            $id = 0;
            $anio = date("Y");

            $con = DataConection::getInstancia();
            $sql = 'select clbId id from concablibro where clbAnio = :anioActual';
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':anioActual', $anio, PDO::PARAM_INT);
            $stmp->execute();
            while ($rs = $stmp->fetch(PDO::FETCH_OBJ)) {
                $id = $rs->id;
            }

            $str = "Cuentas por Pagar";

            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO conglosalibro(clbId,glbFecha,glbGlosa,glbFecReg,glbFecMod,glbEstado)VALUE(:clbId,NOW(),:glbGlosa,NOW(),NOW(),1);';
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':clbId', $id, PDO::PARAM_INT);
            $stmp->bindParam(':glbGlosa', $str, PDO::PARAM_STR);
            $stmp->execute();


            $idConGlosaLibro = $con->lastInsertId();

            $dlbDebe = 0;
            $dlbHaber = $pagos->ccoTotal;

            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO condetlibro(glbId,plcCuenta,dlbDebe,dlbHaber)VALUE(:glbId,:plcCuenta,:dlbDebe,:dlbHaber);';
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':glbId', $idConGlosaLibro, PDO::PARAM_INT);
            $stmp->bindParam(':plcCuenta', $pagos->plcTipPag, PDO::PARAM_STR);
            $stmp->bindParam(':dlbDebe', $dlbDebe, PDO::PARAM_INT);
            $stmp->bindParam(':dlbHaber', $dlbHaber, PDO::PARAM_INT);
            $stmp->execute();
            ///////////////////////////////////////////

            $dlbDebe = 0;
            $dlbHaber = $pagos->ccoSubtotal;

            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO condetlibro(glbId,plcCuenta,dlbDebe,dlbHaber)VALUE(:glbId,:plcCuenta,:dlbDebe,:dlbHaber);';
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':glbId', $idConGlosaLibro, PDO::PARAM_INT);
            $cuentaPagos = Ninguno;
            $stmp->bindParam(':plcCuenta', $cuentaPagos, PDO::PARAM_STR);
            $stmp->bindParam(':dlbDebe', $dlbDebe, PDO::PARAM_STR);
            $stmp->bindParam(':dlbHaber', $dlbHaber, PDO::PARAM_STR);
            $stmp->execute();

            $dlbDebe = 0;
            $dlbHaber = $pagos->ccoIva;

            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO condetlibro(glbId,plcCuenta,dlbDebe,dlbHaber)VALUE(:glbId,:plcCuenta,:dlbDebe,:dlbHaber);';
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':glbId', $idConGlosaLibro, PDO::PARAM_INT);
            $cuentaIva = Ninguno;
            $stmp->bindParam(':plcCuenta', $cuentaIva, PDO::PARAM_STR);
            $stmp->bindParam(':dlbDebe', $dlbDebe, PDO::PARAM_STR);
            $stmp->bindParam(':dlbHaber', $dlbHaber, PDO::PARAM_STR);
            $stmp->execute();

            return $stmp->rowCount() > 0 ? true : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function auditoria($id, $accion, $usuId) {
        //(select @@hostname)
        try {
            $tabla = "Cuentas por Pagar";

            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO conauditoria(audTabla,audRegistroId,audAccion,audFecha,audHora,audEstacion,usuId)VALUE(:audTabla,:audRegistroId,:audAccion,NOW(),(SELECT TIME(NOW())),(select @@hostname),:usuId);';
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':audTabla', $tabla, PDO::PARAM_STR);
            $stmp->bindParam(':audRegistroId', $id, PDO::PARAM_INT);
            $stmp->bindParam(':audAccion', $accion, PDO::PARAM_STR);
            $stmp->bindParam(':usuId', $usuId, PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

}
