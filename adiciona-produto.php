      <?php 
      include 'cabecalho.php';
      include 'conecta.php';  
      include 'banco-produtos.php';
      ?>  
 <?php    
         if(array_key_exists('usado', $_POST)){
             $usado ="true";
         }else{
             $usado="falso";
         }


        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];
        $categoria = $_POST["categoria_id"];
        
        
        
        if(insereProduto($conexao, $nome,$preco,$descricao,$categoria,$usado)){?>
            <p class="text-success">Adicionado Produto: <?= $nome;?> Preço:R$<?= $preco; ?></p>
    <?php   } else { 
               $msg = mysqli_errno($conexao);
        ?>
                <p class="text-danger">Produto nao foi adicionado devido ao erro:<?= $msg ?></p>
    <?php     }
       
        mysqli_close($conexao);
         ?>
       


      <?php include 'rodape.php';  ?>