<?php 
      require_once 'cabecalho.php';
      
      
      $id = $_POST['id'];
      
      $produtoDAO = new produtoDAO($conexao);
      $produtoDAO->removeProduto($id);
      $_SESSION["sucess"] = "Produto removido com sucesso";
      header("Location: produto-lista.php");
      die();
?>  
