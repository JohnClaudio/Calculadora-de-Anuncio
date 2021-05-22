<?php

/**
Abre conexão via PDO com o banco de dados
modifique os dados (user,host,pass,user acordo com o seu banco de dados;
**/

class config{
    
    private $host       = "localhost";
    private $username   = "root";
    private $password   = "vertrigo";
    private $dsn        = "mysql:host=localhost;dbname=calculadoracapgemini";

    public function connect () {
        
     try {           
             
            return new PDO($this->dsn, $this->username, $this->password);;
            
         } 
         
     catch(PDOException $error) {
        
           echo "<br>" . $error->getMessage();  
           return $error->getMessage();
           
         }
        
    }
    
    public function disconnect () {
 
       return $this->db = null;
        
    }
    




}