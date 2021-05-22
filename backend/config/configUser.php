<?php 

class configUser{
    
private $host       = "localhost";
private $username   = "root";
private $password   = "vertrigo";
//private $dsn        = "mysql:host=$host;";
private $dbname     = "calculadoracapgemini";


//private $dsn        = "mysql:host=$host;dbname=$dbname";
private $options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

public function __construct() {     
            $dns =array(
            host=> $this->host,
            username=> $this->username,
            host=> $this->password,
            username=> $this->dbname,
            username=> $this->dbname
                   
        );
        
    }
    
}

?>