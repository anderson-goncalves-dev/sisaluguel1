<?php
session_start();
if(!$_SESSION['email']){
    header('location:http://localhost/sistema/aluguel/login/pagina-logar.php');
    die();
}
