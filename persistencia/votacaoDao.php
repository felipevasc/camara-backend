<?php
class votacaoDao extends genericoDao {    
    public function __construct() {
        $this->campos['vereador']['tipo'] = "int";
        $this->campos['tipo_voto']['tipo'] = "int";
        parent::__construct("votacoes");
    }
}
?>