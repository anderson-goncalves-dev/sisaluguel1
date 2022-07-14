<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'Marca.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>
 Cadastre-se
</title>
<meta charset="UTF-8">
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
          <h1 class>Cadastrar Marca<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../marca/listarMarca.php">Lista de Marcas</a></li>
        
        </ul>
</div>
<?php    
      $marca = new Marca;
      if(isset($_POST['submit'])):
            $marcaVeiculo = $_POST['marca'];
            $marca->setMarca($marcaVeiculo);

            if($marca->insert()){
                echo "<script language='javascript' type='text/javascript'> alert('Marca cadastrada com sucesso');window.location.href='listarMarca.php';</script>";
            }
      endif;
    ?>
                 <div class="box1">
        <div class="form-box">
              
                
                    <form action="" method="post">
                    <fieldset>
                        <div class="margem">
                            <legend><b>Cadastrar</b></legend><br>
                            <div class="inputBox">
                                <label for="nome" >Nome da marca:</label>
                                <input type="text" name="marca" id="marca" placeholder="Marca" required>   
                            </div>
                            <br><br>                                                
                            <input type="submit" name="submit" id="submit">

                        
                            </fieldset>
                    </form>
                
                  </div>
                    
                  </fieldset>
            </form>
            </div>  
            </div>
                </main>
                <script src="../mobile-navbar.js"></script>
                <footer class="bg3">
                        <p>Informações ao consumidor: Locar Rent a Car S/A - CNPJ nº 125.970.085/0001-99</p>

                        <p>Sede: Avenida Barão do Rio Branco, n° 600 - Guanambi - CEP: 46430-000 - Guanambi - BA</p>
                        
                        <p>Central de Reservas e Assistência a Clientes 24h: 0800 555 8080</p>
                        
                       <p> Central de Reservas 24 horas: 0 800 555 9000 | Assistência a Clientes 24 horas: 0 800 555 9000</p>
                       <p> E-mail: centraldereservas@locar.com</p>
                </footer>
            
        </body>
</html>