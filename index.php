<?php 

session_start();
//ESTRUTURA DA PAGINA
require_once('./view/layout/header.php'); 
require_once('./view/conteudo_paginas/index.php');
require_once('./view/layout/footer.php');
//---------------------------------------------

require_once('./backend/config/includeConfig.php'); //include de arquivos necessários;


if(isset($_POST['btnCadastrarAnuncio'])) 
{
  unset($_POST['btnCadastrarAnuncio']);
   //VERIFICANDO SE CAMPOS ESTÃO VAZIOS
    if (!empty($_POST['nomeAnuncio']) and 
        !empty($_POST['dataInicio'])   and
        !empty($_POST['dataTermino'])  and
        !empty($_POST['investimento']) and
        !empty($_POST['nomeCliente']))       
    {     

      
        //SANITIZAÇÃO E ATRIBUIÇÃO
        $nomeAnuncio  = filter_var($_POST['nomeAnuncio'], FILTER_SANITIZE_STRING);
        $dataInicio  = filter_var($_POST['dataInicio'], FILTER_SANITIZE_STRING);
        $dataTermino  = filter_var($_POST['dataTermino'], FILTER_SANITIZE_STRING);
        $investimento  = filter_var($_POST['investimento'], FILTER_SANITIZE_STRING);
        $nomeCliente  = filter_var($_POST['nomeCliente'], FILTER_SANITIZE_STRING);

        $controllerAnuncio = new ControllerAnuncio(); 
        $VALIDAR_DIAS = $controllerAnuncio->calculoDias($dataInicio, $dataTermino); // realiza o calculo entre inicio e termino;
        
        if($VALIDAR_DIAS< 0 ) //SE OS DIAS DO INICIO E FIM DO CONTRATO FOR MENOR QUE 0
        {
          $_SESSION['CADASTRO_FALHOU']= true;
          header('Location: ./index.php');
        }

        //INSTANCIANDO CLASSES
       $anuncio = new Anuncio();
       $anuncioDAO = new AnuncioDAO($pdo = new config()); //OBJETO ANUNCIODAO RECEBE OBJETO DE CONEXÃO PDO
        
      //ADICIONANDO OS DADOS NO OBJETO ANUNCIO
      $anuncio->setNomeAnuncio($nomeAnuncio);
      $anuncio->setInicio($dataInicio);
      $anuncio->setTermino($dataTermino);
      $anuncio->setInvestimento($investimento);
      $anuncio->setNomecliente($nomeCliente);

 
      //VALIDANDO CADASTRO
      if($anuncioDAO->cadastrarAnuncio($anuncio) == TRUE)
      {
        $_SESSION['CADASTRO_FEITO']= true;
      //  header('Refresh:0');
  
      }
      else
      {
        $_SESSION['CADASTRO_FALHOU']= true;
    //    header('Refresh:0');
      }

      
       
 
    }
   
   
  }
    


