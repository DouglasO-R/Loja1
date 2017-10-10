      <?php 
      require_once 'cabecalho.php';
      require_once 'conecta.php';  
      
      
        
        $tipoProduto = $_POST["tipoProduto"];
        $categoria_id = $_POST["categoria_id"];
        $produto_id = $_POST["id"];
        
        
        $factory = new ProdutoFactory();
        $produto = $factory->criarProd($tipoProduto, $_POST);
        $produto->atualizaBaseadoEm($_POST);
        
        $produto->setId($produto_id); 
        $produto->getCategoria()->setID($categoria_id);                
                       
   
         if(array_key_exists('usado', $_POST)){
             $produto->setUsado("true");
         }else{
             $produto->setUsado("false");
         }
         $produtoDAO = new ProdutoDAO($conexao);
         
         
        if($produtoDAO->alteraProduto($produto)) {?>
        <p class="text-success">Alterado Produto: <?= $produto->getNome();?> Preço:R$<?= $produto->getPreco(); ?></p>
    <?php   } else { 
               $msg = pg_result_erro($conexao);
        ?>
                <p class="text-danger">Produto nao foi alterado devido ao erro:<?= $msg ?></p>
    <?php     }
       
        pg_close($conexao);
         ?>
       


      <?php include 'rodape.php';  ?>

                