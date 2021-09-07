<?php

require_once('./view/layout/header.php'); 
require_once('./backend/config/includeConfig.php');

$controller = new ControllerAnuncio();
$controller->ApresentarAnuncios();
$calculadora = new Anuncio();

if(!isset($_GET['pesquisa'])) {  $_GET['pesquisa']= null; }

?>
<body class=" text-white text-monospace smokebg">
  
   
  <div class="container mt-3 py-4 ">
       <main role="main" >
       
 
  <form class="form-inline" METHOD="GET" action="anuncios.php">
 
   <div class="form-group mx-sm-3 mb-2">
     <input type="text" style="width: 25vw;"class="form-control" name="pesquisa" placeholder="Anuncio/cliente">
   </div>
   <button type="submit" style="width: 10vw;"class="btn btn_laranja mb-2">Pesquisar</button>
 </form>
         
         
         
         
  <div class="row mt-2">
     
     <?php 
  
     foreach ($anuncios = $controller->ApresentarAnuncios($_GET['pesquisa']) as  $value){ ?>
  
     
     <div class="column-sm-4">
 
       <div class=" text-dark mb-4 ml-4 ml-2 ml-4 font-weight-bold"  style="max-width: 14rem; ">
          <h6 class="titulo_anuncio btn "><?php echo $value[0]?></h6>
     
          <div class="card-body">
 
          <div class= "d-flex">
           <p class="texto_claro" >Total de views: </p>
           <h6 class="texto_laranja font-weight-bold ml-2 "> <?php echo $value[3]?> </h6></p>
           </div>
           <div class= "d-flex">
           <p class="texto_claro" >Total de Clicks: </p>
           <h6 class="texto_laranja font-weight-bold ml-2"> <?php echo $value[4]?> </h6></p>
           </div>
 
           <div class= "d-flex">
           <p class="texto_claro" >Compartilhamentos </p>
           <h6 class="texto_laranja font-weight-bold ml-2"> <?php echo $value[5]?></h6></p>
           </div>
 
           <hr>
            <div class="btn-group dropright ">
               <button type="button" class="btn btn_laranja btn-sm dropdown-toggle float-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
               mais informações
               </button> 
               <div class="dropdown-menu bg-light text-dark ">
               <li class="dropdown-item"> Nome do cliente: <?php echo $value[6]?></li>
                 <li class="dropdown-item"> criado inicio: <?php echo $value[1]?></li>
                 <li class="dropdown-item"> criado termino: <?php echo $value[2]?></li>
                  <li class="dropdown-item"> Dias de contrato: <label class="text-danger font-weight-bold"><?php echo $value[8]?></label></li>
              <li class="dropdown-item"> investido <label class="text-danger font-weight-bold">R$: <?php echo number_format($value[7], 2, ',', '.');?></label></li>    
           </div>
 
         </div> 
 
       </div>
 
 
          
           </div>
         
         </div>
           
           
                 <?php }; ?>
                 </div>
                 </div>
                 
         </div>
  </div>
       </main>
   
<?php require_once('./view/layout/footer.php'); ?>
