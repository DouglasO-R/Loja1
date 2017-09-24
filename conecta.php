<?php
$con = isset($_ENV["con_string"]);



print_r($_ENV["con_string"]);



 $conexao = pg_connect($con);