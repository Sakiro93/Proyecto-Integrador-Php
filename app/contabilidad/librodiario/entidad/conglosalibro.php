<?php

class conglosalibro {
    public $glbId;
    public $clbId;
    public $glbFecha;
    public $glbGlosa;
    public $usuIdCre;
    public $usuIdMod;
    public $glbEstado;
    
    public function __construct($glbId = 0,$clbId = 0,$glbFecha = 0,$glbGlosa = 0,$usuIdCre = 0,$usuIdMod = 0,$glbEstado = 0) {
        $this->glbId = $glbId;
        $this->clbId = $clbId;
        $this->glbFecha = $glbFecha;
        $this->glbGlosa = $glbGlosa;
        $this->usuIdCre = $usuIdCre;
        $this->usuIdMod = $usuIdMod;
        $this->glbEstado = $glbEstado;
    }
}
