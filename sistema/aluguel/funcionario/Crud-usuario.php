<?php

require_once '../conexao.php';    
 abstract class CrudUsuario extends DB {  
    
    protected $tabela;
    public $nome;
    public $cpf;
    public $telefone;
    public $data_nascimento;
    public $cidade;
    public $bairro;
    public $rua;
    public $numero;
    public $email;
    public $senha;
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }
    
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getCpf() {
        return $this->cpf;
    }
    
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }
    public function getData_nascimento() {
        return $this->data_nascimento;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function getCidade() {
        return $this->cidade;
    }
    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    public function getBairro() {
        return $this->bairro;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }
    public function getRua() {
        return $this->rua;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function getNumero() {
        return $this->numero;
    }

    public function setEmail($email) {
       $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function getSenha() {
        return $this->senha;
    }
}