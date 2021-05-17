<?php 

session_start();
require('./view/layout/header.php');

?>
  <body class="capgeminiColorBlueDark text-white ">
  
   
 <div class="container ">
      <main role="main">
      

         <div class="col-sm-8 mx-auto">
         <center><h1>Cadastrar Anuncio </h1></center>
         
        
        <div class="jumbotron mt-5 text-dark ">            
        
        <?php 
      if(isset($_SESSION['CADASTRO_FEITO'])){ ?>
     
      <div class="alert alert-success" role="alert"> O cadastro foi realizado com sucesso!</div>
 	<?php unset($_SESSION['CADASTRO_FEITO']);}?>
 
 
         <?php 
      if(isset($_SESSION['CADASTRO_FALHOU'])){ ?>
      <div class="alert alert-danger" role="alert"> Insira dados validos</div>
 	<?php unset($_SESSION['CADASTRO_FALHOU']);}?>
 	
 
         <form action="./actions/cadastrarAnuncio.php" method="POST">
          <div class="form-group" >
            <label for="formGroupExampleInput">Nome do anuncio</label>
            <input type="text" class="form-control" name="nomeAnuncio" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Data de inicio:</label>
            <input type="date" class="form-control" name="dataInicio" id="formGroupExampleInput2" required>
          </div>
           <div class="form-group">
            <label for="formGroupExampleInput2">Data de termino:</label>
            <input type="date" class="form-control" name="dataTermino" id="formGroupExampleInput2" required>
          </div>
              <div class="form-group ">
            <label for="formGroupExampleInput2 ">Investimento por dia:</label>
            <input type="number" class="form-control" name="investimento" step="any" placeholder="R$ 25,00" required>
          </div>
            <div class="form-group">
            <label for="formGroupExampleInput2">Nome do cliente</label>
            <input type="text" class="form-control" name="nomeCliente" required>
          </div>   
        <center> <button type="submit" name="cadastro" class="btn btn-primary mt-5">Cadastrar</button></center> 
           
        </form> </div>
      
        </div>
      </main>
      </div>
    </div>


<?php require('./view/layout/footer.php')?>
