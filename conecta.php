<?php

    $con = parse_str(getenv("con_string"));

    print_r($con);

    $con2 = $_ENV["con_string"];

    print_r($con2);

 $conexao = pg_connect($con);
