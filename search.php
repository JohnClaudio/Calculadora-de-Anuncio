<?php
require('./view/layout/header.php');

//require('./backend/models/Anuncio.php');
//require('./backend/class/Calculadora2.php');
require_once './ControllerAnuncio.php';

$controller = new ControllerAnuncio();

$controller->ApresentarAnuncios();
$calculadora = new Anuncio();
if(!isset($_GET['pesquisa'])){
$_GET['pesquisa']=null;

}

?>
  <body class=" text-white text-monospace capgeminiColorBlueDark">
  
   
 <div class="container mt-5 py-4 ">
      <main role="main" >
      

 <form class="form-inline" METHOD="GET" action="search.php">

  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" name="pesquisa" placeholder="Anuncio/cliente">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
</form>
        
        
        
         <center><h3>Anuncios Cadastrados</h3></center>      
   	<div class="row mt-5">
           <?php 
 
           foreach ($anuncios = $controller->ApresentarAnuncios($_GET['pesquisa']) as  $value){?>
 
 
	
          <div class="column-sm-4 float-left "   ">
          <div class="card bg-light text-dark mb-4 ml-4 ml-2 ml-4 text-center font-weight-bold"  style="max-width: 14rem; ">
          <div class="card-header">     <p><?php echo $value[0]?></ps> </div>
          <div class="card-body">
          <p class="card-text ">Total de Views: <h5 class="font-weight-bold text-danger"><?php echo $value[3]?></h5> </p>               
          <hr>
          <p class="card-text text-monospacefont-weight-bold">Total de Clicks:  <h6><p class=" font-weight-bold "><?php echo $value[4]?> </h6></p></p>
          <hr>
          <p class="card-text font-weight-bold">Compartilhamentos: <h5 class="font-weight-bold "><?php echo $value[5]?></h5></p>  
          <hr>
          <p class="card-text "> Cliente: <h6 class="font-weight-bold text-info"><?php echo $value[6]?></h6></p>                     
          
               
          <hr>
               <div class="btn-group dropright ">
              <button type="button" class="btn btn-primary btn-sm dropdown-toggle float-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
              mais info
              </button> 
              <div class="dropdown-menu bg-light text-dark ">
           	 <li class="dropdown-item"> criado inicio: <?php echo $value[1]?></li>
           	 <li class="dropdown-item"> criado termino: <?php echo $value[2]?></li>
           	  <li class="dropdown-item"> Dias de contrato: <label class="text-danger font-weight-bold"><?php echo $value[8]?></label></li>
             <li class="dropdown-item"> investido R$: <label class="text-danger font-weight-bold"><?php echo $value[7]?></label></li>
             
                   
           
              </div>
            </div>  
          </div>
         
          </div></div>
          
          
                <?php };?>
                </div>
                </div>
                
        </div>
        </div>
      </main>
  



<?php require('./view/layout/footer.php')?>
