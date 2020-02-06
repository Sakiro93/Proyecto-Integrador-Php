<?php

class EntCabPagos {
    public $ccpId;
    public $ccoId;
    public $ccpValor;
    public $ccpNumCuo;
    public $ccpValCuo;
    public $ccpSaldo;
    public $ccpFecIni;
    public $ccpEstado;
    

    function __construct($ccpId=0, $ccoId=0, $ccpValor=0, $ccpNumCuo=0, $ccpValCuo=0, $ccpSaldo=0, $ccpFecIni=Null, $ccpEstado=true) {
        $this->ccpId = $ccpId;
        $this->ccoId = $ccoId;
        $this->ccpValor = $ccpValor;
        $this->ccpNumCuo = $ccpNumCuo;
        $this->ccpValCuo = $ccpValCuo;
        $this->ccpSaldo = $ccpSaldo;
        $this->ccpFecIni = $ccpFecIni;
        $this->ccpEstado = $ccpEstado;
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
