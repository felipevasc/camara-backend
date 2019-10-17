<?php
class vereador extends generico {
    public function getByName($nome) {
        $nome = str_replace(" ", "%", $nome);
        return $this->getByCondicao("WHERE upper(nome) like upper('%{$nome}%')");
    } 
     public function getAniversariantes() {
        $hoje = date("m-d");
        return $this->getByCondicao("WHERE data like '%{$hoje}'");
    }
    
    public function getUsoPalavra() {
        return $this->getByCondicao("WHERE solicitar_palavra = 1 ORDER BY nome DESC");
    }
    
    public function obterTodos() {
        return $this->getByCondicao("ORDER BY case when ordem is null then 1000 else ordem end, nome");
    }
}