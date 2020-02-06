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
class EntArticulo {
    public $artid;
    public $artCodBar;
    public $artdescripcion;
    public $artstock;
    public $artPvp;
    public $artiva;
    
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
