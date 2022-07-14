
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
    <link rel="stylesheet" href="">
</head>
<body>
    <form method="post" action="login.php">
        <label>Email :</label>
        <input type="text" name="email" id="email">
        <label>Senha</label>
        <input type="password" name="senha" id="login">
        <input type="submit"  value="Logar">
    </form>
</body>
</html>