<?php
class cronometroDao extends genericoDao {    
    public function __construct() {
        $this->campos['hora_inicio']['tipo'] = "str";
        $this->campos['pausado']['tipo'] = "bool";
        $this->campos['tempo_decorrido']['tipo'] = "int";
        $this->campos['tempo_previsto']['tipo'] = "int";
        $this->campos['vereador']['tipo'] = "int";
        $this->campos['hora_ultimo_start']['tipo'] = "str";
        parent::__construct("cronometro");
    }
}
?>