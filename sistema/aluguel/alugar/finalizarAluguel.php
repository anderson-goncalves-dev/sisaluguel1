<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'aluguel.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>
Finalizar aluguel
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
          <h1 class>Finalizar aluguel<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../alugar/listarAluguelDisponivel.php">Aluguéis em andamento</a></li>
       
        </ul>
</div>       

<?php    
      $aluguel = new aluguel;
      $id_aluguel = $_POST['id_aluguel'];
      
      if(isset($_POST['submit'])):
            $descricao = $_POST['dispesa_adicional'];
            $valor_adicional = $_POST['valor_adicional'];
            $id_aluguel = $_POST['id_aluguel'];
            $aluguel->setDescricao($descricao);
            $aluguel->setValorAdicional($valor_adicional);
            $aluguel->setID($id_aluguel);
            if($aluguel->updateAdicional()){
                echo "<script language='javascript' type='text/javascript'> alert('Aluguel finalizado com sucesso');window.location.href='listarAluguelDisponivel.php';</script>";
            }   
      endif;
    ?>
               <div class="box1">
        <div class="form-box">
                
                    <form action="" method="post">
                    <fieldset>
            <div class="margem">
                            <legend><b>Valores Adicionais</b></legend><br>
                            <div class="inputBox">
                                <label for="dispesa_adicional">Despesas adicionais:</label><br>
                                <textarea type="text" name="dispesa_adicional"  required> </textarea>  
                            </div><br>
                            <div class="inputBox">
                                <label for="valor_adicional">Valor:</label><br>
                                <input type="number" name="valor_adicional" placeholder="Valor" required>   
                            </div>
                            <div class="inputBox">
                                <label for="id_aluguel"> </label>
                                <input type="hidden" name="id_aluguel" value="<?php echo $id_aluguel?>"  required>   
                            </div>
                            <br><br>                                                
                            <input type="submit" name="submit" id="submit">

                            </form>
                
                </div>

        </fieldset>
        </form>
        </div>  
        </div>
            </main>
            <script src="../mobile-navbar.js"></script>

            <footer class="bg1">
                <p>Informações ao consumidor: Locar Rent a Car S/A - CNPJ nº 125.970.085/0001-99</p>

                    <p>Sede: Avenida Barão do Rio Branco, n° 600 - Guanambi - CEP: 46430-000 - Guanambi - BA</p>
                    
                    <p>Central de Reservas e Assistência a Clientes 24h: 0800 555 8080</p>
                    
                   <p> Central de Reservas 24 horas: 0 800 555 9000 | Assistência a Clientes 24 horas: 0 800 555 9000</p>
                   <p> E-mail: centraldereservas@locar.com</p>
            </footer>
        
            
        </body>
</html>