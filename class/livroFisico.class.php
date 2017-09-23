<?php

class livroFisico extends livro{
    
    private $taxaImpresao;
    
    public function getTaxaImpresao(){
        return $this->taxaImpresao;
    }
    public function setTaxaImpresao($taxaImpresao){
        return $this->taxaImpresao = $taxaImpresao;
    }
    
    function atualizaBaseadomEm($params) {
    
        $this->setIsbn($params["isbn"]);       
        $this->setTaxaImpresao($params["taxaimpressao"]);
        
        }
    
}
