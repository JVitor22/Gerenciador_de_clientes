<?php 
require __DIR__.'/vendor/autoload.php';
use Source\Config;
$email = $_POST['email'];
$entrar = $_POST['entrar'];
$password = $_POST['senha'];
  if (isset($entrar)) {       
    $verifica = Connection::prepare("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'")  or die("erro ao selecionar");
    $verifica->bindValue('email' , $email);
    $verifica->bindValue('senha' , $password);
    $verifica->execute();
      if ($verifica->rowCount() <= 0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='index.php';</script>";
        die();
      }else{
        setcookie("email",$email);
        header("Location:home.php");
      }
  }
