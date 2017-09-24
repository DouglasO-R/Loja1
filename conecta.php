<?php
$con = isset($_ENV["con_string"]);

vardump($con);

print_r($con);

echo $con;

 $conexao = pg_connect($con);