<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntArticulo
 *
 * @author DocenteUNEMI
 */
class EntProveedor {
    public $proId;
    public $ropEmpresa;
    public $proRuc;
    public $proDireccion;

    
    public function __getArticulo($k) {
        return $this->$k;
    }

    public function __setArticulo($k, $v) {
        return $this->$k = $v;
    }

    public function __toString() {
        return json_encode($this);
    }
}
