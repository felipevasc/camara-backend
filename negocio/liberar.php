<?php
class liberar extends generico {
       public function getDados() {
           $rs = $this->obterTodos();
           $i = 0;
           while (count($rs) == 0 && $i < 20) {
               $i++;
               $this->set(array());
               $rs = $this->obterTodos();
           }
           return $rs[0];
       }
    public function getTempo() {
        $row = $this->getDados();
        if ($row['expediente'] == 'pequeno') {
            return 5 * 60;
        }
        else if ($row['expediente'] == 'grande') {
            return 20 * 60;
        }
        else if ($row['expediente'] == 'explicacao') {
            return 5 * 60;
        }
        else if ($row['expediente'] == 'debate') {
            return 2 * 60;
        }
        else {
            return 10 * 60;
        }
    }
    public function getExpediente() {
        $row = $this->getDados();
        if ($row['expediente'] == 'pequeno') {
            return "Pequeno Expediente";
        }
        else if ($row['expediente'] == 'grande') {
            return "Grande Expediente";
        }
        else if ($row['expediente'] == 'explicacao') {
            return "Explicação Pessoal";
        }
        else if ($row['expediente'] == 'debate') {
            return "Debate de Projetos";
        }
        else {
            return "";
        }
    }
}
?>