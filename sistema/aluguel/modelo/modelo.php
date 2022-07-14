<?php

require_once 'crudModelo.php';

 class Modelo extends crudModelo {
    
    protected $tabela = 'modelo';  
      
    
     //faz insert   
    public function insert() {
        $sql = "INSERT INTO $this->tabela (id_marca,modelo) VALUES (:id,:modelo)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $this->id_marca);
        $stm->bindParam(':modelo', $this->modelo); 
        return $stm->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->tabela SET  modelo=:modelo  WHERE id_modelo = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':modelo', $this->modelo);
        return $stm->execute();
    }
    
    //busca 1 item
    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id_modelo = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
   
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela join marca on $this->tabela.id_marca = marca.id_marca";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findAllMarcas() {
        $sql = "SELECT * FROM marca";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    //deleta  1 item
    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE id_modelo = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    

  
    
}
