<?php
class funcionarioDao extends genericoDao {
    public function __construct() {
        $this->campos['nome']['tipo'] = "str"; 
        parent::__construct("funcionarios");
    }
}
?>