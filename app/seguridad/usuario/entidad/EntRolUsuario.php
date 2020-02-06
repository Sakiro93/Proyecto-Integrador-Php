<?php

class EntRolUsuario {

    public $RolId;
    public $nombre;
    public $fecharegistro;
    public $estado;

    public function __construct($RolId = 0, $nombre = '', $fecharegistro = '', $estado = true) {
        $this->RolId = $RolId;
        $this->nombre = $nombre;
        $this->fecharegistro = $fecharegistro;
        $this->estado = $estado;
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
