<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'Usuario.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>
 Cadastrar funcionário
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
          <h1 class>Cadastrar Funcionário<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../funcionario/listarFuncionario.php">Lista de funcionários</a></li>
        
        </ul>
</div>
<?php    
      $usuario = new Usuario;
      if(isset($_POST['submit'])):
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $data_nascimento = $_POST['data_nascimento'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);

            $usuario->setNome($nome);
            $usuario->setCpf($cpf);
            $usuario->setTelefone($telefone);
            $usuario->setData_nascimento($data_nascimento);
            $usuario->setCidade($cidade);
            $usuario->setBairro($bairro);
            $usuario->setRua($rua);
            $usuario->setNumero($numero);
            $usuario->setEmail($email);
            $usuario->setSenha($senha);
            
            
            if($usuario->insert()){
                echo "<script language='javascript' type='text/javascript'> alert('Funcionario cadastrado com sucesso');window.location.href='listarFuncionario.php';</script>";
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
                            <label for="nome">Nome completo:</label>
                                <input type="text" maxlength="45" name="nome" placeholder="Nome" id="nome"  required>
                                
                            </div>
                            <br><br>
                            <div class="inputBox">
                            <label for="cpf">CPF:</label>
                                <input type="text" maxlength="11" name="cpf" placeholder="CPF" id="cpf"  required>
                                
                            </div>
                            <br><br>
                            <div class="inputBox">
                            <label for="telefone">Telefone:</label>
                                <input type="tel" maxlength="11" name="telefone" id="telefone" placeholder="Telefone" required>
                                
                            </div>
                            <br><br>

                            <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" required>

                            <br><br><br>

                            <div class="inputBox">
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade" maxlength="45" id="cidade" placeholder="Cidade" required>
                            
                            </div>
                            <br><br>
                            
                            <div class="inputBox">
                            <label for="bairro">Bairro:</label>
                                <input type="text" name="bairro" maxlength="45" id="bairro" placeholder="Bairro" required>
                               
                            </div>
                            <br><br>
                            <div class="inputBox">
                            <label for="rua">Rua:</label>
                                <input type="text" name="rua" maxlength="45" id="Rua" placeholder="Rua" required>
                                
                            </div>
                            <br><br>
                            <div class="inputBox">
                            <label for="numero">Número:</label>
                                <input type="number" name="numero" maxlength="20" id="numero" placeholder="Número" required>
                                
                            </div>
                            <br><br>
                            <div class="inputBox">
                            <label for="email">Email:</label>
                                <input type="text" name="email" id="email" placeholder="Email"  required>
                               
                            </div>
                            <br><br>
                            <div class="inputBox">
                            <label for="senha">Senha:</label>
                                 <input id="senha" type="password" name="senha" placeholder="Senha"  required>   
                                
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit">

                            </fieldset>
                    </form>
                
                  </div>
                    
                 
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