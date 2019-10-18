<?php

class palavra extends generico {

    public function getByData($data) {
        return $this->getByCondicao("WHERE data = '{$data}' ORDER BY id");
    }
    
    public function removerPalavra($id_vereador) {
        $data = date('Y-m-d');
        if (empty($id_vereador)) {
            $sql = "vereador is null";
        }
        else {
            $sql = "vereador = {$id_vereador}";
        }
        $rs = $this->getByCondicao("WHERE {$sql} and data = '{$data}' ");
        foreach ($rs as $row) {
            $this->delete($row['id']);
        }
    }

    public function check($id_vereador, $data = '') {
        if (empty($data)) {
            $data = date('Y-m-d');
        } else {
            $data = funcoes::desformatarData($data);
        }
        $rs = $this->getByCondicao("WHERE vereador = {$id_vereador} and data = '{$data}' ");

        if (count($rs) > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>