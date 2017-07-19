<?php

abstract class livro extends produto{
    private $isbn;
    
    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }
    
    public function calculaImposto(){
        return $this->getPreco()*0.065;
    }
}
