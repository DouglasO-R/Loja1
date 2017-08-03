<?php

class ProdutoFactory {
    private $classes = array("ebook","livroFisico");
    
    public function criarProd($tipoProduto,$params){
        $nome = $params['nome'];
        $preco = $params['preco'];
        $descricao = $params['descricao'];
        $categoria = new categoria();
        $usado = $params['usado'];
     
        if(in_array($tipoProduto, $this->classes)){
            return new $tipoProduto($nome,$preco,$descricao,$categoria,$usado);
        }
        return new livroFisico($nome,$preco,$descricao,$categoria,$usado);
    }  
    
}
