<?php
class projetoDao extends genericoDao {    
    public function __construct() {
        $this->campos['nome']['tipo'] = "str";
        $this->campos['ordem']['tipo'] = "int";
        $this->campos['ordem']['nao_edita'] = "true";
        $this->campos['ordem']['nao_cadastra'] = "true";
        $this->campos['votacao_aberta']['tipo'] = "bool";
        $this->campos['votacao_aberta']['nao_edita'] = "true";
        $this->campos['votacao_aberta']['nao_cadastra'] = "true";
        $this->campos['descricao']['tipo'] = "text";
        $this->campos['autor'] = array(
            "tipo" => "str",
            
        );
        $this->campos['pautado']['tipo'] = "bool";
        //$this->campos['anexo']['tipo'] = "file";
        parent::__construct("projetos");
    }
}
?>