<?php
class comissaoDao extends genericoDao {    
    public function __construct() {
        $this->campos['nome']['tipo'] = "str";
        $this->campos['presidente']['tipo'] = "str";
        $this->campos['relator']['tipo'] = "str";
        $this->campos['membro']['tipo'] = "str";
        parent::__construct("comissoes");
    }
}
?>