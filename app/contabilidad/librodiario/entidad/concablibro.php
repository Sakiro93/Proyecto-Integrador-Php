<?php

class concablibro {
    public $clbId;
    public $clbAnio;
    public $clbIdEmpresa;
    public $usuIdCre;
    public $usuIdMod;
    public $clbEstado;
    
    public function __construct($clbId = 0,$clbAnio = 0,$clbIdEmpresa = 0,$usuIdCre = 0,$usuIdMod = 0,$clbEstado = 0) {
        $this->clbId = $clbId;
        $this->clbAnio = $clbAnio;
        $this->clbIdEmpresa = $clbIdEmpresa;
        $this->usuIdCre = $usuIdCre;
        $this->usuIdMod = $usuIdMod;
        $this->clbEstado = $clbEstado;
    }
}
