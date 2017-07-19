<?php
require_once 'PHPMailerAutoload.php';

session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem =$_POST["mensagem"];

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = TRUE;
$mail->Username="alura.php.e.mysql@gmail.com";//endereço de email q vai ser usado
$mail->Password="123456 ";// senha do email usado

//Agora vamos ao email, primeiro quem está enviando o email, no nosso caso é o administrador da loja, quem fez o site:
$mail->setFrom("alura.php.e.mysql@gmail.com", "Alura php e mysql para internet");

//E quem vai receber o email, no nosso caso, o mesmo usuário:
$mail->addAddress("alura.php.e.mysql@gmail.com");

//Confiramos o título da mensagem:
$mail->Subject = "Email de contato da loja";

//E o corpo da mensagem como HTML:
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");

//Por fim, caso o usuário não abra o email em modo html, mas sim em modo txt, você pode querer mostrar uma mensagem diferente
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";


if($mail->send()){
    $_SESSION["sucess"] = "mensagem enviada com sucesso";
    header("location:index.php");
}else {
    $_SESSION["danger"] = "erro ao enviar mensagem";
    header("location:contato.php");
}
die();
