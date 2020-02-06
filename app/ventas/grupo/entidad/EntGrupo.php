<?php

/**
 * Description of EntCategoria
 *
 * @author DocenteUNEMI
 */
class EntGrupo {

    public $gruId;
    public $nombre;
    public $catid;
    public $usucre;
    public $usumod;
    public $estado;

    function __construct($gruId = 0, $nombre = '', $catid = null, $usucre = 0, $usumod = 0, $estado = true) {
        $this->gruId = $gruId;
        $this->nombre = $nombre;
        $this->catid = $catid;
        $this->usucre = $usucre;
        $this->usumod = $usumod;
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
