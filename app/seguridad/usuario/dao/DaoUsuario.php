<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoUsuario
 *
 * @author DocenteUNEMI
 */
class DaoUsuario implements IntUsuario {

    //put your code here
    public function add(\Usuario $user) {
        
    }

    public function buscar($id) {
        
    }

    public function editar(\Usuario $user) {
        
    }

    public function eliminar($id) {
        
    }

    public function listar() {
        
    }

    public function login($cuenta, $passw) {
        $user = null;
        try {
            $sql = "SELECT u.usuId id,u.usulogin login,tu.rolId tid,tu.roldescripcion tipo 
                 FROM segusuario u INNER JOIN segrol tu
                 ON u.rolId = tu.rolId
                 WHERE u.usulogin = :login AND u.usuclave =:clave";
            //Abro la conexion a la BD
            $con = DataConection::getInstancia();
            //prepar el Query SQL
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':login', $cuenta, 2);
            $stmp->bindParam(':clave', $passw, 1);
            //Ejecuto el Query SQL
            $stmp->execute();
            if (($u = $stmp->fetch(PDO::FETCH_OBJ))) {
                $user = new EntUsuario($u->id, $u->login);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $user;
    }

}
