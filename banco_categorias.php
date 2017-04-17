<?php
include 'conecta.php';

function listaCategoria($conexao){
    $categorias = [];
    $querry = mysqli_query($conexao,"select * from categorias");
    while ($categoria = mysqli_fetch_assoc($querry)){
        array_push($categorias, $categoria);
    }
    return $categorias;
}