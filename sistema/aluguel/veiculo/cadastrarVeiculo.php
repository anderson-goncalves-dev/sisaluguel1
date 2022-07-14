<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'veiculo.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
          Cadastrar Veículo
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilo.css">
</head>
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
          <h1 class>Cadastrar veículo<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../veiculo/listarVeiculo.php">Lista de veiculos</a></li>
        
        </ul>
</div>
      <?php    
      $veiculo = new veiculo();
      $lista = $veiculo->findAllMarcas();
    //   var_dump($lista);
      
      if(isset($_POST['submit'])):
            $id_marca = $_POST['marca'];
            $id_modelo = $_POST['modelo'];
            $valor_diaria = $_POST['valor_diaria'];
            $placa = $_POST['placa'];
            $ano = $_POST['ano'];
            $situacao = $_POST['situacao'];

            $veiculo->setIdMarca($id_marca);
            $veiculo->setIdModelo($id_modelo);
            $veiculo->setValorDiaria($valor_diaria);
            $veiculo->setPlaca($placa);
            $veiculo->setAno($ano);
            $veiculo->setSituacao($situacao);  

            if($veiculo->insert()){
                echo "<script language='javascript' type='text/javascript'> alert('Veiculo cadastrado com sucesso');window.location.href='listaVeiculoDisponiveis.php';</script>";
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
                                <label for="marca">Escolha uma marca</label>
                                <select name="marca" id="escolha-marca" onchange="alteraModelo(this)">
                                    <?php foreach($lista as $listas){ ?>
                                    <option value="<?php echo $listas->id_marca ?>"> <?php echo $listas->marca; ?> </option>
                                    <?php } ?>    
                                </select>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <label for="modelo">Escolha o Modelo</label>
                                <select name="modelo" id="escolha-modelo">

                                </select>
                            </div>
                            <br><br>
                            <div class="inputBox">
                            <label for="valor_diaria" >Valor diaria:</label>
                                <input type="number" name="valor_diaria" id="valor_diaria" placeholder="Valor da diária" required>
                                
                            </div>
                            <br><br>
                            
                            <div class="inputBox">
                                <label for="placa" >Placa:</label>
                                <input type="text" name="placa" maxlength="7" id="placa" placeholder="Placa"  required>
                               
                            </div>
                            <br><br>
                            <div class="inputBox">
                                 <label for="ano" >Ano:</label>
                                <input type="number" name="ano" id="ano" placeholder="Ano" required>
                                
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <label for="modelo">Situação:</label>
                                <select name="situacao" id="escolha-modelo">
                                    <option value="disponivel"> Disponivel </option>
                                    <option value="alugado"> Alugado </option>
                                    <option value="manutencao"> Em manutenção </option>
                                </select>
                            </div>
                            <br><br>
                            
                            <input type="submit" name="submit" id="submit">

                        

                  <script>
                        function alteraModelo(marca_el) {
                            url ='../www/endPoint.php?id_marca='+marca_el.value;
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
                    

                    </fieldset>
                    </form>
                
                  </div>
                    
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