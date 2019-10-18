<?php
class emendaDao extends genericoDao {    
    public function __construct() {
        $this->campos['nome']['tipo'] = "str";
        $this->campos['nome']['label'] = "Numero";
        $this->campos['descricao']['tipo'] = "text";
        $this->campos['descricao']['label'] = "Texto Emenda";
        $this->campos['projeto'] = array(
            "tipo" => "int",
            "select" => (new projeto())->obterTodos(),
            "select_label" => "nome",
            "list" => (new projeto),
            "list_campo" => "nome"
        );
        $this->campos['aprovado']['tipo'] = "bool";
        $this->campos['aprovado']['nao_cadastra'] = "true";
        $this->campos['pautado']['tipo'] = "bool";
        $this->campos['ordem']['tipo'] = "int";
        $this->campos['ordem']['nao_edita'] = "true";
        $this->campos['ordem']['nao_cadastra'] = "true";
        parent::__construct("emendas");
    }
}
?>