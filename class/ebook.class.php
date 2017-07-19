<?php

class ebook extends livro{
    
    private $marcaDagua;
    
    public function getMarcaDagua(){
        return $this->marcaDagua;
    }
    public function setMarcaDagua($marcaDagua){
        return $this->marcaDagua = $marcaDagua;
    }
    
}
