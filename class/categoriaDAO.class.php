<?php

class categoriaDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function listaCategoria(){
    $categorias = [];
    $querry = mysqli_query($this->conexao,"select * from categorias");
    while ($categoria_array = mysqli_fetch_assoc($querry)){
        
        $categoria = new categoria();
        $categoria->setId($categoria_array['id']);
        $categoria->setNome($categoria_array['nome']);
        
        array_push($categorias, $categoria);
    }
    return $categorias;
}
}