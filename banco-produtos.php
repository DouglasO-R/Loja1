<?php
include_once 'conecta.php';

         function insereProduto($conexao,$nome,$preco,$descricao,$categoria,$usado){
           $querry = "insert into produtos(nome,preco,descricao,categoria,usado) values ('{$nome}',{$preco},'{$descricao}',{$categoria},{$usado}";
           return mysqli_query($conexao, $querry);
         }
         
         function listaProdutos($conexao){
             $produtos = [];
             $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id ");
              while($produto = mysqli_fetch_assoc($resultado)){
                  array_push($produtos, $produto);
                    }
                    return $produtos;
         }
         
          function removeProduto($conexao,$id){
             $querry = "delete from produtos where id={$id}";
             return mysqli_query($conexao, $querry);
         } 
         
         function buscaProdutos($conexao,$id){
             $querry = "select*from produtos where id = {$id}";
             $resultado = mysqli_query($conexao, $querry);
             return mysqli_fetch_assoc($resultado);
         }
         
         function alteraProduto($conexao,$id,$nome,$preco,$descricao,$categoria_id,$usado){
             $querry = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', 
        categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
             return mysqli_query($conexao, $querry);
            
         }
         