<?php
require_once 'conecta.php';


         function insereProduto($conexao,$produto){
           //erro $querry = "insert into produtos(nome,preco,descricao,categoria,usado) values ('{$nome}',{$preco},'{$descricao}',{$categoria},{$usado}";
          //$nome = mysqli_real_escape_string($conexao,$produto->nome);
          //$preco = mysqli_real_escape_string($conexao,$produto->preco);
          //$descricao = mysqli_real_escape_string($conexao,$produto->descricao);
             $querry = "INSERT INTO `produtos`(`nome`, `preco`, `descricao`, `categoria_id`, `usado`) 
                   VALUES ('{$produto->getNome()}',{$produto->getPreco()},'{$produto->getDescricao()}',{$produto->getCategoria()->getId()},{$produto->getUsado()} )";
           return mysqli_query($conexao, $querry);
         }
         
         function listaProdutos($conexao){
             $produtos = [];
             $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id ");
              while($produto_array = mysqli_fetch_assoc($resultado)){
                                                     
                                    
                  $nome = $produto_array['nome'];
                  $preco = $produto_array['preco'];
                  $descricao = $produto_array['descricao'];
                  $usado = $produto_array['usado'];
                  $categoria = new categoria();
                  $categoria->setNome($produto_array['categoria_nome']);
                  
                  $produto = new produto($nome, $preco, $descricao, $categoria, $usado);
                  $produto->setId($produto_array['id']) ;
                  
                  array_push($produtos, $produto);
                    }
                    return $produtos;
         }
         
          function removeProduto($conexao,$id){
             $querry = " delete from produtos where id = {$id} ";
             return mysqli_query($conexao, $querry);
         } 
         
         function buscaProdutos($conexao, $id){
             $querry = "select*from produtos where id = {$id}";
             $resultado = mysqli_query($conexao, $querry);
             $produto_buscado = mysqli_fetch_assoc($resultado);
                                   
                      
             $nome = $produto_buscado['nome'];
             $preco = $produto_buscado['preco'];
             $descricao = $produto_buscado['descricao'];
             $usado = $produto_buscado['usado'];  
             $categoria = new categoria();
             $categoria->setId($produto_buscado['categoria_id']);
             
             $produto = new produto($nome, $preco, $descricao, $categoria, $usado);
             $produto->setId($produto_buscado['id']) ;
             
             return $produto;
         }
         
         function alteraProduto($conexao, produto $produto){
            // $produto->nome = mysqli_real_escape_string($conexao,$$produto->nome);
            // $$produto->preco = mysqli_real_escape_string($conexao,$$produto->preco);
             //$$produto->descricao = mysqli_real_escape_string($conexao,$$produto->descricao);
             $querry = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
        categoria_id= {$produto->getCategoria()->getId()}, usado = '{$produto->getUsado()}' where id = '{$produto->getId()}'";
             return mysqli_query($conexao, $querry);
            
         }
         