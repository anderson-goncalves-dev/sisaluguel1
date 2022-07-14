<?php

require_once '../veiculo/veiculo.php';

if (isset($_GET['id_marca'])) {
    $veiculo = new Veiculo();
    $modelos = $veiculo->exibeModelo($_GET['id_marca']);
    $modelos = json_encode($modelos);
    echo $modelos;
    
}

