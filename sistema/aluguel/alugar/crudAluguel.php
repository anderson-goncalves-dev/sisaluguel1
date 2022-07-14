<?php

require_once '../conexao.php';    

 abstract class CrudAluguel extends DB {   
    
    protected $tabela;
    public $id;
    public $id_cliente;
    public $id_veiculo;
    public $data_inicio;
    public $data_final;
    public $situacao_aluguel;
    public $valor_total;
    public $descricao;
    public $valor_adicional;
   
    
    
    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }
    public function getId_cliente() {
        return $this->id_cliente;
    }
    public function setId($id_aluguel) {
        $this->id = $id_aluguel;
    }
    public function getIdAluguel() {
        return $this->id;
    }
    
    public function setIdVeiculo($id_veiculo) {
        $this->id_veiculo = $id_veiculo;
    }
    public function getIdVeiculo() {
        return $this->id_veiculo;
    }
    
    public function setDataInicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }
    public function getDataInicio() {
        return $this->data_inicio;
    }

    public function setDataFinal($data_final) {
        $this->data_final = $data_final;
    }
    public function getDataFinal() {
        return $this->data_final;
    }
    public function setSituacao($situacao) {
        $this->situacao_aluguel = $situacao;
    }
    public function getSituacao() {
        return $this->situacao_aluguel;
    }

    public function setValorTotal($valor_total) {
        $this->valor_total = $valor_total;
    }
    public function getValorTotal() {
        return $this->valor_total;
    }

    public function setValorAdicional($valor_adicional) {
        $this->valor_adicional = $valor_adicional;
    }
    public function getValorAdicional() {
        return $this->valor_adicional;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    
}


?>