<?php

include_once './conexao.php';

$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_STRING);
if(!empty($cpf)){
    
    $limit = 1;
    $result = "SELECT nome, id_cliente FROM cliente WHERE cpf =:cpf LIMIT :limit";
    
    $resultado = $conn->prepare($result);
    $resultado->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $resultado->bindParam(':limit', $limit, PDO::PARAM_INT);
    $resultado->execute();
    
    $array_valores = array();
    
    if($resultado->rowCount() != 0){
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $array_valores['nome'] = $row['nome']; 
        $array_valores['id_cliente'] = $row['id_cliente']; 
    }else{
        $array_valores['nome'] = 'Cliente não encontrado';        
    }
    echo json_encode($array_valores);
}