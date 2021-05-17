<?php 


//require ('../config/configUser.php');

class Anuncio{
    
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
    
    public function cadastrarAnuncio($anuncio, $dataInicio, $dataFim, $investimentoDia, $nomeCliente){

            $sql = "insert into anuncio values (default,?,?,?,?,?,default)";
            $stm = $this->pdo->prepare("$sql");
            return $result = $stm->execute(array($anuncio,$dataInicio,$dataFim,$investimentoDia,$nomeCliente));
    }
        
    public function pesquisarAnuncio ($entrada):array{ 
        
        $sql = "select * from anuncio where nome_cliente like ? order by id_anuncio desc";
        $stm = $this->pdo->prepare($sql);
        $result = $stm->execute(array("%$entrada%"));
        return $result = $stm->fetchAll();                  
    
    }
    
    public function calculoDias($data_inicial,$data_final) {
        $diferenca = strtotime($data_final) - strtotime($data_inicial);
        $dias = floor($diferenca / (60 * 60 * 24));
        return $dias;
    }
    
       
} 