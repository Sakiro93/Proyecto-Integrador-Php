<?php

class condetlibro {
    
    public $dlbId;
    public $glbId;
    public $plcId;
    public $dlbDebe;
    public $dlbHaber;
    
    public function __construct($dlbId = 0,$glbId = 0,$plcId = 0,$dlbDebe = 0,$dlbHaber = 0) {
        $this->dlbId=$dlbId;
        $this->glbId=$glbId;
        $this->plcId=$plcId;
        $this->dlbDebe=$dlbDebe;
        $this->dlbHaber=$dlbHaber;
    }
}
