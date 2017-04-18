<?php
include 'conecta.php';
include 'banco-usuarios';

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuario = buscaUsuario($conexao, $email, $senha);

