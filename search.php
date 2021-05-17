<?php
require('./view/layout/header.php');

//require('./backend/models/Anuncio.php');

require_once './ControllerAnuncio.php';

$controller = new ControllerAnuncio();
?>
  <body class="capgeminiColorBlueDark text-white">
  
   
 <div class="container py-4">
      <main role="main">
      

 
         <center><h1>Anuncios Cadastrados</h1></center>      
   
    
           <?php foreach ($anuncios = $controller->ApresentarAnuncios() as $key => $value){ ?>
 
              <div class="column-sm-4 ">
          <div class="card bg-light text-dark mb-4 float-left ml-4 ml-2 ml-4" style="max-width: 18rem;">
        
          <div class="card-header  mt-4 ">     <h5><?php echo $value[0]?></h5></div>
          <div class="card-body">
  
              <p class="card-text">Total de Views: <h5><?php echo $value[3]?></h5></p>
                 <hr>
              <p class="card-text"> <h5><?php echo $value[4]?> </h5></p>
                 <hr>
               <p class="card-text"> <h5><?php echo $value[5]?></h5></p>
                  <hr>
               <p class="card-text"><h5><?php echo $value[6]?></h5></p>
                       
          </div>
         
          </div></div>
                <?php }; ?>
        </div>
        </div>
      </main>
  



<?php require('./view/layout/footer.php')?>
