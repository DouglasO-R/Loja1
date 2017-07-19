<?php

require_once 'conecta.php';
session_start();
function usuarioEstaLogado(){
   return isset($_SESSION["usuario_logado"]);
    
}

function verificaLogado(){
    if(!usuarioLogado()){
        $_SESSION["danger"] = "Voce nao esta Logado";
    header("location:index.php");
    die();
    }
    
}
function usuarioLogado(){
    return $_SESSION["usuario_logado"];
}
function logaUsuario($email){
    $_SESSION["usuario_logado"]=$email;
}
function logout(){
    session_destroy();
    session_start();
    $_SESSION["sucess"] = "Deslogado com sucesso";
    header("location:index.php");
}