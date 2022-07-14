<?php
session_start();
require_once '../conexao.php'; 

if(empty($_POST['email']) || empty($_POST['senha'])){
    header('location:../../index.php');
    die();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql= "SELECT email,senha from usuario where email = '{$email}' and senha = md5('{$senha}')";
$smt = DB::prepare($sql);
$smt->execute();
$linhas = $smt->rowCount();



if($linhas == 1){
    $_SESSION['email'] = $email;
    header('Location:../home.php');
    
}else{
    echo "<script language='javascript' type='text/javascript'> alert('Dados incorretos');window.location.href='http://localhost/sistema/';</script>";
}


