<?php
require_once 'conecta.php';
require_once 'class/categoria.class.php';

function listaCategoria($conexao){
    $categorias = [];
    $querry = "select * from categorias";
    $resultado = pg_query($conexao,$querry);
    while ($categoria_array = pg_fetch_assoc($querry)){
        
        $categoria = new Categoria();
        $categoria->setId($categoria_array['id']);
        $categoria->setNome($categoria_array['nome']);
        
        array_push($categorias, $categoria);
    }
    return $categorias;
}