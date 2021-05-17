<?php

class Calculadora2 {
    
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
        
        $visualizacoes_originais = Calculadora2::setVisualizacaoOriginal($valorInvestido);
        $qtdClicks = Calculadora2::setTotaldeClicks($visualizacoes_originais); //clicks a cada 100 views
        $compartilhamentos = Calculadora2::setTotaldeCompartilhamentos($qtdClicks);
        
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
        
        /*   while($Clicks >= 12)
         {
         $Clicks = $Clicks - 12;
         $total= $total +1;
         
         }*/
        
        $this->totaldeCompartilhamentos = $total;
        
        return $this->totaldeCompartilhamentos;
        
    }
    
    public function getTotaldeCompartilhamentos() {
        
        return $this->totaldeCompartilhamentos;
        
    }
    
    public function projecaodeAnuncio($investimento):array {
        
        $valorInvestido = Calculadora2::setValordeInvestimento($investimento);
        $visualizacaoTotal = Calculadora2::setVisualizacaoTotal($valorInvestido);
        $visualizacaoOriginal = Calculadora2::getVisualizacaoOriginal();
        $qtd_clicks = Calculadora2::getTotaldeClicks();
        $totaldeCompartilhamentos = Calculadora2::getTotaldeCompartilhamentos();
        
        return array($valorInvestido,$visualizacaoTotal,$visualizacaoOriginal,$qtd_clicks,$totaldeCompartilhamentos);
        
        
    }
    
    public function calcularProjecaodeAnuncio($investimento) {
        
        $valorInvestido = Calculadora2::setValordeInvestimento($investimento);
        $visualizacaoTotal = Calculadora2::setVisualizacaoTotal($valorInvestido);
        $visualizacaoOriginal = Calculadora2::getVisualizacaoOriginal();
        $qtd_clicks = Calculadora2::getTotaldeClicks();
        $totaldeCompartilhamentos = Calculadora2::getTotaldeCompartilhamentos();
        
        echo'<br> <center>';
        echo '<h2>----------\-  Projecao Estimada Detalhada - /--------</h2>';
        echo" <h4>Seu investimento:</h4> <b><h3> R$ ".  number_format($valorInvestido, 2, ',', '.'). "</h3>";
        echo" <h5>PROJECAO TOTAL APROXIMADA DE VISUALIZACOES:</h5> <b><h4> $visualizacaoTotal </b> </h4>";
        echo" <h5>PROJECAO TOTAL DE VISUALIZACOES ORIGINAIS:</h5> <b><h4> $visualizacaoOriginal </b> </h4>";
        echo" <h5>PROJECAO DE CLICKS:</h5> <b><h4> ($qtd_clicks) </b> </h4>";
        echo" <h5>PROJECAO DE COMPARTILHAMENTOS:</h5> <b><h4> ($totaldeCompartilhamentos) </b> </h4>";
        
        
    }
    
    
}
