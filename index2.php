<?php 
require ("./backend/config/config.php");
require ("./backend/models/Anuncio.php");
session_start();

/*
$id=1;

$stm = $connection->prepare('select * from anuncio where id_anuncio=?');
$result = $stm->execute(array($id));
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);*/

/*
foreach (MostrarAnuncios() as $value) {
    echo $value['nome_anuncio'] .'<br>';
    echo $value['data_termino'] .'<br>';
    echo $value['data_inicio'] .'<br>';
    echo $value['nome_cliente'] .'<br>';
}*/




function MostrarAnuncios(){
    $connection = new config();
    $connection = $connection->connect();
    $stm = $connection->prepare('select * from anuncio ');
    $result = $stm->execute();
  //  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    return($result = $stm->fetchAll());
}

function CadastrarAnuncio ($anuncio,$dataInicio,$dataFim,$investimentoDia,$nomeCliente) {
    $connection = new config();
    $connection = $connection->connect();
   $sql = "insert into anuncio values (default,?,?,?,?,?,default)";
   $stm = $connection->prepare("$sql");
   $result = $stm->execute(array($anuncio,$dataInicio,$dataFim,$investimentoDia,$nomeCliente));
   var_dump($result);
}

//CadastrarAnuncio('novo', '2021-05-10', '2021-05-10', 'cliente1');


$resulto=MostrarAnuncios();
foreach ($resulto as $key => $value) {
    $calculo = intval($value['nome_anuncio']);
  //  $calculo = $calculo;
    
    echo '<br>'. $key;
    echo $value['id_anuncio'].'<br>';
    echo $value['nome_anuncio'].' investimento: ';
    echo $value['investimento_dia'].'<br>';
    
}


?>
<html>




</html>

