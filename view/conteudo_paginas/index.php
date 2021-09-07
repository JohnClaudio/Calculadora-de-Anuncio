<body class="smokebg text-dark">
  
   
  <div class="container mt-4  ">
       <main role="main">
       
 
          <div class="col-sm-6 mx-auto">
          <h1 class="titulo"> Software Calculador de Anúncio</h1>         
         
         <div class="mt-3 text-dark ">     

            <?php if(isset($_SESSION['CADASTRO_FEITO']))
            { ?>
      
         <div class="alert alert-success" role="alert"> O cadastro foi realizado com sucesso!</div>

          <?php unset($_SESSION['CADASTRO_FEITO']);
           }?>
  
  
          <?php if(isset($_SESSION['CADASTRO_FALHOU']))
          { ?>

            <div class="alert alert-danger" role="alert"> Insira dados validos</div>

        <?php unset($_SESSION['CADASTRO_FALHOU']);
    }?>
      
  
          <form method="POST">
      
          <div class="form-group">
             <label for="formGroupExampleInput2">Nome do cliente</label>
             <input type="text" class="form-control" name="nomeCliente" placeholder="digite o nome do cliente" required>
           </div>   
 
      
           <div class="form-group ">
             <label for="formGroupExampleInput2  ">Investimento por dia:</label>
             <input type="number" class="input_menor form-control" name="investimento" step="any" placeholder="R$ 25,00" required>
           </div>
 
           <div class="d-flex justify-content-between">
             <div class="form-group">
               <label for="formGroupExampleInput2">Data de inicio:</label>
               <input type="date" class="input_menor form-control" name="dataInicio" id="formGroupExampleInput2" required>
             </div>
             
             <div class="form-group">
               <label for="formGroupExampleInput2">Data de termino:</label>
               <input type="date" class="form-control input_menor" name="dataTermino" id="formGroupExampleInput2" required>
             </div>
         </div>
         <div class="form-group" >
             <label for="formGroupExampleInput">Nome do anuncio</label>
             <input type="text" class="form-control" name="nomeAnuncio" placeholder="digite o nome do anuncio" required>
           </div>
       
   
       
              <center> <button type="submit" name="btnCadastrarAnuncio" class="btn btn_laranja ">Cadastrar</button></center> 
         </form> 
         
         </div>
       
         </div>
       </main>
       </div>
     </div>
 