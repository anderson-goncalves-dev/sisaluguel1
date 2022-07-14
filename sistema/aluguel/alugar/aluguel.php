<?php

require_once 'crudAluguel.php';

 class Aluguel extends crudAluguel {
    
    protected $tabela = 'aluguel';  
      
    
     //faz insert   
    public function insert() {
        $sql = "INSERT INTO $this->tabela (id_cliente, id_veiculo, data_inicio, data_final, valor_total, situacao_aluguel) VALUES (:id_cliente, :id_veiculo, :data_inicio, :data_final, :valor_total, :situacao_aluguel)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id_cliente', $this->id_cliente);
        $stm->bindParam(':id_veiculo', $this->id_veiculo);
        $stm->bindParam(':data_inicio', $this->data_inicio);
        $stm->bindParam(':data_final', $this->data_final);
        $stm->bindParam(':valor_total', $this->valor_total);
        $stm->bindParam(':situacao_aluguel', $this->situacao_aluguel);        
       
        return $stm->execute();
    }

    public function updateAdicional() {
        $sql = "UPDATE $this->tabela SET danosAdicionais=:descricao, valor_total=valor_total+:valor_adicional, valor_adicional=:valor_adicional, situacao_aluguel ='finalizado' Where id_aluguel = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':descricao', $this->descricao);
        $stm->bindParam(':valor_adicional', $this->valor_adicional);
        $stm->bindParam(':id', $this->id);
        return $stm->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->tabela SET id_cliente=:id_cliente, id_veiculo=:id_veiculo, data_inicio=:data_inicio, data_final=:data_final, valor_total=:valor_total, situacao_aluguel=:situacao_aluguel WHERE id_aluguel = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':id_cliente', $this->id_cliente);
        $stm->bindParam(':id_veiculo', $this->id_veiculo);
        $stm->bindParam(':data_inicio', $this->data_inicio);
        $stm->bindParam(':data_final', $this->data_final);
        $stm->bindParam(':valor_total', $this->valor_total);
        $stm->bindParam(':situacao_aluguel', $this->situacao_aluguel);
        return $stm->execute();
    }
    
    //busca 1 item
    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela join cliente on $this->tabela.id_cliente = cliente.id_cliente join veiculo on $this->tabela.id_veiculo = veiculo.id_veiculo inner join modelo on veiculo.id_modelo = modelo.id_modelo WHERE $this->tabela.id_aluguel = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
  
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela inner join cliente on $this->tabela.id_cliente = cliente.id_cliente inner join veiculo on $this->tabela.id_veiculo = veiculo.id_veiculo inner join modelo on veiculo.id_modelo = modelo.id_modelo";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findAllDisponivel() {
        $sql = "SELECT * FROM $this->tabela inner join cliente on $this->tabela.id_cliente = cliente.id_cliente inner join veiculo on $this->tabela.id_veiculo = veiculo.id_veiculo inner join modelo on veiculo.id_modelo = modelo.id_modelo where $this->tabela.situacao_aluguel = 'andamento'";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    //deleta  1 item
    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE id_aluguel = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
}