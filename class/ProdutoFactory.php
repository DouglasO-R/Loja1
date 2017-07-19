<?php

class ProdutoFactory {
    private $classes = array("produto","ebook","livroFisico");
    
    public function criarProd($tipoProduto,$params){
        $nome = $params['nome'];
        $preco = $params['preco'];
        $descricao = $params['descricao'];
        $categoria = new categoria();
        $usado = $params['usado'];
     
        if(in_array($tipoProduto, $this->classes)){
            return new $tipoProduto($nome,$preco,$descricao,$categoria,$usado);
        }
        return new produto($nome,$preco,$descricao,$categoria,$usado);
    }
    
    public function temMarcaDagua(){
        return $this instanceof ebook;
    }
    
    public function temTaxaImpressao(){
        return $this instanceof livroFisico;
    }

    public function atualizaBaseadoEm($param){
        if($this->temIsbn()){
            $this->setIsbn($param["isbn"]);
        }
        if($this->temMarcaDagua()){
            $this->setMarcaDagua($param["MarcaDagua"]);
        }
        if($this->temTaxaImpressao()){
            $this->setTaxaImpressao($param["TaxaImpressao"]);
        }
    }
}
