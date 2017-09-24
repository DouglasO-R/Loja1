<?php

    
    $host = $_ENV["DATABASE_TESTHOST"];
    $porta = $_ENV["DATABASE_PORT"];
    $db = $_ENV["DATABASE_TESTDBNAME"];
    $user = $_ENV["DATABASE_TESTDBUSER"];
    $pass = $_ENV["DATABASE_TESTDBPASS"];


 $conexao = pg_connect($host,$porta,$db, $user, $pass);
