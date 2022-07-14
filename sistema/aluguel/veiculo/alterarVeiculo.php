<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'veiculo.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Alteração de um veiculo</title>
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
          <h1 class>Alterar dados de um veículo<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../veiculo/listarVeiculo.php">Lista de veiculos</a></li>
        
        </ul>
</div>
   <?php  
      // Alterar

      $id_veiculo = $_POST['id_veiculo'];
      $valor_diaria = $_POST['valor_diaria'];
      $situacao = $_POST['situacao'];

      $veiculo = new veiculo();
      $lista = $veiculo->findUnit($id_veiculo);

    if ( isset($_POST['alterarDados'])){
       
           $veiculo = new Veiculo();
           $veiculo->setValordiaria($valor_diaria);
           $veiculo->setsituacao($situacao);
           if($veiculo->update($id_veiculo)){
            echo "<script language='javascript' type='text/javascript'> alert('Veiculo alterado com sucesso');window.location.href='listarVeiculo.php';</script>";
           }
   
       }
    
    ?>

                        <div class="box1">
                                <div class="form-box">

                        <form method='post' action="">
                            <fieldset>
                            <div class="margem">
                            <legend><b>Alterar dados do veiculo <?php echo $lista->modelo ?>  </b></legend><br>
                            <br><br>
                            <div class="inputBox">
                            <label for="valor_diaria" >Valor diaria:</label>
                                <input value="<?php echo $valor_diaria?>" type="text" name="valor_diaria" id="valor_diaria"  required>
                                
                            </div>
                            <br><br>
                            
                            <div class="inputBox">
                                <label for="modelo">Situação:</label>
                                <select name="situacao" id="escolha-modelo">
                                    <option value="<?php echo $situacao ?>"> <?php echo $situacao ?> </option>
                                    <option value="disponivel"> Disponivel </option>
                                    <option value="alugado"> Alugado </option>
                                    <option value="manutencao"> Em manutenção </option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <input type="hidden" name="id_veiculo" value="<?php echo $id_veiculo; ?>"/>
                                
                            </div>
                            <br><br>
                            
                            <input type="submit" name="alterarDados" id="submit">

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

                    <script>
                        function alteraModelo(marca_el) {
                            url ='http://localhost/sistema/aluguel/www/endPoint.php?id_marca='+marca_el.value;
                            xhr = new XMLHttpRequest();
                            xhr.open('GET',url,true);
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4) {
                                    if (xhr.status = 200){
                                        preencherModelosSelect(JSON.parse(xhr.responseText));
                                    }
                                }
                            }
                            xhr.send();
                        }

                        function preencherModelosSelect(modelos){
                            modelo_el = document.getElementById('escolha-modelo');
                            options='';
                            for(var key in modelos){
                                options += "<option value='"+modelos[key].id_modelo+"' >"+modelos[key].modelo+"</option>";
                            }
                            modelo_el.innerHTML = options;
                            
                        }
                        marca_el= document.getElementById('escolha-marca');
                        alteraModelo(marca_el);

                    </script>
</body>
</html>