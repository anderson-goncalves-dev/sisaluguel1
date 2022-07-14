<?php

require_once 'Crud-usuario.php';

 class Usuario extends CrudUsuario {
    
    protected $tabela = 'usuario';  
      
    //busca 1 item
    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id_usuario = :id";
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
    
     //faz insert   
    public function insert() {
        $sql = "SELECT email FROM $this->tabela WHERE email = :email";
        $stm = DB::prepare($sql);
        $stm->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stm->execute();
        $listaEmail = $stm->fetch();
        $verificaEmail = $listaEmail->email;

        $sql = "SELECT cpf FROM $this->tabela WHERE cpf = :cpf";
        $stm = DB::prepare($sql);
        $stm->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stm->execute();
        $listaCpf = $stm->fetch();
        $verificaCpf = $listaCpf->cpf;

        $this->cpf = preg_replace( '/[^0-9]/is', '', $this->cpf );

        if (strlen($this->cpf) != 11) {
            echo "<script language='javascript' type='text/javascript'> alert('CPF invalido'); window.location.href='cadastro-funcionario.php';</script>";
        }else{
            if (preg_match('/(\d)\1{10}/', $this->cpf)) {
                echo "<script language='javascript' type='text/javascript'> alert('CPF invalido'); window.location.href='cadastro-funcionario.php';</script>";
            }else{
                if(empty($this->email)){
                    echo "<script language='javascript' type='text/javascript'> alert('O campo email deve ser preenchido'); window.location.href='cadastro-funcionario.php';</script>";
                }else{
                    if($this->email == $verificaEmail){
                        echo "<script language='javascript' type='text/javascript'> alert('Esse email já existe'); window.location.href='cadastro-funcionario.php';</script>";        
                    }else{
                        if(empty($this->cpf)){
                            echo "<script language='javascript' type='text/javascript'> alert('O campo CPF deve ser preenchido'); window.location.href='cadastro-funcionario.php';</script>";
                
                        }else{
                            if($this->cpf == $verificaCpf){
                                echo "<script language='javascript' type='text/javascript'> alert('CPF ja existe'); window.location.href='cadastro-funcionario.php';</script>";
                    
                            }else{
                                $sql = "INSERT INTO $this->tabela (nome, email, senha, cpf, cidade, bairro, rua, numero, telefone) VALUES (:nome, :email, :senha, :cpf, :cidade, :bairro, :rua, :numero, :telefone)";
                                $stm = DB::prepare($sql);
                                $stm->bindParam(':nome', $this->nome);
                                $stm->bindParam(':cpf', $this->cpf);
                                $stm->bindParam(':telefone', $this->telefone);
                                $stm->bindParam(':cidade', $this->cidade);
                                $stm->bindParam(':bairro', $this->bairro);
                                $stm->bindParam(':rua', $this->rua);
                                $stm->bindParam(':numero', $this->numero);
                                $stm->bindParam(':email', $this->email);
                                $stm->bindParam(':senha', $this->senha);
                                return $stm->execute();

                            }

                        }

                    }

                }

            }

        }     
    }
          
    
    public function delete($id){
        $sql = "DELETE FROM $this->tabela WHERE id_usuario = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stm->execute();
    } 

    public function update($id){

        $sql = "SELECT email FROM $this->tabela WHERE id_usuario <> :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $listaEmail = $stm->fetchAll();
       
        $sql = "SELECT cpf FROM $this->tabela WHERE id_usuario != :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $listaCpf = $stm->fetchAll();

        $this->cpf = preg_replace( '/[^0-9]/is', '', $this->cpf );

        if (strlen($this->cpf) != 11) {
            echo "<script language='javascript' type='text/javascript'> alert('CPF invalido'); window.location.href='listarFuncionario.php';</script>";
        }

        if (preg_match('/(\d)\1{10}/', $this->cpf)) {
            echo "<script language='javascript' type='text/javascript'> alert('CPF invalido'); window.location.href='listarFuncionario.php';</script>";
        }

        if(empty($this->email)){
            echo "<script language='javascript' type='text/javascript'> alert('O campo email deve ser preenchido'); window.location.href='listarFuncionario.php';</script>";
        }

        foreach($listaEmail as $email){
            if($this->email == $email->email){
                echo "<script language='javascript' type='text/javascript'> alert('Esse email já existe'); window.location.href='listarFuncionario.php';</script>";      
            }
        }

        if(empty($this->cpf)){
            echo "<script language='javascript' type='text/javascript'> alert('O campo CPF deve ser preenchido'); window.location.href='listarFuncionario.php';</script>";

        }

        foreach($listaCpf as $cpf){
            if($this->cpf == $cpf->cpf){
                echo "<script language='javascript' type='text/javascript'> alert('CPF ja existe'); window.location.href='listarFuncionario.php';</script>";
            }
        }
        $sql = "UPDATE $this->tabela SET nome=:nome, email=:email, cpf=:cpf, cidade=:cidade, bairro=:bairro, rua=:rua, numero=:numero, telefone=:telefone  WHERE id_usuario = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->nome);
        $stm->bindParam(':email', $this->email);
        $stm->bindParam(':cpf', $this->cpf);
        $stm->bindParam(':cidade', $this->cidade);
        $stm->bindParam(':bairro', $this->bairro);
        $stm->bindParam(':rua', $this->rua);
        $stm->bindParam(':numero', $this->numero);
        $stm->bindParam(':telefone', $this->telefone);
        return $stm->execute(); 
     
    }
 }               