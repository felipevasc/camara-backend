<?php
class sessaoDao extends genericoDao {    
    public function __construct() {
        $this->campos['aberta']['tipo'] = "bool";
        parent::__construct("sessao");
    }
}
?>