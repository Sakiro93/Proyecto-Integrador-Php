<?php

/**
 * Description of DaoCategoria
 *
 * @author DocenteUNEMI
 */
class DaoGrupo implements IntGrupo {

    public $where = null;

    public function buscar($id) {
        $grupo = null;
        try {
            $cn = DataConection::getInstancia();
            $sql = 'SELECT gruId,catid,gruDescripcion,gruEstado FROM vengrupo WHERE gruId=:id';
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, 1);
            $stmp->execute();
            if (($rs = $stmp->fetch(PDO::FETCH_OBJ))) {
                $grupo = new EntGrupo($rs->gruId, $rs->gruDescripcion, $rs->catid, $rs->gruEstado);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $grupo;
    }

    public function crear(\EntGrupo $grupo) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            $sql = 'INSERT INTO vengrupo(gruDescripcion,catid,gruFecReg,gruFecMod,usuIdCre,usuIdMod,gruEstado)VALUE(:des,:cat,NOW(),NOW(),:ucre,:umod,:est)';
            $stmp = $con->prepare($sql);        
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':des', $grupo->nombre, PDO::PARAM_STR);
            $stmp->bindParam(':cat', $grupo->catid, PDO::PARAM_INT);
            $stmp->bindParam(':ucre', $grupo->usucre, PDO::PARAM_INT);
            $stmp->bindParam(':umod', $grupo->usumod, PDO::PARAM_INT);
            $stmp->bindParam(':est', $grupo->estado, PDO::PARAM_BOOL);
            // ejecutar la sentancia sql
            $stmp->execute();
            // Si se realizo el query con exito se retorna verdadero caso contrario falso
            return $stmp->rowCount() > 0 ? true : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function editar(\EntGrupo $grupo) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            $sql = 'UPDATE vengrupo SET gruDescripcion=:des,catid=:cat,gruFecMod=NOW(),usuIdMod=:umod,gruEstado=:est WHERE gruId=:id';
      
            $stmp = $con->prepare($sql);
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':des', $grupo->nombre, 2);
            $stmp->bindParam(':cat', $grupo->catid, 1);
            $stmp->bindParam(':umod', $grupo->usumod, 1);
            $stmp->bindParam(':est', $grupo->estado, 5);
            $stmp->bindParam(':id', $grupo->gruId, 1);
            // ejecutar la sentancia sql
            $stmp->execute();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function eliminar($id, $uid) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            //$sql = 'DELETE categoria WHERE ctgId=:id';
            $sql = 'UPDATE vengrupo SET usuIdMod=:umod,gruFecMod=NOW(),gruEstado=0 WHERE gruId=:id';
            $stmp = $con->prepare($sql);
            // Setear los parametros de la cadena sql en el bindparam    
            $stmp->bindParam(':umod', $uid, 1);
            $stmp->bindParam(':id', $id, 1);
            // ejecutar la sentancia sql
            $stmp->execute();
            // Si se realizo el query con exito se retorna verdadero caso contrario falso
            return $stmp->rowCount() > 0 ? true : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function listar() {
        $grupos = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'SELECT gruId,gruDescripcion,catDescripcion cat,gruEstado FROM vengrupo G INNER JOIN vencategoria C ON G.catid = C.catid WHERE gruEstado=1';
            if ($this->where) {
                $sql .= " AND INSTR(gruDescripcion,'" . $this->where . "') > 0";
            }
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $grupos->append(new EntGrupo($rs->gruId, $rs->gruDescripcion, $rs->cat, $rs->gruEstado));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $grupos;
    }

}
