<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../veiculo/veiculo.php';
require_once 'aluguel.php';
require_once '../cliente/clienteSql.php';


?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Alugar Carro</title>
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
          <h1 class>Alugar Carro<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../veiculo/listaVeiculoDisponiveis.php">Carros para Alugar</a></li>
        
        </ul>
</div>
<?php  
       
     $id_veiculo= $_POST['id_veiculo'];
     $valor_diaria = $_POST['valor_diaria'];
     $cliente = new Cliente();
     $lista_cliente = $cliente->findAll();
     $veiculo = new Veiculo();  
     $lista_veiculo = $veiculo->findUnit($id_veiculo);
       
      $aluguel = new Aluguel();
      if(isset($_POST['submit'])):
            $id_cliente = $_POST['id_cliente'];
            $id_veiculo = $_POST['id_veiculo'];
            $valor_total = $_POST['valor_total'];
            $data_inicio = $_POST['data_inicio'];
            $data_final = $_POST['data_final'];
            $situacao = $_POST['situacao'];
            
            $aluguel->setIdCliente($id_cliente);
            $aluguel->setIdVeiculo($id_veiculo);
            $aluguel->setValorTotal($valor_total);
            $aluguel->setDataInicio($data_inicio);
            $aluguel->setDataFinal($data_final);
            $aluguel->setSituacao($situacao);
            
           
            if($aluguel->insert()){
              echo "<script language='javascript' type='text/javascript'> alert('Aluguel realizado com sucesso');window.location.href='listarAluguelDisponivel.php';</script>";
            }endif;
            
  ?>
   <div class="box1">
        <div class="form-box">

  <form method='post' action="">
    <fieldset>
    <div class="margem">
  

    <div class="inputBox">
  <label for="cliente">Cliente</label>
  <select name="id_cliente" id="cliente">

      <?php foreach($lista_cliente as $lista_clientes){ ?>
      <option value="<?php echo $lista_clientes->id_cliente ?>"> <?php echo $lista_clientes->nome; ?> </option>
      <?php } ?>    
      </select>
  </div>
    
                            
    <div class="inputBox"><br>           

  <label for='veiculo'> Veiculo:</label>
  <input type="text" name="veiculo" value="<?php echo $lista_veiculo->modelo ?>"/>
  <input type="hidden" name="id_veiculo" value="<?php echo $lista_veiculo->id_veiculo?>"/>
  </div>
    
  
    <div class="inputBox"><br>
  <label for='valor_diaria'> valor_diaria:</label>
  <input type="text" id="valorDiaria" name="valor_diaria" value="<?php echo $lista_veiculo->valor_diaria;?>"/>
  </div>
    <br>
    <div class="inputBox">
  
  <label for="modelo">Situação</label>
      <select name="situacao" id="escolha-modelo">
          <option value="andamento"> Andamento </option>
          <option value="finalizado"> Finalizado </option>
  
          </select>
      </div>
    <br>
    <div class="inputBox">              
  <label for='data_inicio'>Data inicio: </label>    
  <input type="date" id="dataInicio" name="data_inicio" value="" onchange="calculaValorTotal()">
  </div>
  <br>
  <div class="inputBox"> 
  <label for='data_final'>Data final: </label>    
  <input type="date" id="dataFinal" name="data_final" value="" onchange="calculaValorTotal()">
  </div>
  <br>
  <div class="inputBox"> 
  <label for='valor_total'> valor total:</label>
  <input type="text" name="valor_total" value="" id="valorTotal">
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

                <footer class="bg2">
                    <p>Informações ao consumidor: Locar Rent a Car S/A - CNPJ nº 125.970.085/0001-99</p>

                        <p>Sede: Avenida Barão do Rio Branco, n° 600 - Guanambi - CEP: 46430-000 - Guanambi - BA</p>
                        
                        <p>Central de Reservas e Assistência a Clientes 24h: 0800 555 8080</p>
                        
                       <p> Central de Reservas 24 horas: 0 800 555 9000 | Assistência a Clientes 24 horas: 0 800 555 9000</p>
                       <p> E-mail: centraldereservas@locar.com</p>
                </footer>
            
 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="personalizado.js"></script>

        <script> 
        function calculaValorTotal(){
            var valorTotal ="";
            var valorDiaria = document.getElementById('valorDiaria').value;
            var dataInicio = document.getElementById('dataInicio').value;
            var dataFinal = document.getElementById('dataFinal').value;

            if(dataInicio && dataFinal && valorDiaria){
              const data1 = new Date(dataInicio);
              const data2 = new Date(dataFinal);
              if(data1 < data2){
                var diasAlugados = calcularDiasAlugados(data1,data2); 
                valorTotal = diasAlugados*valorDiaria;

              }else{
                alert("A data de inicio deve ser menor que a data final");
              }
            }

            document.getElementById('valorTotal').value = valorTotal;
            
        }

        function calcularDiasAlugados(data1, data2){
            
            const oneDay = 1000 * 60 * 60 * 24;
            const diffInTime = data2.getTime() - data1.getTime();
            const diffInDays = Math.round(diffInTime / oneDay) + 1;
            return diffInDays;
          
        }
      </script>
      
</body>
</html>