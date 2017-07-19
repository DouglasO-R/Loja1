 <?php
 require_once 'class/produto.class.php';
 require_once 'class/categoria.class.php';
 ?>
            <tr>
                <td>Nome</td>
                <td><input type="text" class="form-control" name="nome" value="<?=$produto->getNome()?>" /></td>
            </tr>

            <tr>
                <td>Preço</td>
                <td><input type="number" class="form-control" name="preco" value="<?=$produto->getPreco()?>" /></td>
            </tr>

            <tr>
                <td>Descrição</td>
                <td> <textarea name="descricao" class="form-control" ><?=$produto->getDescricao()?> </textarea> </td>
            </tr>
            <tr><td></td>
                <td>
                    <input type="checkbox" name="usado" <?=$produto->getUsado()?> value="true" >Usado
                </td>
            </tr>
            
            <tr>
                <td>Categoria</td>
                <td>                            
               <select name="categoria_id">
                   <?php foreach($categorias as $categoria){ 
                       $essaEaCategoria = $produto->getCategoria() == $categoria->getId();
                       $selecao=$essaEaCategoria? "selected='selected'":"";
                       ?>
                   <option  value="<?=$categoria->getId()?>"<?=$selecao?>><?=$categoria->getNome()?></option>
                   <?php } ?>
               </select>             
           </td> 
            </tr>
            <tr>
                <td>ISBN(caso seja um livro):</td>
                <td>
                    <input type="text" class="form-control" name="isbn" value="<?php if($produto->temIsbn()){echo $produto->getIsbn();}?>">
                </td>
            </tr>
            <tr>
                <td>Tipo de Produto:</td>
                <td>
                <select name="tipoProduto">
                   <?php 
                       $tipos = array("produto","livroFisico","ebook");
                       foreach($tipos as $tipo){ 
                       $esseEhOTipo  = get_class($produto) == $tipo;
                       $selecaoTipo=$esseEhOTipo?"selected='selected'":"";
                       if($tipo == "livroFisico"){
                       ?>
                    <optgroup label="Livros">
                       <?php } ?> 
                   <option  value="<?=$tipo?>"<?=$selecaoTipo?>><?=$tipo?></option>
                   <?php if($tipo == "ebook"){?>
                   </optgroup>
                     <?php } ?> 
                   <?php } ?> 
               </select>  
               </td>
            </tr>
            <tr>
                <td>Marca D'agua</td>
                <td>
                    <input type="text" class="form-control" name="marcaDagua" value="<?php //if($produto->getMarcaDagua()){echo $produto->getMarcaDagua();}?>">
                </td>
            </tr>
            <td>Taxa de Impressao</td>
                <td>
                    <input type="text" class="form-control" name="taxaImpressao" value="<?php //if($produto->getTaxaImpressao()){echo $produto->getTaxaImpressao();}?>">
                </td>
            </tr>