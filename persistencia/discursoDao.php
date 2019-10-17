<?php
class discursoDao extends genericoDao {    
    public function __construct() {
        $this->campos['inicio_normal']['tipo'] = "str";
        $this->campos['inicio_adicional']['tipo'] = "str";
        $this->campos['segundos_normal']['tipo'] = "int";
        $this->campos['segundos_adicional']['tipo'] = "int";
        $this->campos['vereador']['tipo'] = "int";
        $this->campos['pausado']['tipo'] = "str";
        parent::__construct("discurso");
    }
}
?>