<?php

 
    $host = isset($_ENV["DATABASE_TESTHOST"]);
    $porta = isset($_ENV["DATABASE_PORT"]);
    $db = isset($_ENV["DATABASE_TESTDBNAME"]);
    $user = isset($_ENV["DATABASE_TESTDBUSER"]);
    $pass = isset($_ENV["DATABASE_TESTDBPASS"]);



 $conexao = pg_connect("host = $host,port = $porta,dbname = $db,user = $user,password = $pass");
