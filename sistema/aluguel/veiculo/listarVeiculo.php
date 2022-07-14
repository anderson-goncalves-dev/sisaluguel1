<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'veiculo.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de carros</title>
        <link rel="stylesheet" href="../estilo.css">
        
</head>

<body>
<header >
        <nav>
        <div><img src="../imagens/logo.png" alt="" width="180px"></div>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
        <li><a href="../home.php">Home |</a></li>
        <li><a href="../marca/listarMarca.php">Marca |</a></li>
        <li><a href="../modelo/listarModelo.php">Modelo |</a></li>
        <li><a href="../veiculo/listaVeiculoDisponiveis.php">Carros para Alugar |</a></li>
        <li><a href="../alugar/listarAluguelDisponivel.php">Aluguéis |</a></li>
          <li><a href="../veiculo/listarVeiculo.php">Carros |</a></li>
          <li><a href="../cliente/listarCliente.php">Clientes |</a></li>
          <li><a href="../funcionario/listarFuncionario.php">Funcionários |</a></li>
          <li><a href="../../index.php">Sair </a></li>
        </ul>
      </nav>
              
          </header>
          <div class="tituloCliente">
          <h1 class>Lista de Veículos<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../veiculo/cadastrarVeiculo.php">Cadastrar veículo</a></li>
        
        </ul>
</div>
</div>
            <main class="mainn1">
        
          <div id="teste">   
    <!-- Inicio da tabela -->
    <table class="tabela">
                <thead>
                    <tr class="active">
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Situação</th>
                        <th>Diária</th>
                        <th>Placa</th>
                        <th>Ano</th>
                        <th></th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $veiculo=New Veiculo();

                    //exclusao 
                    if (isset($_POST['excluir'])){
                                            
                        $id = $_POST['id'];
                        
                        $veiculo->delete($id);
                    }
                                                         
                    
                    

                    foreach ($veiculo->findAll() as $key => $value) { ?> 
          
                    <tr>
                        <td> <?php echo $value->id_veiculo;?> </td> 

                        <td> <?php echo $value->marca;?> </td>

                        <td> <?php echo $value->modelo;?> </td>
                        
                        <td> <?php echo $value->situacao;?> </td>
                        
                        <td> <?php echo $value->valor_diaria;?> </td>

                        <td> <?php echo $value->placa;?> </td>

                        <td> <?php echo $value->ano;?> </td>


                    <td>

                        <form method="post" action="alterarVeiculo.php">
                                <input name="id_veiculo" type="hidden" value="<?php echo $value->id_veiculo;?>"/>                  
                                <input name="id_marca" type="hidden" value="<?php echo $value->id_marca;?>"/>
                                <input name="id_modelo" type="hidden" value="<?php echo $value->id_modelo;?>"/>
                                <input name="situacao" type="hidden" value="<?php echo $value->situacao;?>"/>
                                <input name="valor_diaria" type="hidden" value="<?php echo $value->valor_diaria;?>"/>
                                <input name="placa" type="hidden" value="<?php echo $value->placa;?>"/>
                                <input name="ano" type="hidden" value="<?php echo $value->ano;?>"/>
                              
                                <button name="alterar" id="submit" type="submit">Alterar</button>
                                
                                </form>
                         </tr>
                    
                    
                   
                    <?php } ?>
                    </tbody>
                    </table>
                    <!-- Fim da tabela -->
                    </main>

                    <script src="../mobile-navbar.js"></script>

                    <footer class="">
                        <p>Informações ao consumidor: Locar Rent a Car S/A - CNPJ nº 125.970.085/0001-99</p>

                            <p>Sede: Avenida Barão do Rio Branco, n° 600 - Guanambi - CEP: 46430-000 - Guanambi - BA</p>
                            
                            <p>Central de Reservas e Assistência a Clientes 24h: 0800 555 8080</p>
                            
                        <p> Central de Reservas 24 horas: 0 800 555 9000 | Assistência a Clientes 24 horas: 0 800 555 9000</p>
                        <p> E-mail: centraldereservas@locar.com</p>
                    </footer>

</body>
</html>