<?php

class sessao extends generico {

    public function set($dados_formulario) {
        $rs = $this->obterTodos();
        if (count($rs) == 0) {
            return parent::set($dados_formulario);
        } else {
            $dados_formulario['id'] = $rs[0]['id'];
            return parent::update($dados_formulario);
        }
    }

}

?>