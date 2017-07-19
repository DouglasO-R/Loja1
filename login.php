<?php
require_once 'conecta.php';
require_once 'banco-usuarios.php';
require_once 'logica-usuario.php';

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuario = buscaUsuario($conexao, $email, $senha);

if ($usuario == NULL) {
    $_SESSION["danger"] = "usuario ou senha invalida";
    header("location:index.php");
} else {
    logaUsuario($usuario["email"]);
    $_SESSION["sucess"] = "Logado com sucesso";
    header("Location:index.php");
    
}

