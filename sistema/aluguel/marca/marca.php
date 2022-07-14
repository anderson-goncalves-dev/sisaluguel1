<?php

require_once 'crudMarca.php';

 class Marca extends crudMarca {
    
    protected $tabela = 'marca';  
      
    
     //faz insert   
    public function insert() {
        $sql = "INSERT INTO $this->tabela (marca) VALUES (:marca)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':marca', $this->marca); 
        return $stm->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->tabela SET marca=:marca  WHERE id_marca = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':marca', $this->marca);
        return $stm->execute();
    }
    
    //busca 1 item
    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id_marca = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
   
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    //deleta  1 item
    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE id_marca = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    

  
    
}
