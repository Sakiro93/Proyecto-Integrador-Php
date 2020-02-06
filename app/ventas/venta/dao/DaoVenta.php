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
class DaoVenta implements IntVenta{
    public $where = null;
    
    public function buscar($id) {
        
    }

    public function crearDetalle(\EntDetVenta $detalle) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            $sql = 'INSERT INTO vendetventa(vcvId,artId,dcvPreVen,dcvCantidad,dcvSubtotal)VALUE(:vcvId,:artId,:dcvPreVen,:dcvCantidad,:dcvSubtotal)';
            $stmp = $con->prepare($sql);        
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':vcvId', $detalle->vcvId, PDO::PARAM_INT);
            $stmp->bindParam(':artId', $detalle->artId, PDO::PARAM_INT);
            $stmp->bindParam(':dcvPreVen', $detalle->dcvPreVen, PDO::PARAM_STR);
            $stmp->bindParam(':dcvCantidad', $detalle->dcvCantidad, PDO::PARAM_INT);
            $stmp->bindParam(':dcvSubtotal', $detalle->dcvSubtotal, PDO::PARAM_STR);
            // ejecutar la sentancia sql
            $stmp->execute();
            // Si se realizo el query con exito se retorna verdadero caso contrario falso
            return $stmp->rowCount() > 0 ? $this->actualizarStock($detalle->artId,$detalle->dcvCantidad) : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return false;
    }

    public function crearVenta(\EntCabVenta $venta) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            
            $sql = 'INSERT INTO vencabventa(cliId,vcvFecVen,plcTipPag,vcvSubtotal,vcvDescuento,vcvIva,vcvTotal,vcvFecReg,vcvFecMod,usuIdCre,usuIdMod,vcvEstado)VALUE(:cliId,NOW(),:plcTipPag,:vcvSubtotal,:vcvDescuento,:vcvIva,:vcvTotal,NOW(),NOW(),:ucre,:umod,:vcvEstado)';
            $stmp = $con->prepare($sql);        
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':cliId', $venta->cliId, PDO::PARAM_INT);
            $stmp->bindParam(':plcTipPag', $venta->plcTipPag, PDO::PARAM_STR);
            $stmp->bindParam(':vcvSubtotal', $venta->vcvSubtotal, PDO::PARAM_STR);
            $stmp->bindParam(':vcvDescuento', $venta->vcvDescuento, PDO::PARAM_STR);
            $stmp->bindParam(':vcvIva', $venta->vcvIva, PDO::PARAM_STR);
            $stmp->bindParam(':vcvTotal', $venta->vcvTotal, PDO::PARAM_STR);
            
            $stmp->bindParam(':ucre', $venta->usucre, PDO::PARAM_INT);
            $stmp->bindParam(':umod', $venta->usumod, PDO::PARAM_INT);
            $stmp->bindParam(':vcvEstado', $venta->vcvEstado, PDO::PARAM_BOOL);
            // ejecutar la sentancia sql
            $stmp->execute();
            // Si se realizo el query con exito se retorna verdadero caso contrario falso
            return $stmp->rowCount() > 0 ? [true,$con->lastInsertId()]:[false];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function listar() {
        $ventas = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'select vcvId fac,vcvFecVen fec,c.cliNombre cli,p.plcDescripcion cta,vcvTotal tot from vencabventa v,cobcliente c,conplccta p where v.cliId=c.cliId and v.plcTipPag=p.plcCuenta';
            if ($this->where) {
                $sql .= " AND INSTR(cliNombre,'" . $this->where . "') > 0";
            }
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $ventas->append(new EntCabVenta($rs->fac,$rs->cli,$rs->fec,$rs->cta,$rs->tot));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $ventas;
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
                $articulo->artdescripcion=$rs->des;
                $articulo->artstock=$rs->sto;
                $articulo->artPvp=$rs->pre;
                $articulo->artiva=$rs->iva;
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

    public function crearLibroGlosa(\EntCabVenta $venta) {
        try {
            $id = 0;
            $anio = date("Y");
            
            $con = DataConection::getInstancia();
            $sql = 'select clbId id from concablibro where clbAnio = :anioActual';
            $stmp = $con->prepare($sql);   
            $stmp->bindParam(':anioActual',$anio, PDO::PARAM_INT);
            $stmp->execute();
            while ($rs = $stmp->fetch(PDO::FETCH_OBJ)) {
                $id = $rs->id;
            }
            
            $str = "Venta Mercaderias";
            
            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO conglosalibro(clbId,glbFecha,glbGlosa,glbFecReg,glbFecMod,glbEstado)VALUE(:clbId,NOW(),:glbGlosa,NOW(),NOW(),1);';  
            $stmp = $con->prepare($sql);   
            $stmp->bindParam(':clbId',$id, PDO::PARAM_INT);
            $stmp->bindParam(':glbGlosa',$str, PDO::PARAM_STR);
            $stmp->execute();
            
            
            $idConGlosaLibro = $con->lastInsertId();
            
            $dlbDebe = $venta->vcvTotal;
            $dlbHaber = 0;
            
            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO condetlibro(glbId,plcCuenta,dlbDebe,dlbHaber)VALUE(:glbId,:plcCuenta,:dlbDebe,:dlbHaber);';  
            $stmp = $con->prepare($sql);   
            $stmp->bindParam(':glbId',$idConGlosaLibro, PDO::PARAM_INT);
            $stmp->bindParam(':plcCuenta',$venta->plcTipPag, PDO::PARAM_STR);
            $stmp->bindParam(':dlbDebe',$dlbDebe, PDO::PARAM_INT);
            $stmp->bindParam(':dlbHaber',$dlbHaber, PDO::PARAM_INT);
            $stmp->execute();
            ///////////////////////////////////////////
            
            $dlbDebe = 0;
            $dlbHaber = $venta->vcvSubtotal;
            
            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO condetlibro(glbId,plcCuenta,dlbDebe,dlbHaber)VALUE(:glbId,:plcCuenta,:dlbDebe,:dlbHaber);';  
            $stmp = $con->prepare($sql);   
            $stmp->bindParam(':glbId',$idConGlosaLibro, PDO::PARAM_INT);
            $cuentaVenta = VENTA;
            $stmp->bindParam(':plcCuenta',$cuentaVenta, PDO::PARAM_STR);
            $stmp->bindParam(':dlbDebe',$dlbDebe, PDO::PARAM_STR);
            $stmp->bindParam(':dlbHaber',$dlbHaber, PDO::PARAM_STR);
            $stmp->execute();
            
            $dlbDebe = 0;
            $dlbHaber = $venta->vcvIva;
            
            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO condetlibro(glbId,plcCuenta,dlbDebe,dlbHaber)VALUE(:glbId,:plcCuenta,:dlbDebe,:dlbHaber);';  
            $stmp = $con->prepare($sql);   
            $stmp->bindParam(':glbId',$idConGlosaLibro, PDO::PARAM_INT);
            $cuentaIva = IVAVENTA;
            $stmp->bindParam(':plcCuenta',$cuentaIva, PDO::PARAM_STR);
            $stmp->bindParam(':dlbDebe',$dlbDebe, PDO::PARAM_STR);
            $stmp->bindParam(':dlbHaber',$dlbHaber, PDO::PARAM_STR);
            $stmp->execute();
            
            return $stmp->rowCount() > 0 ? true : false;
 
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function auditoria($id, $accion,$usuId) {
        //(select @@hostname)
        try {
            $tabla = "venta";
            
            $con = DataConection::getInstancia();
            $sql = 'INSERT INTO conauditoria(audTabla,audRegistroId,audAccion,audFecha,audHora,audEstacion,usuId)VALUE(:audTabla,:audRegistroId,:audAccion,NOW(),(SELECT TIME(NOW())),(select @@hostname),:usuId);';  
            $stmp = $con->prepare($sql);   
            $stmp->bindParam(':audTabla',$tabla, PDO::PARAM_STR);
            $stmp->bindParam(':audRegistroId',$id, PDO::PARAM_INT);
            $stmp->bindParam(':audAccion',$accion, PDO::PARAM_STR);
            $stmp->bindParam(':usuId',$usuId, PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

}
