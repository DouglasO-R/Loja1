      <?php 
      require_once 'cabecalho.php';      
      require_once 'logica-usuario.php';
      
      verificaLogado();
           
        
        
        
        /*$nome = $_POST["nome"];
        $preco = $_POST["preco"] ;
        $descricao = $_POST["descricao"];
        $isbn = $_POST["isbn"];
         * 
         */
        $tipoProduto = $_POST["tipoProduto"];
               
        $categoria = new categoria();
        $categoria->setId($_POST["categoria_id"]); 
        
        $factory = new ProdutoFactory();
        $produto = $factory->criarProd($tipoProduto, $_POST);
        $produto->atualizaBaseadomEm($_POST);
        $produto->getCategoria()->setID($categoria_id);     
         ?> 
 <?php    
         if(array_key_exists('usado', $_POST)){
             $produto->setUsado("true");
         }else{
             $produto->setUsado("false");
         }
         
         if($tipoProduto == "livroFisico"){
             $produto = new livroFisico($nome,$preco,$descricao,$categoria,$usado);
             $produto->setIsbn($isbn);
             $produto->setTaxaImpresao($taxaImpresao);
         }else {
             $produto = new produto($nome,$preco,$descricao,$categoria,$usado);             
         }

        
        //$produto->setTipoProduto($tipoProduto);
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