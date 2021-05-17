<?php
require ('../models/Anuncio.php');
require ('../class/Calculadora2.php');
require('../config/config.php');
class ControllerAnuncio{
    
    private $anuncio;
    private $calculadoraAnuncio;
    
    public function __construct() {
        
        $this->anuncio = new Anuncio();
        $this->calculadoraAnuncio = new Calculadora2();
        
    }
    
    public function calculoDias($data_inicial,$data_final) {
        $diferenca = strtotime($data_final) - strtotime($data_inicial);
        $dias = floor($diferenca / (60 * 60 * 24));
        return $dias;
    }
    
    public function ApresentarAnuncios():array { 
        
        $todos=[];
   
        foreach ($this->anuncio->MostrarAnuncios() as $value) {
            
            /*Realiza Calculos da estimava * dias investidos e retorna em array*/
            $totalDias = ControllerAnuncio::calculoDias($value['data_inicio'], $value['data_termino']);
            $CalculoDiasXInvestimento = $value['investimento_dia'] * $totalDias;
            $estimativa = $this->calculadoraAnuncio->projecaodeAnuncio($CalculoDiasXInvestimento);
            
            array_push($todos,[
                $value['nome_anuncio'],
                $value['data_inicio'],
                $value['data_termino'],
                $estimativa[1], //total views
                $estimativa[3], //clicks
                $estimativa[4], //compartilhamentos
                $value['nome_cliente']]);

        }
        return $todos;
    }
       
    }
       

$teste = new ControllerAnuncio();

var_dump($teste->ApresentarAnuncios());

