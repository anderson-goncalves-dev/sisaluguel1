<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'clienteSql.php';
require '../login/verifica-login.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
          Cadastrar Cliente
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
          <h1 class>Cadastrar cliente<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../cliente/listarCliente.php">Lista de clientes</a></li>
        
        </ul>
</div>
                <?php    
      $cliente = new Cliente;
      if(isset($_POST['submit'])):
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $email = $_POST['email'];
           

            $cliente->setNome($nome);
            $cliente->setCpf($cpf);
            $cliente->setTelefone($telefone);
            $cliente->setCidade($cidade);
            $cliente->setBairro($bairro);
            $cliente->setRua($rua);
            $cliente->setNumero($numero);
            $cliente->setEmail($email);
           
            if($cliente->insert()){
                echo "<script language='javascript' type='text/javascript'> alert('Cliente cadastrado com sucesso');window.location.href='listarCliente.php';</script>";
            }else{
                echo "<script language='javascript' type='text/javascript'> alert('Erro ao cadastrar');</script>";

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
                            <label for="nome"  >Nome completo:</label>
                                <input type="text" maxlength="45" name="nome" placeholder="Nome Completo" value="" id="nome"  required>
                               
                               
                                </div>
                            <br>
                            <div class="inputBox">
                            <label for="cpf" >CPF:</label>
                                <input type="text" maxlength="11" name="cpf" placeholder="CPF" value="" id="cpf"  required>
                              
                               
                                </div>
                            <br>
                            <div class="inputBox">
                            <label for="telefone" >Telefone:</label>
                                <input type="tel" maxlength="11" name="telefone" placeholder="Telefone"  value="" id="telefone"  required>
                               
                               
                                </div>
                            <br>
                            <div class="inputBox">
                            <label for="cidade" >Cidade:</label>
                                <input type="text" name="cidade" maxlength="45" placeholder="Cidade" id="cidade" value=""  required>
                              
                               
                                </div>
                            <br>
                            <div class="inputBox">
                            <label for="bairro" >Bairro:</label>
                                <input type="text" name="bairro" id="bairro" placeholder="Bairro" maxlength="45" value=""  required>
                               
                               
                                </div>
                            <br>
                            <div class="inputBox">
                            <label for="rua" >Rua:</label>
                                <input type="text" name="rua" value="" id="Rua" placeholder="Rua" maxlength="45"  required>
                               
                               
                                </div>
                            <br>
                            <div class="inputBox">
                            <label for="numero" >Número:</label>
                                <input type="number" name="numero" maxlength="20" value="" placeholder="Número" id="numero"  required>
                               
                            </div>
                            <br>
                            <div class="inputBox">
                            <label for="email" >Email:</label>
                                <input type="text" name="email" maxlength="45" value="" placeholder="Email" id="email"  required>
                                
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
                  <footer>
                          <p>Informações ao consumidor: Locar Rent a Car S/A - CNPJ nº 125.970.085/0001-99</p>
  
                          <p>Sede: Avenida Barão do Rio Branco, n° 600 - Guanambi - CEP: 46430-000 - Guanambi - BA</p>
                          
                          <p>Central de Reservas e Assistência a Clientes 24h: 0800 555 8080</p>
                          
                         <p> Central de Reservas 24 horas: 0 800 555 9000 | Assistência a Clientes 24 horas: 0 800 555 9000</p>
                         <p> E-mail: centraldereservas@locar.com</p>
                  </footer>
  
          
        </body>
</html>