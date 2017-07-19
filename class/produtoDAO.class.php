<?php

class produtoDAO {
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
           return mysqli_query($this->conexao, $querry);
         }
         
         function listaProdutos(){
             $produtos = array();
             $resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id ");
              while($produto_array = mysqli_fetch_assoc($resultado)){
                                                     
                                    
                  /*$nome = $produto_array['nome'];
                  $preco = $produto_array['preco'];
                  $descricao = $produto_array['descricao'];
                  $usado = $produto_array['usado'];
                  $isbn = $produto_array['isbn'];
                  */
                  $tipoProduto = $produto_array['tipoProduto'];
                  $produto_id = $produto_array['id'];                                 
                  $categoria_nome = $produto_array['categoria_nome'];
                  
                  $factory = new ProdutoFactory();
                  $produto = $factory->criarProd($tipoProduto, $produto_array);
                  //$produto->atualizaBaseadoEm($produto_array);
                  
                  $produto->setId($produto_id);
                  $produto->getCategoria()->setNome($categoria_nome);
                  /*
                  if($tipoProduto == "livro"){
                      $produto = new livro($nome, $preco, $descricao, $categoria, $usado);
                      $produto->setIsbn($isbn);
                  }else {
                      $produto = new produto($nome, $preco, $descricao, $categoria, $usado);
                  }
                  
                  $produto->setId($produto_array['id']) ;                  
                */
                  
                  array_push($produtos, $produto);
                    }
                    return $produtos;
         }
         
          function removeProduto($id){
             $querry = " delete from produtos where id = {$id} ";
             return mysqli_query($this->conexao, $querry);
         } 
         
         function buscaProdutos( $id){
             $querry = "select*from produtos where id = {$id}";
             $resultado = mysqli_query($this->conexao, $querry);
             $produto_buscado = mysqli_fetch_assoc($resultado);
                                   
             /*         
             $nome = $produto_buscado['nome'];
             $preco = $produto_buscado['preco'];
             $descricao = $produto_buscado['descricao'];
             $usado = $produto_buscado['usado']; 
             $isbn = $produto_buscado['isbn'];
             */
            $tipoProduto = $produto_buscado['tipoProduto'];
            $produto_id = $produto_buscado['id'];                                 
            $categoria_nome = $produto_buscado['categoria_nome'];
                  
            $factory = new ProdutoFactory();
            $produto = $factory->criarProd($tipoProduto, $produto_buscado);
            $produto->atualizaBaseadoEm($produto_buscado);
             
            $produto->setId($produto_id);
            $produto->getCategoria()->setNome($categoria_nome);
             /*
             $categoria = new categoria();
             $categoria->setId($produto_buscado['categoria_id']);
             
             if($tipoProduto == "livro"){
                      $produto = new livro($nome, $preco, $descricao, $categoria, $usado);
                      $produto->setIsbn($isbn);
                  }else {
                      $produto = new produto($nome, $preco, $descricao, $categoria, $usado);
                  }
             */
             $produto->setId($produto_buscado['id']) ;
             
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
             return mysqli_query($this->conexao, $querry);
            
         }
}
