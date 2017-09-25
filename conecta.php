<?php

$con = isset($_ENV["con_string"]) ? $_ENV["con_string"] : $_ENV["con_string"] ;




 $conexao = pg_connect( $con);
