<?php

require_once '../conexao.php';    

 abstract class CrudMarca extends DB {   
    
    protected $tabela;
    public $id;
    public $marca;
  
     
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function getMarca() {
        return $this->marca;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
}


?>