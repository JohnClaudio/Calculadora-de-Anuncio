<?php
session_start();
$_SESSION['CADASTRO_FALHOU'] = null;
$_SESSION['CADASTRO_FEITO'] = null;
require ("../backend/models/Anuncio.php");
require ('../backend/config/config.php');

//require ('../backend/class/Calculadora2.php');

$anuncio = new Anuncio();


 function calculoDias($data_inicial,$data_final) {
    $diferenca = strtotime($data_final) - strtotime($data_inicial);
    $dias = floor($diferenca / (60 * 60 * 24));
    return $dias;
}

if(isset($_POST['cadastro'])){
    $nome = $_POST['nomeAnuncio'];
    $inicio = $_POST['dataInicio'];
    $termino = $_POST['dataTermino'];
    $investimento = $_POST['investimento'];
    $nomeCliente = $_POST['nomeCliente']; 
    
    $days = calculoDias($inicio, $termino);
  
    var_dump($days);
   
    }
    if ($days < 0){
        $_SESSION['CADASTRO_FALHOU']= true;
         header('Location: ../index.php');
    }else if ($anuncio->cadastrarAnuncio($nome, $inicio, $termino, $investimento, $nomeCliente and $_SESSION['CADASTRO_FALHOU']==false)){
        $_SESSION['CADASTRO_FEITO']= true;
        header('Location: ../index.php');
    }
    
    header('Location: ../index.php');
   






//header('Location: ../index.php');






