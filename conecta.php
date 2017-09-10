<?php

$host = $_ENV["DATABASE_TESTHOST"];
$user = $_ENV["DATABASE_TESTDBUSER"];
$pass = $_ENV["DATABASE_TESTDBPASS"];
$db = $_ENV["DATABASE_TESTDBNAME"];



$conexao = mysqli_connect($host, $user , $pass,$db );