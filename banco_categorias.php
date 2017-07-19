<?php
require_once 'conecta.php';
require_once 'class/categoria.class.php';

function listaCategoria($conexao){
    $categorias = [];
    $querry = mysqli_query($conexao,"select * from categorias");
    while ($categoria_array = mysqli_fetch_assoc($querry)){
        
        $categoria = new categoria();
        $categoria->setId($categoria_array['id']);
        $categoria->setNome($categoria_array['nome']);
        
        array_push($categorias, $categoria);
    }
    return $categorias;
}