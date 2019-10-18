<?php
class tipoVotoDao extends genericoDao {    
    public function __construct() {
        $this->campos['nome']['tipo'] = "str";
        $this->campos['imagem']['tipo'] = "file";
        parent::__construct("tipos_votos");
    }
}
?>