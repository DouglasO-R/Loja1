<?php
 include 'cabecalho.php'; 
 include 'conecta.php'; 
 include 'banco-produtos.php'; 
 include 'banco_categorias.php';
 $categorias = listaCategoria($conexao);
 ?> 
<?php if(array_key_exists("removido", $_POST) && $_POST['removido']=='true') {
    ?>
<p class="alert-success">Produto apagado com sucesso.</p>
<?php
}
?>






<table class="table table-striped table-bordered table-hover">
    <?php
    $produtos = listaProdutos($conexao);
     foreach ($produtos as $produto) {
     ?>
       <tr>
           <td><?=$produto['nome']?></td>
           <td><?=$produto['preco']?> </td> 
           <td><?=substr($produto['descricao'],0,40)?> </td>
           <td><?=$produto['categoria_nome']?></td> 
           <td>
               <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a>
           </td> 
           <td>
               <form action="remove-produto.php" method="post">
                   <button class="btn btn-danger"> remover </button>
               </form>
           </td>
       </tr>
    <?php
    }
     ?>
</table>

<?php include 'rodape.php';?> 