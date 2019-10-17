<?php
class comissao extends generico {
    public function getByProjeto($id_projeto) {
           return $this->getCamposByCondicao("c.*", "c JOIN comissoes_projetos cp ON (c.id = cp.comissao) WHERE cp.projeto = {$id_projeto} ORDER BY c.nome");
       }
}
?>