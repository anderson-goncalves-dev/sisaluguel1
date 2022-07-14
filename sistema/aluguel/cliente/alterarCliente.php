<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'clienteSql.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Alterar dados do cliente</title>
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
          <h1 class>Alterar dados do cliente<h1>
            
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../cliente/listarCliente.php">Lista de clientes</a></li>
        
        </ul>
</div>
   <?php  
      // Alterar

     
      $nome  = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $telefone = $_POST['telefone'];
      $cidade = $_POST['cidade'];
      $bairro = $_POST['bairro'];
      $rua = $_POST['rua'];
      $numero = $_POST['numero'];
      $email = $_POST['email'];
      $id = $_POST['id'];
     
       

       if ( isset($_POST['alterarDados'])){
            
           $cliente = new Cliente();
           $cliente->setNome($nome);
           $cliente->setCpf($cpf);
           $cliente->setTelefone($telefone);
           $cliente->setCidade($cidade);
           $cliente->setBairro($bairro);
           $cliente->setRua($rua);
           $cliente->setNumero($numero);
           $cliente->setEmail($email);
           if($cliente->update($id)){
            echo "<script language='javascript' type='text/javascript'> alert('Cliente alterado com sucesso');window.location.href='listarCliente.php';</script>";
            
           }
       }
    
    ?>
   
   <div class="box1">
        <div class="form-box">

  <form method='post' action="">
    <fieldset>
    <div class="margem">
  

 

    <div class="inputBox"> 

        <label for='Nome'> Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $nome;?>"/>
        </div>
  <br>

  
  <div class="inputBox"> 
        <label for='cpf'> CPF: </label>   <br> 
        <input type="text" maxlength="11" name="cpf" value="<?php echo $cpf;?>"/>
        </div>
  <br>

  
  <div class="inputBox"> 

        <label for='Telefone'> Telefone:</label><br>
        <input type="text" maxlength="11" name="telefone" value="<?php echo $telefone;?>"/>
        </div>
  <br>

  
  <div class="inputBox"> 
        <label for='cidade'> Cidade: </label>  <br>  
        <input type="text" name="cidade"value="<?php echo $cidade;?>"/>
        </div>
  <br>

  
  <div class="inputBox">    
        <label for='Bairro'> Bairro:</label><br>
        <input type="text" name="bairro" value="<?php echo $bairro;?>"/>
        </div>
  <br>

  
  <div class="inputBox"> 
        <label for='Numero'> Número: </label>   <br> 
        <input type="text" name="numero"value="<?php echo $numero;?>"/>
        </div>
  <br>

  
  <div class="inputBox"> 
        <label for='Rua'> Rua: </label>   <br> 
        <input type="text" name="rua"value="<?php echo $rua;?>"/>
        </div>
  <br>

  
  <div class="inputBox"> 
        <label for='Email'> Email: </label>   <br> 
        <input type="text" name="email"value="<?php echo $email;?>"/>
        </div>
  <br>

  
  <div class="inputBox"> 
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <input type="submit" id="submit" name="alterarDados"/>
               
        </fieldset>
</form>
</div>  
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
