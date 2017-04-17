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
        $categoria_id = $_POST["categoria_id"];
        $id = $_POST["id"];
        
                
        if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) {?>
            <p class="text-success">Alterado Produto: <?= $nome;?> Preço:R$<?= $preco; ?></p>
    <?php   } else { 
               $msg = mysqli_errno($conexao);
        ?>
                <p class="text-danger">Produto nao foi alterado devido ao erro:<?= $msg ?></p>
    <?php     }
       
        mysqli_close($conexao);
         ?>
       


      <?php include 'rodape.php';  ?>

                