<?php

class projeto extends generico {

    public function getProjetoAberto() {
        $rs = $this->getByCondicao("WHERE votacao_aberta is true");
        if (count($rs) > 0) {
            return $rs[0]['id'];
        } else {
            return null;
        }
    }

    public function getProjetoOrdem() {
        return $this->getByCondicao("WHERE ordem is not null ORDER BY ordem");
    }

    public function getProjetoSemOrdem() {
        return $this->getByCondicao("WHERE ordem is null ORDER BY nome");
    }

    public function getMaiorOrdem() {
        $rs = $this->getCamposByCondicao("MAX(ordem) as ordem", "");
        if (count($rs) == 0) {
            return 0;
        } else {
            return $rs[0]['ordem'];
        }
    }

    public function set($dados_formulario) {
        $ordem = $this->getProximaOrdem();
        $dados_formulario['ordem'] = $ordem;
        parent::set($dados_formulario);
        $rs = $this->getByCondicao("WHERE nome like '{$dados_formulario['nome']}' ORDER BY id DESC LIMIT 1");
        if (count($rs) > 0) {
            $row = $rs[0];
            $tmp = array();
            $tmp['projeto'] = $row['id'];
            $comissaoProjeto = new comissaoProjeto();
            foreach ($dados_formulario['comissoes'] as $id_comissao) {
                $tmp['comissao'] = $id_comissao;
                $comissaoProjeto->set($tmp);
            }
            return true;
        }
        return false;
    }

    public function obterPorOrdem() {
        return $this->getCamposByCondicao("id, nome, descricao, autor, ordem, 'PROJETO' as tipo, id as projeto", "WHERE aprovado is null and pautado is true "
                        . "UNION "
                        . "SELECT e.id, concat(p.nome, '<br/>- ', e.nome, '') as nome, e.descricao, p.autor, e.ordem, 'EMENDA' as tipo, p.id as projeto "
                        . "FROM emendas e "
                        . "     JOIN projetos p ON (e.projeto = p.id) "
                        . "WHERE e.aprovado is null "
                        . "     and e.pautado is true "
                        . "ORDER BY ordem");
    }

    public function obterOutros() {
        return $this->getCamposByCondicao("id, nome, descricao, autor, ordem, 'PROJETO' as tipo", "WHERE aprovado is null and pautado is not true "
                        . "UNION "
                        . "SELECT e.id, concat(p.nome, '<br/>- ', e.nome, '') as nome, e.descricao, p.autor, e.ordem, 'EMENDA' as tipo "
                        . "FROM emendas e "
                        . "     JOIN projetos p ON (e.projeto = p.id) "
                        . "WHERE e.aprovado is null "
                        . "     and e.pautado is not true "
                        . "ORDER BY ordem");
    }

    public function getProximaOrdem() {
        $rs = $this->getCamposByCondicao("MAX(ordem) + 1 as ordem "
                . "FROM (SELECT max(ordem) as ordem FROM emendas UNION SELECT max(ordem) as ordem ", ") ");
        if (count($rs) > 0) {
            $ordem = $rs[0]['ordem'];
        } else {
            $ordem = 0;
        }
        return $ordem;
    }
    
    public function ajustaOrdenacao() {
        $rs = $this->getCamposByCondicao("id, ordem, 'PROJETO' as tipo", 
                "WHERE aprovado is null and pautado is true "
                . "UNION "
                . "SELECT id, ordem, 'EMENDA' as tipo "
                . "FROM emendas "
                . "WHERE aprovado is null and pautado is true "
                . "ORDER BY ordem");
        $emenda = new emenda();
        foreach ($rs as $i => $row) {
            $tmp = array();
            $tmp['id'] = $row['id'];
            $tmp['ordem'] = $i + 1;
            if ($row['tipo'] == 'PROJETO') {
                $this->update($tmp);
            }
            else {
                $emenda->update($tmp);
            }
        }
    }

    public function sobeOrdem($ordem) {
        $emenda = new emenda();
        $anterior = $ordem - 1;
        $rs = $this->getByCondicao("WHERE aprovado is null and pautado is true and ordem = {$ordem}");
        $emenda_rs = $emenda->getByCondicao("WHERE aprovado is null and pautado is true and ordem = {$ordem}");
        
        $rs_ant = $this->getByCondicao("WHERE aprovado is null and pautado is true and ordem = {$anterior}");
        $emenda_rs_ant = $emenda->getByCondicao("WHERE aprovado is null and pautado is true and ordem = {$anterior}");
        if (count($rs) > 0) {
            if (count($rs_ant) > 0) {
                $tmp = array();
                $tmp['id'] = $rs[0]['id'];
                $tmp['ordem'] = $anterior;
                $this->update($tmp);
                $tmp = array();
                $tmp['id'] = $rs_ant[0]['id'];
                $tmp['ordem'] = $ordem;
                $this->update($tmp);
            } else if (count($emenda_rs_ant) > 0) {
                $tmp = array();
                $tmp['id'] = $rs[0]['id'];
                $tmp['ordem'] = $anterior;
                $this->update($tmp);
                $tmp = array();
                $tmp['id'] = $emenda_rs_ant[0]['id'];
                $tmp['ordem'] = $ordem;
                $emenda->update($tmp);
            }
            else {
                
            }
        } else if (count($emenda_rs) > 0) {
            if (count($rs_ant) > 0) {
                $tmp = array();
                $tmp['id'] = $emenda_rs[0]['id'];
                $tmp['ordem'] = $anterior;
                $emenda->update($tmp);
                $tmp = array();
                $tmp['id'] = $rs_ant[0]['id'];
                $tmp['ordem'] = $ordem;
                $this->update($tmp);
            } else {
                $tmp = array();
                $tmp['id'] = $emenda_rs[0]['id'];
                $tmp['ordem'] = $anterior;
                $emenda->update($tmp);
                $tmp = array();
                $tmp['id'] = $emenda_rs_ant[0]['id'];
                $tmp['ordem'] = $ordem;
                $emenda->update($tmp);
            }
        }
    }

}

?>