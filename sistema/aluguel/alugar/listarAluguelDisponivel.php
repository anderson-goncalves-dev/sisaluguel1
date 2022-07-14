<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'aluguel.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de Aluguéis em Andamento</title>
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
          <h1 class>Lista de aluguéis em andamento<h1>
            </div>
            <div class="menuInferior">
            <ul>
      
       
        <li><a href="../veiculo/listaVeiculoDisponiveis.php">Carros para Alugar</a></li>
        <li>>></li>
        <li><a href="../alugar/listarAluguel.php">Todos os Aluguéis </a></li>
        </ul>
</div>
            <main class="mainn3">
        
          <div id="teste">   
   
   
    <!-- Inicio da tabela -->
    <table class="tabela">
                <thead>
                    <tr class="active">
                        <th>CLIENTE</th>
                        <th>VEICULO</th>
                        <th>DATA INICIO</th>
                        <th>DATA FINAL</th>
                        <th>VALOR TOTAL</th> 
                        <th></th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $aluguel=New Aluguel();
                    
                    foreach ($aluguel->findAllDisponivel() as $key => $value) { ?> 
          
                    <tr>
                        <td> <?php echo $value->nome;?> </td> 

                        <td> <?php echo $value->modelo;?> </td>

                        <td> <?php echo $value->data_inicio;?> </td>
                        
                        <td> <?php echo $value->data_final;?> </td>
                        
                        <td> <?php echo $value->valor_total;?> </td>
                    <td>

                        
                     <td>       
                         <form method="post" action="finalizarAluguel.php">
                                <input name="id_cliente" type="hidden" value="<?php echo $value->id_cliente;?>"/>                  
                                <input name="id_veiculo" type="hidden" value="<?php echo $value->id_veiculo;?>"/>
                                <input name="data_inicio" type="hidden" value="<?php echo $value->data_inicio;?>"/>
                                <input name="data_final" type="hidden" value="<?php echo $value->data_final;?>"/>
                                <input name="valor_total" type="hidden" value="<?php echo $value->valor_total;?>"/>
                                <input name="id_aluguel" type="hidden" value="<?php echo $value->id_aluguel;?>"/>
                                <button name="alterar" type="submit" class="finalizar">Finalizar</button>
                                </form>
                         </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->
            </main>
                  
                  <script src="../mobile-navbar.js"></script>
      
                  <footer>
                          <p>Informações ao consumidor: Locar Rent a Car S/A - CNPJ nº 125.970.085/0001-99</p>
      
                              <p>Sede: Avenida Barão do Rio Branco, n° 600 - Guanambi - CEP: 46430-000 - Guanambi - BA</p>
                              
                              <p>Central de Reservas e Assistência a Clientes 24h: 0800 555 8080</p>
                              
                             <p> Central de Reservas 24 horas: 0 800 555 9000 | Assistência a Clientes 24 horas: 0 800 555 9000</p>
                             <p> E-mail: centraldereservas@locar.com</p>
                      </footer>



   

</body>
</html>