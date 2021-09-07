<?php

class Anuncio 
{
    private $nomeAnuncio; 
    private $inicio;
    private $termino;
    private $investimento;
    private $nomeCliente; 
 
    public function setNomeAnuncio($nome)
    {
        $this->nomeAnuncio = $nome;
    }

    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }

    public function setTermino($termino)
    {
        $this->termino = $termino;
    }

    public function setInvestimento($investimento)
    {
        $this->investimento = $investimento;
    }

    public function setNomeCliente($nomeCliente)
    {
        $this->nomeCliente = $nomeCliente;
    }

  //GETTERS
  
    public function getNomeAnuncio()
    {
        return $this->nomeCliente;
    }

    
    public function getInicio()
    {
        return $this->inicio;
    }

    
    public function getTermino()
    {
        return $this->termino;
    }

    
    public function getInvestimento()
    {
        return $this->investimento;
    }

    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }
    
            
}

