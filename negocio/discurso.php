<?php

class discurso extends generico {

    public function getDiscurso() {
        $rs = $this->obterTodos();
        if (count($rs) > 0) {
            return $rs[0];
        } else {
            return null;
        }
    }

}
