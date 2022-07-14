<?php

require_once '../conexao.php';    

 abstract class CrudModelo extends DB {   
    
    protected $tabela;
    public $id;
    public $id_marca;
    public $modelo;
  
     
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function getModelo() {
        return $this->modelo;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    public function setIdMarca($id) {
        $this->id_marca = $id;
    }
    
    public function getIdMarca() {
        return $this->id_marca;
    }
}


?>