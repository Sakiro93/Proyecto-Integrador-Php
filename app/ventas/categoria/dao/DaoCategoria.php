<?php
/**
 * Description of DaoCategoria
 *
 * @author DocenteUNEMI
 */
class DaoCategoria implements IntCategoria {

    public $where = null;

    public function crear(\EntCategoria $categoria) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            $sql = 'INSERT INTO vencategoria(catDescripcion,catFecReg,catFecMod,usuIdcre,usuIdMod,catEstado) VALUE(:des,NOW(),NOW(),:ucre,:umod,:est)';
            $stmp = $con->prepare($sql);
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':des', $categoria->nombre, PDO::PARAM_STR);
            $stmp->bindParam(':ucre', $categoria->user, 1);
            $stmp->bindParam(':umod', $categoria->user, 1);
            $stmp->bindParam(':est', $categoria->estado, PDO::PARAM_BOOL);
            // ejecutar la sentancia sql
            $stmp->execute();
            // Si se realizo el query con exito se retorna verdadero caso contrario falso
            return $stmp->rowCount() > 0 ? true : false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function editar(\EntCategoria $categoria) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            $sql = 'UPDATE vencategoria SET catDescripcion=:des,catFecMod=NOW(),usuIdMod=:umod,catEstado=:est WHERE catId=:id';
            $stmp = $con->prepare($sql);
            // Setear los parametros de la cadena sql en el bindparam
            $stmp->bindParam(':des', $categoria->nombre, 2);
            $stmp->bindParam(':umod', $categoria->user, 1);
            $stmp->bindParam(':est', $categoria->estado, 5);
            $stmp->bindParam(':id', $categoria->ctgId, 1);
            // ejecutar la sentancia sql
            $stmp->execute();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function eliminar($id,$uid) {
        try {
            //Abrir la conexion a la BD
            $con = DataConection::getInstancia();
            //Preparar el Query SQL
            //$sql = 'DELETE categoria WHERE ctgId=:id';
            $sql = 'UPDATE vencategoria SET catFecMod=NOW(),usuIdMod=:umod,catEstado=0 WHERE catId=:id';
            $stmp = $con->prepare($sql);
            // Setear los parametros de la cadena sql en el bindparam 
            $stmp->bindParam(':umod',$uid, 1);
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

    public function buscar($id) {
        $categoria = null;
        try {
            $cn = DataConection::getInstancia();
            $sql = 'SELECT catId,catDescripcion,catEstado FROM vencategoria WHERE catId=:id';
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, 1);
            $stmp->execute();
            if (($rs = $stmp->fetch(PDO::FETCH_OBJ))) {
                $categoria = new EntCategoria($rs->catId, $rs->catDescripcion, $rs->catEstado);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $categoria;
    }

    public function listar() {
        $categorias = new ArrayObject();
        try {
            $cn = DataConection::getInstancia();
            $sql = 'SELECT catId,catDescripcion,catEstado FROM vencategoria WHERE catEstado=1';
            if($this->where){
              $sql.=" AND INSTR(catDescripcion,'".$this->where."') > 0";                  
            }           
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $categorias->append(new EntCategoria($rs->catId, $rs->catDescripcion, $rs->catEstado));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $categorias;
    }

}
