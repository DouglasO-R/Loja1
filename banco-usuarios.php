<?php
require_once('conecta.php');

function buscaUsuario($conexao,$email,$senha){
    $senhaMd5 = md5($senha);
    $email = pg_escape_string($conexao,$email);
    $querry = "select * from usuarios where email='{$email}'and senha='{$senhaMd5}'";
    $resultado = pg_query($conexao, $querry);
    $usuario = pg_fetch_assoc($resultado);
    return $usuario;
}
