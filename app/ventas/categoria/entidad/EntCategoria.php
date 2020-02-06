<?php

class EntCategoria {

    public $ctgId;
    public $nombre;
    public $user;
    public $estado;

    public function __construct($ctgId = 0, $nombre = '',$user = 0, $estado = true) {
        $this->ctgId = $ctgId;
        $this->nombre = $nombre;
        $this->user = $user;
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
