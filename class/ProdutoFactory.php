<?php

class ProdutoFactory {
    private $classes = array("Ebook","LivroFisico");
    
    public function criarProd($tipoProduto,$params){
        $nome = $params['nome'];
        $preco = $params['preco'];
        $descricao = $params['descricao'];
        $categoria = new Categoria();
        $usado = $params['usado'];
        var_dump($params);
        if(in_array($tipoProduto, $this->classes)){
            return new $tipoProduto($nome,$preco,$descricao,$categoria,$usado);
        }
        return new LivroFisico($nome,$preco,$descricao,$categoria,$usado);
    }  
    
}
