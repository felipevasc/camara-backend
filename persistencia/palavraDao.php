<?php
class palavraDao extends genericoDao {    
    public function __construct() {
        $this->campos['data']['tipo'] = "data";
        $this->campos['vereador']['tipo'] = "int";
        parent::__construct("palavras");
    }
}
?>