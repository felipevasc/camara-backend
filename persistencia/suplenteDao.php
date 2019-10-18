<?php
class suplenteDao extends genericoDao {    
    public function __construct() {
        $this->campos['nome_urna']['tipo'] = "str";
        $this->campos['nome']['tipo'] = "str";
        $this->campos['numero']['tipo'] = "int";
        $this->campos['numero']['label'] = "Telefone P/ Contato"; 
        $this->campos['email']['tipo'] = "str";
        $this->campos['senha']['tipo'] = "pass";
        //$this->campos['imagem']['tipo'] = "file";
        $this->campos['partido'] = array(
            "tipo" => "int",
            "select" => (new partido())->obterTodos(),
            "select_label" => "nome",
            "list" => (new partido),
            "list_campo" => "nome"
        );
        parent::__construct("suplentes");
    }
}
?>