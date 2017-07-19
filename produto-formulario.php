<?php
require_once 'cabecalho.php';
require_once 'logica-usuario.php';


$categoriaDAO = new categoriaDAO($conexao);
$categorias = $categoriaDAO->listaCategoria();
verificaLogado();
//$produto = array("nome"=>"","descricao"=>"","preco"=>"","categoria_id"=>"1");
$categoria = new categoria();
$categoria->getId(1);
$usado = "";

$produto = new produto("","","",$categoria,"");



?>
<html>
    <form action="adiciona-produto.php" method="post">
        <table class="table">
            <?php include 'produto-formulario-base.php';?>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
            </tr>

        </table>

    </form>
</html>
<?php include 'rodape.php';?> 