      <?php 
      require_once 'cabecalho.php';
      require_once 'conecta.php';  
      
      
        /*$nome = $_POST["nome"];
        $preco = $_POST["preco"] ;
        $descricao = $_POST["descricao"];
        */
        $tipoProduto = $_POST["tipoProduto"];
        $categoria = new categoria();
        $categoria->setId($_POST["categoria_id"]) ;
        
        $factory = new ProdutoFactory();
        $produto = $factory->criarProd($tipoProduto, $_POST);
        $produto->atualizaBaseadoEm($_POST);
        $produto->getCategoria()->setID($categoria_id);                
                       
   
         if(array_key_exists('usado', $_POST)){
             $$produto->setUsado("true");
         }else{
             $$produto->setUsado("false");
         }
         $produtoDAO = new produtoDAO($conexao);
         
         if($produto == "livro"){
             $produto = new produto($nome,$preco,$descricao,$categoria,$usado);
             $produto->setIsbn($isbn);
         }else {
             $produto = new produto($nome,$preco,$descricao,$categoria,$usado);             
         }
         
                
         $produto->setId($_POST["id"]);  
         
         
        
                
        if($produtoDAO->alteraProduto($produto)) {?>
<p class="text-success">Alterado Produto: <?= $produto->getNome();?> Preço:R$<?= $produto->getPreco(); ?></p>
    <?php   } else { 
               $msg = mysqli_errno($conexao);
        ?>
                <p class="text-danger">Produto nao foi alterado devido ao erro:<?= $msg ?></p>
    <?php     }
       
        mysqli_close($conexao);
         ?>
       


      <?php include 'rodape.php';  ?>

                