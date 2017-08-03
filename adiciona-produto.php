      <?php 
      require_once 'cabecalho.php';      
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
 
        
        $produtoDAO = new produtoDao($conexao);
        
        if($produtoDAO->insereProduto($produto)){?>
<p class="text-success">Adicionado Produto: <?= $produto->getNome();?> Preço:R$<?= $produto->getPreco(); ?></p>
    <?php   } else { 
               $msg = mysqli_errno($conexao); 
        ?>
                <p class="text-danger">Produto nao foi adicionado devido ao erro:<?= $msg ?></p>
    <?php     }
       
        mysqli_close($conexao);
         ?>
       


      <?php include 'rodape.php';  ?>