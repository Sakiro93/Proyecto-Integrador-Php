<?php

class EntDetVenta {
    public $dcvId;
    public $vcvId;
    public $artId;
    public $dcvPreVen;
    public $dcvCantidad;
    public $dcvSubtotal;

    function __construct($dcvId = 0, $vcvId = 0, $artId = 0, $dcvPreVen = 0, $dcvCantidad = 0, $dcvSubtotal = 0) {
        $this->dcvId = $dcvId;
        $this->vcvId = $vcvId;
        $this->artId = $artId;
        $this->dcvPreVen = $dcvPreVen;
        $this->dcvCantidad = $dcvCantidad;
        $this->dcvSubtotal = $dcvSubtotal;
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
