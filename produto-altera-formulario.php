<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco_categorias.php';
include 'banco-produtos.php';
$categorias = listaCategoria($conexao);
$id = $_GET['id'];
$produto=buscaProdutos($conexao, $id);
$usado = $produto['usado'] ? "checked='checked'" : "false";
?>
<html>
    <h1>Alterando Produto</h1>
    <form action="altera-produto.php" method="post">
        <table class="table">  
            <tr><td><input type="hidden" name="id" value="<?=$produto['id']?>"></td></tr>
            <tr>
                <td>Nome</td>
                <td><input type="text" class="form-control" name="nome" value="<?=$produto['nome']?>" /></td>
            </tr>

            <tr>
                <td>Preço</td>
                <td><input type="number" class="form-control" name="preco" value="<?=$produto['preco']?>" /></td>
            </tr>

            <tr>
                <td>Descrição</td>
                <td> <textarea name="descricao" class="form-control" ><?=$produto['descricao']?> </textarea> </td>
            </tr>
            <tr><td></td>
                <td>
                    <input type="checkbox" name="usado" <?=$usado?> value="true" >Usado
                </td>
            </tr>
            
            <tr>
                <td>Categoria</td>
                <td>                            
               <select name="categoria_id">
                   <?php foreach($categorias as $categoria){ 
                       $essaEaCategoria = $produto['categoria_id']==$categoria['id'];
                       $selecao=$essaEaCategoria? "selected='selected'":"";
                       ?>
                   <option  value="<?=$categoria['id']?>"<?=$selecao?>><?=$categoria['nome']?></option>
                   <?php } ?>
               </select>             
           </td> 
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Alterar" class="btn btn-primary" /></td>
            </tr>

        </table>

    </form>
</html>
<?php include 'cabecalho.php';?> 