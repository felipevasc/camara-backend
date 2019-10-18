<?php
class parecerDao extends genericoDao {    
    public function __construct() {
        $this->campos['nome']['tipo'] = "str";
        $this->campos['projeto'] = array(
            "tipo" => "int",
            "select" => (new projeto())->obterTodos(),
            "select_label" => "nome",
            "list" => (new projeto),
            "list_campo" => "nome"
        );
        $this->campos['comissao'] = array(
            "tipo" => "int",
            "select" => (new comissao())->obterTodos(),
            "select_label" => "nome",
            "list" => (new comissao),
            "list_campo" => "nome"
        );
        $this->campos['descricao']['tipo'] = "text";
        $this->campos['tipo']['tipo'] = "bool";
        $this->campos['tipo']['label'] = "Votado como:";
        // $this->campos['anexo']['tipo'] = "file";
        parent::__construct("pareceres");
    }
}
?>