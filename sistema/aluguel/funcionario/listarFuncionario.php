<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'Usuario.php';
require '../login/verifica-login.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de Funcionarios</title>
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
          <h1 class>Lista de Funcionários<h1>
            </div>
            <div class="menuInferior">
            <ul>
        <li><a href="../funcionario/cadastro-funcionario.php">Cadastrar funcionário</a></li>
        
        </ul>
</div>
            
            <main class="mainn3">
        
          <div id="teste">   
    <!-- Inicio da tabela -->
    <table class="tabela">
                <thead>
                    <tr class="active">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th></th>
                                                
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $Usuario=New Usuario();

                    foreach ($Usuario->findAll() as $key => $value) { ?> 
          
                    <tr>
                        <td> <?php echo $value->id_usuario;?> </td> 

                        <td> <?php echo $value->nome;?> </td>

                        <td> <?php echo $value->cpf;?> </td>
                        
                        <td> <?php echo $value->email;?> </td>
                        
                        <td> <?php echo $value->telefone;?> </td>

                        <td> <?php echo $value->cidade;?> </td>

                        <td> <?php echo $value->bairro;?> </td>

                        <td> <?php echo $value->rua;?> </td>

                        <td> <?php echo $value->numero;?> </td>

                    <td>

                        <form method="post" action="AlterarFuncionario.php">
                                <input name="id" type="hidden" value="<?php echo $value->id_usuario;?>"/>                  
                                <input name="nome" type="hidden" value="<?php echo $value->nome;?>"/>
                                <input name="cpf" type="hidden" value="<?php echo $value->cpf;?>"/>
                                <input name="email" type="hidden" value="<?php echo $value->email;?>"/>
                                <input name="telefone" type="hidden" value="<?php echo $value->telefone;?>"/>
                                <input name="cidade" type="hidden" value="<?php echo $value->cidade;?>"/>
                                <input name="bairro" type="hidden" value="<?php echo $value->bairro;?>"/>
                                <input name="rua" type="hidden" value="<?php echo $value->rua;?>"/>
                                <input name="numero" type="hidden" value="<?php echo $value->numero;?>"/>
                                <button name="alterar" id="submit" type="submit">Alterar</button>
                         </form>
                         </tr>

                    <?php } ?>
                    </tbody>
                    </table>
                    <!-- Fim da tabela -->
                    </main>

                    <script src="../mobile-navbar.js"></script>

                    <footer class="">
                        <p>Informações ao consumidor: Locar Rent a Car S/A - CNPJ nº 125.970.085/0001-99</p>

                            <p>Sede: Avenida Barão do Rio Branco, n° 600 - Guanambi - CEP: 46430-000 - Guanambi - BA</p>
                            
                            <p>Central de Reservas e Assistência a Clientes 24h: 0800 555 8080</p>
                            
                        <p> Central de Reservas 24 horas: 0 800 555 9000 | Assistência a Clientes 24 horas: 0 800 555 9000</p>
                        <p> E-mail: centraldereservas@locar.com</p>
                    </footer>


</body>
</html>