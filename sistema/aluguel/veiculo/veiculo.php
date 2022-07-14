<?php

require_once 'crudVeiculo.php';

 class Veiculo extends crudVeiculo {
    
    protected $tabela = 'veiculo';  
      
    
     //faz insert   
    public function insert() {

        $sql = "SELECT placa FROM $this->tabela WHERE placa = :placa";
        $stm = DB::prepare($sql);
        $stm->bindParam(':placa', $this->placa, PDO::PARAM_STR);
        $stm->execute();
        $listaPlaca = $stm->fetch();
        $verificaPlaca = $listaPlaca->placa;

        if(strlen($this->placa ) != 7){
            echo "<script language='javascript' type='text/javascript'> alert('Esse Placa é invalida'); window.location.href='cadastrarVeiculo.php';</script>"; 
        }else{
            if($verificaPlaca == $this->placa){
                echo "<script language='javascript' type='text/javascript'> alert('Esse Placa já existe'); window.location.href='cadastrarVeiculo.php';</script>"; 
            }else{
                $sql = "INSERT INTO $this->tabela (id_marca, id_modelo, valor_diaria, placa, ano, situacao) VALUES (:id_marca, :id_modelo, :valor_diaria, :placa, :ano, :situacao)";
            $stm = DB::prepare($sql);
            $stm->bindParam(':id_marca', $this->id_marca);
            $stm->bindParam(':id_modelo', $this->id_modelo); 
            $stm->bindParam(':valor_diaria', $this->valor_diaria); 
            $stm->bindParam(':placa', $this->placa); 
            $stm->bindParam(':ano', $this->ano); 
            $stm->bindParam(':situacao', $this->situacao); 
            return $stm->execute();
            }

        }

    }
    public function update($id) {
        $sql = "UPDATE $this->tabela SET valor_diaria=:valor_diaria,situacao=:situacao WHERE id_veiculo = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':valor_diaria', $this->valor_diaria);
        $stm->bindParam(':situacao', $this->situacao);
        return $stm->execute();
    }
    
    //busca 1 item
    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela join marca on $this->tabela.id_marca = marca.id_marca join modelo on $this->tabela.id_modelo = modelo.id_modelo WHERE $this->tabela.id_veiculo = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
   
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela join marca on $this->tabela.id_marca = marca.id_marca join modelo on $this->tabela.id_modelo = modelo.id_modelo";
        $stm = DB::prepare($sql); 
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findAllDisponivel() {
        $sql = "SELECT * FROM $this->tabela join marca on $this->tabela.id_marca = marca.id_marca join modelo on $this->tabela.id_modelo = modelo.id_modelo where situacao = 'disponivel'";
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
        $sql = "DELETE FROM $this->tabela WHERE id_veiculo = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function exibeModelo($id_marca)
    {
        $sql = "SELECT * from modelo where id_marca = :id_marca";
        $stm = DB:: prepare($sql);
        $stm->bindParam(':id_marca',$id_marca, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();

    }
        
}


