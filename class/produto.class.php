<?php

abstract class produto {
    
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;
    private $tipoProduto;
    
    
    function __construct($nome, $preco, $descricao, categoria $categoria, $usado) {
        
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    
    public function getUsado(){
        return $this->usado;
    }
    public function setUsado($usado){
        $this->usado = $usado;
    }
            
    public function getTipoProduto(){
        return $this->tipoProduto;
    }
    public function setTipoProduto($tipoProduto){
        $this->tipoProduto = $tipoProduto;
    }
     
    public function precoComDesconto($valor ){
        if($valor > 0 && $valor <= 0.5){
         $this->preco =($this->preco *$valor);
        }
        return $this->preco;
    }
    
    public function temIsbn(){
        return $this instanceof livro;
    }
    public function temMarcaDagua(){
        return $this instanceof ebook;
    }
    public function temTaxaImpressao(){
        return $this instanceof livroFisico;
    }
    
    public function calculaImposto(){
        return $this->preco * 0.195;
    }
    
    abstract function atualizaBaseadomEm($params);
}
