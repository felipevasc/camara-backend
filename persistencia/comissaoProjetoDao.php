<?php
class comissaoProjetoDao extends genericoDao {    
    public function __construct() {
        $this->campos['comissao']['tipo'] = "int";
        $this->campos['projeto']['tipo'] = "int";
        parent::__construct("comissoes_projetos");
    }
}