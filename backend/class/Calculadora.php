<?php

class Calculadora {
    
    private $valordeInvestimento; 
    private $visualizacaoOriginal;
    private $visualizacaoTotal;
    private $totaldeClicks;
    private $totaldeCompartilhamentos; 
 
    public function setValordeInvestimento($investimento = 0){

        $valor_convertido = floatval(str_replace(',', '.', $investimento)); //troca a virgula pelo ponto e converte string para float.
        $this->valordeInvestimento = $valor_convertido;   
        
        return $this->valordeInvestimento = $valor_convertido; 
      
    }
    
    public function getValordeInvestimento()  {
   
        return  $this->valordeInvestimento;
    
    }
    
    public function setVisualizacaoOriginal($investimento) {
        
        $calculoVisualizacaoSemCompartilhamento = ceil(($investimento * 30));
        return $this->visualizacaoOriginal = $calculoVisualizacaoSemCompartilhamento;
    }
    
    public function getVisualizacaoOriginal() {
        
        return $this->visualizacaoOriginal;
    }
    
    public function setVisualizacaoTotal($valorInvestido){
        
        $visualizacoes_originais = Calculadora::setVisualizacaoOriginal($valorInvestido);
        $qtdClicks = Calculadora::setTotaldeClicks($visualizacoes_originais); //clicks a cada 100 views
        $compartilhamentos = Calculadora::setTotaldeCompartilhamentos($qtdClicks); 
        
        if($compartilhamentos >= 1)
        {
            return $this->visualizacaoTotal = $visualizacoes_originais + $compartilhamentos * 40;
        }
        else
        {
            return $this->visualizacaoTotal = $visualizacoes_originais;
        }  
        
    }
  
    public function getVisualizacaoTotal(){
        
          return $this->visualizacaoTotal; 
    }
    
    public function setTotaldeClicks($visualizacoesTotal): int {
        
        $totalviews = $visualizacoesTotal;
        $centenas_views_unidade = intval($totalviews); //captura as unidades das centenas de views e converte para int
        $resultado = round($centenas_views_unidade * 12 / 100);   //cada centena de pessoas multiplica por 12
        $this->totaldeClicks = $resultado;
        
        return floor($this->totaldeClicks);
        
    }
    
    public function getTotaldeClicks(){
   
        return $this->totaldeClicks;
        
    }
    
    public function setTotaldeCompartilhamentos($totaldeClicks): int {
     
        $Clicks = $totaldeClicks * 15/100;
        $total = floor($Clicks);          
        $this->totaldeCompartilhamentos = $total;
        
        return $this->totaldeCompartilhamentos;
        
    }
    
    public function getTotaldeCompartilhamentos() {

        return $this->totaldeCompartilhamentos;
        
    }
    
    public function projecaodeAnuncio($investimento):array {
        
        $valorInvestido = Calculadora::setValordeInvestimento($investimento);
        $visualizacaoTotal = Calculadora::setVisualizacaoTotal($valorInvestido);
        $visualizacaoOriginal = Calculadora::getVisualizacaoOriginal();
        $qtd_clicks = Calculadora::getTotaldeClicks();
        $totaldeCompartilhamentos = Calculadora::getTotaldeCompartilhamentos();
        
        return array($valorInvestido,$visualizacaoTotal,$visualizacaoOriginal,$qtd_clicks,$totaldeCompartilhamentos);
        
        
    }
            
}

