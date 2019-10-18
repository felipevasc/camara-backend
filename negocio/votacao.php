<?php

class votacao extends generico {
    public function set($dados_formulario) {
        $resultado = $this->getResultadoVereador($dados_formulario['vereador']);
        if (!empty($resultado)) {
            return false;
        }
        return parent::set($dados_formulario);
    }
    public function getResultadoVereador($id_vereador) {
        $rs = $this->getByCondicao("WHERE vereador = {$id_vereador}");
        if (count($rs) > 0) {
            return $rs[0]['tipo_voto'];
        } else {
            return null;
        }
    }

    public function getResultado() {
        return $this->getCamposByCondicao("t.nome as tipo_voto, t.imagem, count(*) as qtd", "v JOIN tipos_votos t ON (v.tipo_voto = t.id) "
                . "GROUP BY t.id, t.nome, t.imagem");
    }
    public function getResultadoTipo($id_tipo_voto) {
        $rs = $this->getByCondicao("WHERE tipo_voto = {$id_tipo_voto}");
        return count($rs);
    }
    
    public function deleteVotacao() {
        $rs = $this->obterTodos();
        foreach ($rs as $row) {
            $this->delete($row['id']);
        }
    }

}