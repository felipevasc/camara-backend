<?php
class vereadorDao extends genericoDao {
    public function __construct() {
        $this->campos['nome_urna']['tipo'] = "str";
        $this->campos['nome_urna']['label'] = "Nome na Urna"; 
        $this->campos['nome']['tipo'] = "str";
        $this->campos['solicitar_palavra']['tipo'] = "bool";
        $this->campos['solicitar_palavra']['nao_edita'] = "true";
        $this->campos['solicitar_palavra']['nao_cadastra'] = "true";
        $this->campos['numero']['tipo'] = "int";
        $this->campos['numero']['label'] = "Telefone P/ Contato"; 
        $this->campos['email']['tipo'] = "str";
        $this->campos['senha']['tipo'] = "pass";
        $this->campos['imagem']['tipo'] = "file";
        $this->campos['microfone']['tipo'] = "bool";
        
        $this->campos['partido'] = array(
            "tipo" => "int",
            "select" => (new partido())->obterTodos(),
            "select_label" => "nome",
            "list" => (new partido),
            "list_campo" => "nome"
        );
        parent::__construct("vereadores");
    }
}
?>