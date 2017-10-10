<?php

class ProdutoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    function insereProduto($produto){
           
        $isbn = "";
        if($produto->temIsbn()){
            $isbn = $produto->getIsbn();
        }
        $taxaImpressao = "";
        if($produto->temTaxaImpressao()){
            $isbn = $produto->getTaxaImpressao();
        }
        $marcaDagua = "";
        if($produto->temMarcaDagua()){
            $isbn = $produto->getMarcaDagua();
        }
        $tipoProduto = get_class($produto);
        
             $querry = "INSERT INTO `produtos`(`nome`, `preco`, `descricao`, `categoria_id`, `usado`,`isbn`,`tipoProduto`) 
                   VALUES ('{$produto->getNome()}',{$produto->getPreco()},'{$produto->getDescricao()}',"
                   . "{$produto->getCategoria()->getId()},{$produto->getUsado()},"
                   . "'{$isbn}','{$tipoProduto}' )";
           return pg_query($this->conexao, $querry);
         }
         
         function listaProdutos(){
            
            $produtos = array();
            $querry = "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on 
            p.categoria_id = c.id " ;
            $resultado = pg_query($this->conexao, $querry );
                             
              
             while($produto_array = pg_fetch_assoc($resultado) ){
                
                  $tipoProduto = $produto_array['tipoproduto'];
                  $produto_id = $produto_array['id'];                                 
                  $categoria_nome = $produto_array['categoria_nome'];
                  
                  $factory = new ProdutoFactory();
                  $produto = $factory->criarProd($tipoProduto, $produto_array);
                  
                  $produto->setId($produto_id);
                  $produto->getCategoria()->setNome($categoria_nome);
                  
                  
                  array_push($produtos, $produto);
                    }
                    
                    return $produtos;
                    
                                 
         }
         
          function removeProduto($id){
             $querry = " delete from produtos where id = {$id} ";
             return pg_query($this->conexao, $querry);
         } 
         
         function buscaProdutos( $id){
             $querry = "select*from produtos where id = {$id}";
             $resultado = pg_query($this->conexao, $querry);
             $produto_buscado = pg_fetch_assoc($resultado);
           
            $tipoProduto = $produto_buscado['tipoproduto'];
            $produto_id = $produto_buscado['id'];                                 
            $categoria_id = $produto_buscado['categoria_id'];
                  
            $factory = new ProdutoFactory();
            $produto = $factory->criarProd($tipoProduto, $produto_buscado);
            $produto->atualizaBaseadomEm($produto_buscado);
             
            $produto->setId($produto_id);
            $produto->getCategoria()->setId($categoria_id);
             
             
             return $produto;
         }
         
         function alteraProduto( produto $produto){
           
         $isbn = "";
        if($produto->temIsbn()){
            $isbn = $produto->getIsbn();
        }
        $taxaImpressao = "";
        if($produto->temTaxaImpressao()){
            $taxaImpressao = $produto->getTaxaImpressao();
        }
        $marcaDagua = "";
        if($produto->temMarcaDagua()){
            $marcaDagua = $produto->getMarcaDagua();
        }
        $tipoProduto = get_class($produto);
        
             $querry = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
              categoria_id= {$produto->getCategoria()->getId()}, usado = '{$produto->getUsado()}', isbn = '{$isbn}', tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'";
             return pg_query($this->conexao, $querry);
            
         }
}
