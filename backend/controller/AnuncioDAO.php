<?php 


//require ('../config/configUser.php');

class AnuncioDAO{
    
    private $pdo; 
    
    public function __construct() { 
        
        $pdo = new config();
        $this->pdo = $pdo->connect();         
        return $this->pdo;
        
    }
    
    public function MostrarAnuncios():array {
        
       $stm = $this->pdo->prepare('select * from anuncio order by id_anuncio desc ');
       $result = $stm->execute();    
       return($result = $stm->fetchAll(PDO::FETCH_ASSOC));
       
    }
    
    public function cadastrarAnuncio(Anuncio $anuncio ){

        $stm = $this->pdo->prepare('insert into anuncio values(default, :anuncioNome, :dataInicio, :dataFim, :investimentoDia, :nomeCliente, default)');
        $stm->bindValue(':anuncioNome',      $anuncio->getNomeAnuncio());
        $stm->bindValue(':dataInicio',       $anuncio->getInicio());
        $stm->bindValue(':dataFim',          $anuncio->getTermino());        
        $stm->bindValue(':investimentoDia',  $anuncio->getInvestimento());           
        $stm->bindValue(':nomeCliente',      $anuncio->getNomeCliente());         
        return $stm->execute();   
    }
        
    public function pesquisarAnuncio ($entrada):array{ 
        
        $sql = "select * from anuncio where nome_cliente like ? or nome_anuncio like ? order by id_anuncio desc";
        $stm = $this->pdo->prepare($sql);
        $result = $stm->execute(array("%$entrada%","%$entrada%"));
        return $result = $stm->fetchAll();                  
    
    }
    
    public function calculoDias($data_inicial,$data_final) {
        $diferenca = strtotime($data_final) - strtotime($data_inicial);
        $dias = floor($diferenca / (60 * 60 * 24));
        return $dias;
    }
    
       
} 