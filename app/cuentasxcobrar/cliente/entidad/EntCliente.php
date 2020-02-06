<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntCliente
 *
 * @author DocenteUNEMI
 */
class EntCliente {
    public $cliId; 
    public $ruc;
    public $cliNombre;
    public $direccion;
    
    public function __getCliente($k) {
        return $this->$k;
    }

    public function __setCliente($k, $v) {
        return $this->$k = $v;
    }

    public function __toString() {
        return json_encode($this);
    }
    
}
