<?php 
require 'login/verifica-login.php';
?>
<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Página Inicial</title>
        <link rel="stylesheet" href="estilo.css">
        
</head>

<body>
<header >
        <nav>
        <div><img src="imagens/logo.png" alt="" width="180px"></div>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
        <li><a href="home.php">Home |</a></li>
        <li><a href="marca/listarMarca.php">Marca |</a></li>
        <li><a href="modelo/listarModelo.php">Modelo |</a></li>
        <li><a href="veiculo/listaVeiculoDisponiveis.php">Carros para Alugar |</a></li>
        <li><a href="alugar/listarAluguelDisponivel.php">Aluguéis |</a></li>
          <li><a href="veiculo/listarVeiculo.php">Carros |</a></li>
          <li><a href="cliente/listarCliente.php">Clientes |</a></li>
          <li><a href="funcionario/listarFuncionario.php">Funcionários |</a></li>
          <li><a href="../index.php">Sair </a></li>
        </ul>
      </nav>
              
          </header>
          <main>
            <div class="imgCentro">
                Bem vindo
            </div>
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
