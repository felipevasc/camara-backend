<?php

class presenca extends generico {
    
    public function getByData($data) {
        return $this->getByCondicao("WHERE data = '{$data}' ORDER BY id");
    }

    public function check($id_vereador, $data='') {
        $row = $this->getByVereador($id_vereador, $data);
        if (!empty($row['id'])) {
            return true;
        }
        else {
            return false;
        }
    }
    public function getByVereador($id_vereador, $data='') {
        if (empty($data)) {
            $data = date('Y-m-d H:i:s');
        }
        else {
            $data = funcoes::desformatarData($data);
        }
        $condicao = "WHERE vereador = {$id_vereador} and SUBSTRING(data, 1, 10) = SUBSTRING('{$data}', 1, 10) ";
        $rs = $this->getByCondicao($condicao);
        if (count($rs) > 0) {
            return $rs[0];
        }
        else {
            return null;
        }
    }
    
    public function getMaiorData() {
        $rs = $this->getCamposByCondicao("MAX(data) as data", "WHERE SUBSTRING(data, 1, 10) = '".date('Y-m-d')."'");
        if (count($rs) > 0) {
            return $rs[0]['data'];
        }
        else {
            return 0;
        }
    }
}
