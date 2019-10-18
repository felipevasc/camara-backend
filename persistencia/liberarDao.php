<?php
class liberarDao extends genericoDao {    
    public function __construct() {
        $this->campos['pequeno_expediente']['tipo'] = "date";
        $this->campos['grande_expediente']['tipo'] = "date";
        $this->campos['votacao_projeto']['tipo'] = "str";
        $this->campos['texto_projeto']['tipo'] = "str";
        $this->campos['microfone']['tipo'] = "bool";
        $this->campos['expediente']['tipo'] = "str";
        $this->campos['tv']['tipo'] = "str";
        $this->campos['inicio_sessao']['tipo'] = "date";
        $this->campos['sessao']['tipo'] = "str";
        parent::__construct("liberar");
    }
}
?>