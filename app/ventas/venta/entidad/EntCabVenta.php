<?php

class EntCabVenta {
    public $vcvId;
    public $cliId;
    public $vcvFecVen;
    public $plcTipPag;
    public $vcvSubtotal;
    public $vcvDescuento;
    public $vcvIva;
    public $vcvTotal;
    
    public $usucre;
    public $usumod;
    public $vcvEstado;

    function __construct($vcvId=0, $cliId=0, $vcvFecVen='', $plcTipPag='',$vcvTotal=0, $vcvSubtotal=0, $vcvDescuento=0, $vcvIva=0,$usucre = 0, $usumod = 0,$vcvEstado=true) {
        $this->vcvId = $vcvId;
        $this->cliId = $cliId;
        $this->vcvFecVen = $vcvFecVen;
        $this->plcTipPag = $plcTipPag;
        $this->vcvSubtotal = $vcvSubtotal;
        $this->vcvDescuento = $vcvDescuento;
        $this->vcvIva = $vcvIva;
        $this->vcvTotal = $vcvTotal;
        
        $this->usucre = $usucre;
        $this->usumod = $usumod;
        $this->vcvEstado = $vcvEstado;
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
