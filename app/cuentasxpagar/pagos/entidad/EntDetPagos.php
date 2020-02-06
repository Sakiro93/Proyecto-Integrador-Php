<?php

class EntDetPagos {
    public $dcpId;
    public $ccpId;
    public $dcpFecPag;
    public $dcpValPag;
    public $dcpFecAbo;
    public $dcpEstado;

    function __construct($dcpId=0, $ccpId=0, $dcpFecPag=Null, $dcpValPag=0, $dcpFecAbo=Null, $dcpEstado=true) {
        $this->dcpId = $dcpId;
        $this->ccpId = $ccpId;
        $this->dcpFecPag = $dcpFecPag;
        $this->dcpValPag = $dcpValPag;
        $this->dcpFecAbo = $dcpFecAbo;
        $this->dcpEstado = $dcpEstado;
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
