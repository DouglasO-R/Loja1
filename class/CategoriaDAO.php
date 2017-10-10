<?php

class CategoriaDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function listaCategoria(){

        $categorias = [];
        $querry = "select * from categorias";
        $resultado = pg_query($this->conexao,$querry);
        while ($categoria_array = pg_fetch_assoc($resultado)){
            
            $categoria = new Categoria();
            $categoria->setId($categoria_array['id']);
            $categoria->setNome($categoria_array['nome']);
            
            array_push($categorias, $categoria);            
            
        }
        return $categorias;

     }
}
