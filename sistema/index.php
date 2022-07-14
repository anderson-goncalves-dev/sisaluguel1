<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logar</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="box">
        <div  class="logo">
        <img src="aluguel/imagens/logo.png" alt="" width="130px">
        </div>
        <h2>Login</h2>
    <form method="post" action="aluguel/login/login.php">
        <div class="inputBox">
        <input type="text" autocomplete="off" autofocus="" name="email" id="email">
        <label>Email</label>
        </div>
        <div class="inputBox">
        <input type="password" name="senha" id="login">
        <label>Senha</label>
        </div>
        <input type="submit"  value="Logar" class="sub">
    </form>
    
</div>

</body>
</html>