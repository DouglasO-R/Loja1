      <?php 
      require_once('cabecalho.php');      
      require_once 'logica-usuario.php';
    
        
        $tipoProduto = $_POST["tipoProduto"];
        $categoria_id = $_POST["categoria_id"];
        
        verificaLogado();      
      
       
        $factory = new ProdutoFactory();
        $produto = $factory->criarProd($tipoProduto, $_POST);
        $produto->atualizaBaseadomEm($_POST);
        
        $produto->getCategoria()->setId($categoria_id);     
         
 
         if(array_key_exists('usado', $_POST)){
             $produto->setUsado("true");
         }else{
             $produto->setUsado("false");
         }
 
        
        $produtoDAO = new ProdutoDao($conexao);
        
        if($produtoDAO->insereProduto($produto)){?>
            <p class="text-success">Adicionado Produto: <?= $produto->getNome();?> Preço:R$<?= $produto->getPreco(); ?></p>
         <?php   } else { 
                 $msg = pg_result_error_field($conexao); 
             ?>
                <p class="text-danger">Produto nao foi adicionado devido ao erro:<?= $msg ?></p>
    <?php     }
       
        pg_close($conexao);
         ?>
       


      <?php include('rodape.php');  ?>