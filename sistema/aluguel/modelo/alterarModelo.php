<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'modelo.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
<title>Alteração de um Modelo</title>
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
          <h1 class>Alterar dados de um modelo de veículo<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../modelo/listarModelo.php">Lista de Modelos</a></li>
        
        </ul>
</div>
   <?php  
      // Alterar

      $modeloVeiculo  = $_POST['modelo'];
      $id_modelo = $_POST['id_modelo'];
      $id_marca = $_POST['id_marca'];
      $marca = $_POST['marca'];

      $modelo = new modelo();
      
       if ( isset($_POST['alterarDados'])){
            
           $modelo = new Modelo();
           $modelo->setModelo($modeloVeiculo);
           if($modelo->update($id_modelo)){
            echo "<script language='javascript' type='text/javascript'> alert('Modelo alterado com sucesso');window.location.href='listarModelo.php';</script>";
           }
       }
    
    ?>
   <div class="box1">
        <div class="form-box">

  <form method='post' action="">
    <fieldset>
    <div class="margem">
    <div class="inputBox">
        <label for='modelo'> Modelo:</label><br>
        <input type="text" name="modelo" value="<?php echo $modeloVeiculo;?>"/>
        <input type="hidden" name="id_modelo" value="<?php echo $id_modelo; ?>"/>
        </dv><br><br>
        <label for="marca">Escolha uma marca</label><br>
            <select name="id_marca" id="escolha-marca"> 
            <option value="<?php echo $marca?>"> <?php echo $marca?> </option>    
            </select>
            <br><br>
        <input type="submit" id="submit"name="alterarDados"/>
               
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
