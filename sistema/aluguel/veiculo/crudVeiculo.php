<?php

require_once '../conexao.php';    

 abstract class CrudVeiculo extends DB {   
    
    protected $tabela;
    public $id;
    public $id_marca;
    public $id_modelo;
    public $situacao;
    public $valor_diaria;
    public $placa;
    public $ano;

  
     
    public function setIdModelo($id_modelo) {
        $this->id_modelo = $id_modelo;
    }
    public function getIdModelo() {
        return $this->id_modelo;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    public function setIdMarca($id_marca) {
        $this->id_marca = $id_marca;
    }
    
    public function getIdMarca() {
        return $this->id_marca;
    }
    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }
    
    public function getSituacao() {
        return $this->situacao;
    }
    public function setAno($ano) {
        $this->ano = $ano;
    }
    
    public function getAno() {
        return $this->ano;
    }
    public function setValorDiaria($valor_diaria) {
        $this->valor_diaria = $valor_diaria;
    }
    
    public function getValorDiaria() {
        return $this->valor_diaria;
    }
    public function setPlaca($placa) {
        $this->placa = $placa;
    }
    
    public function getPlaca() {
        return $this->placa;
    }
}


?>