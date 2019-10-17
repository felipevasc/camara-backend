<?php
class emenda extends generico {
    
    public function getByProjeto($projeto) {
        return $this->getByCondicao("WHERE projeto = {$projeto} ORDER BY nome");
    }
    
    public function set($dados_formulario) {
        $projeto = new projeto();
        $ordem = $projeto->getProximaOrdem();
        $dados_formulario['ordem'] = $ordem;
        return parent::set($dados_formulario);
    }
}