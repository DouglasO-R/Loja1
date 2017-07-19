<?php
require_once 'cabecalho.php';
$produtoDAO = new produtoDAO($conexao);
$categoriaDAO = new categoriaDAO($conexao);

$id = $_GET['id'];
$produto = $produtoDAO->buscaProdutos($id);
$categorias = $categoriaDAO->listaCategoria();

$selecao_usado = $produto->getUsado()?"checked='checked'" : "";
$produto->setUsado($selecao_usado);
?>
<html>
    <h1>Alterando Produto</h1>
    <form action="altera-produto.php" method="post">
        <table class="table">
            <tr><td><input type="hidden" name="id" value="<?=$produto->getId()?>"></td></tr>
            <?php include'produto-formulario-base.php';?>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Alterar" class="btn btn-primary" /></td>
            </tr>
        </table>
    </form>
</html>
<?php include 'rodape.php';?> 