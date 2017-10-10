<?php
 require_once 'cabecalho.php'; 

 $categoriaDAO = new CategoriaDAO($conexao);
 $categorias = $categoriaDAO->listaCategoria();
 ?> 
<?php 
 mostraAlerta("sucess");
 
    ?>

<table class="table table-striped table-bordered table-hover">
    <?php
    $produtoDAO = new ProdutoDAO($conexao);
    $produtos = $produtoDAO->listaProdutos();
     foreach ($produtos as $produto) {
     ?>
       <tr>
           <td><?=$produto->getNome() ?></td>
           <td><?=$produto->getPreco()?> </td>
           <td><?=$produto->calculaImposto()?> </td>
           <td><?=substr($produto->getDescricao(),0,40)?> </td>
           <td><?=$produto->getCategoria()->getNome()?></td> 
           <td><?php 
                if($produto->temIsbn()){
                    echo "ISBN: ".$produto->getIsbn();
                }?></td>
           <td>
               <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId()?>">alterar</a>
           </td> 
           <td>
               <form action="remove-produto.php" method="post">
                   <input type="hidden" name="id" value="<?=$produto->getId()?>" />
                   <button class="btn btn-danger"> remover </button>
               </form>
           </td>
       </tr>
    <?php
    }
     ?>
</table>

<?php include 'rodape.php';?> 