<?php

class EntUsuario {
    public $usuId;
    public $login;
    public $clave;
    public $ultimoingreso;
    public $fecharegistro;
    public $estado;
    public $RolId;
    public function __construct($usuId = 0, $login = '', $clave = '', $ultimoingreso = '', $fecharegistro = '', $estado = true,$RolId = null) {
        $this->usuId = $usuId;
        $this->login = $login;
        $this->clave = $clave;
        $this->ultimoingreso = $ultimoingreso;
        $this->fecharegistro = $fecharegistro;
        $this->estado = $estado;
        $this->RolId = $RolId;
    }

    public function __get($k) {
        return $this->$k;
    }

    public function __set($k, $v) {
        return $this->$k = $v;
    }

    public function __toString() {
        return json_encode($this);
    }

}