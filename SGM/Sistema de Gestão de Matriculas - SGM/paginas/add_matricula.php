<?php
session_start();
include('../php/conexao.php');

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
  header("location:login.php?logar=vazio");
}

?>
<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>matricular</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/pricing/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!---Fontawesome-->
    <link href="../assets/fontawesome/all.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {font-size: 1.125rem;text-anchor: middle;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
      @media (min-width: 768px) {.bd-placeholder-img-lg {font-size: 3.5rem;}}
      body{background: #f3f3f3;}
      .user{font-size: 2.1rem;}
      i:hover{transform: scale(1.1);transition: 0.5s;}
      .form{width: 70%;margin: auto; margin-top: 30px;border-radius: 10px;}
      .b{width: 100%;}
      .desc{margin-top: 36px;}
    </style>

    <script type="text/javascript">
      function ocultar() {
        var classe = document.getElementById('classe').value;
        if (classe < 10) {
          document.getElementById('curso').disabled="disabled";
        }
        else {
          document.getElementById('curso').disabled="";
        }
      }
    </script>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Formulário de Matrícula</h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="home.php">Fechar</a>
      </nav>
    </div>

    <div class="form d-flex flex-column flex-md-row align-items-center bg-white p-3 px-md-4 mb-3 shadow-lg p3 md-5 rounded">      
      <form method="POST" action="../php/add_matricula.php" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Nome Completo</label>
            <input type="text" class="form-control" name="nome" placeholder="" required>               
          </div>
          <!---Tabela--> 
          <div class="col-md-3 mb-3">
            <label>Fotografia</label>
            <input type="file" class="form-control" name="foto" required>               
          </div>
          <!---Tabela--> 
          <div class="col-md-3 mb-3">
            <label>Certificado</label>
            <input type="file" class="form-control" name="cert">               
          </div>

          <div class="col-md-3 mb-3">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control" name="data" placeholder="" required>               
          </div>

          <div class="col-md-4 mb-3">
            <label>BI/Cedula</label>
            <input type="text" class="form-control" name="bi" placeholder="" required>                
          </div>
           
          <!---Tabela--> 
          <div class="col-md-3 mb-3">
            <label>Naturalidade</label>
            <select class="custom-select d-block w-100" name="fk_provincia" required>
              <option>Província</option>
              <?php 
                $seleciona = mysqli_query($conexao,"select * from provincia");
                while($Visualizar = mysqli_fetch_assoc($seleciona)){
              ?>
              <option value="<?php echo $Visualizar['id_provincia']; ?>" >                
              <?php echo $Visualizar['provincia']; ?></option>
              <?php 
                }
              ?>
            </select>      
          </div>

          <!---Tabela--> 
          <div class="col-md-2 mb-3">
            <label>Sexo</label>
            <select class="custom-select d-block w-100" name="fk_sexo" required>
              <option>sexo</option>
              <?php 
                $seleciona = mysqli_query($conexao,"select * from sexo");
                while($Visualizar = mysqli_fetch_assoc($seleciona)){
              ?>
              <option value="<?php echo $Visualizar['id_sexo']; ?>" >               
              <?php echo $Visualizar['sexo']; ?></option>
              <?php 
                }
              ?>
            </select>      
          </div>
              
          <!--Tabela-->
          <div class="col-md-6 mb-3">
            <label>Nome do Pai</label>
            <input type="text" class="form-control" name="pai" placeholder="" required>               
          </div>

          <div class="col-md-6 mb-3">
            <label>Nome da Mãe</label>
            <input type="text" class="form-control" name="mae" placeholder="" required>                
          </div>

          <div class="col-md-6 mb-3">
            <label>Nome do Encarregado</label>
            <input type="text" class="form-control" name="encarregado" placeholder="" required>                
          </div>

          <!--Tabela-->
          <div class="col-md-3 mb-3">
            <label>Contacto</label>
            <input type="text" class="form-control" name="contacto" placeholder="+224" required>               
          </div>

          <div class="col-md-3 mb-3">
            <label>Outro Contacto</label>
            <input type="text" class="form-control" name="outro" placeholder="+224">               
          </div>
            
          <!---Tabela-->          
          <div class="col-md-3 mb-3">
            <label>Endereço/Morada</label>
            <input type="text" class="form-control" name="morada" placeholder="Bairro" required>               
          </div>    

          <!---Tabela--> 
          <div class="col-md-2 mb-2">
            <label>Classe</label>
            <select class="custom-select d-block w-100 selection-1" onchange="ocultar();" name="fk_classe" id="classe" required>
              <option>Classes</option>
              <?php 
                $seleciona = mysqli_query($conexao,"select * from classe");
                while($Visualizar = mysqli_fetch_assoc($seleciona)){
              ?>
              <option value="<?php echo $Visualizar['id_classe']; ?>" >               
              <?php echo $Visualizar['classe']; ?></option>
              <?php 
                }
              ?>
            </select>      
          </div>

          <!---Tabela--> 
          <div class="col-md-2 mb-2">
            <label>Estado </label>
            <select class="custom-select d-block w-100 selection-1" name="fk_repitent" required>
              <?php 
                $seleciona = mysqli_query($conexao,"select * from repitent");
                while($Visualizar = mysqli_fetch_assoc($seleciona)){
              ?>
              <option value="<?php echo $Visualizar['id_repitent']; ?>" >               
              <?php echo $Visualizar['repitent']; ?></option>
              <?php 
                }
              ?>
            </select>      
          </div>          

                  
          <!---Tabela--> 
          <div class="col-md-3 mb-3">
            <label>Curso</label>                  
            <select class="custom-select d-block w-100" name="fk_curso" id="curso" required>
              <?php 
                $seleciona = mysqli_query($conexao,"select * from curso");
                while($Visualizar = mysqli_fetch_assoc($seleciona)){
              ?>
              <option value="<?php echo $Visualizar['id_curso']; ?>" >
              <?php echo $Visualizar['curso']; ?></option>
              <?php 
                }
              ?>
            </select>      
          </div>

          <!---Tabela--> 
          <div class="col-md-2 mb-3">
            <label>Turno</label>
            <select class="custom-select d-block w-100" name="fk_turno" required>
              <option>Turnos</option>
              <?php 
                $seleciona = mysqli_query($conexao,"select * from turno");
                while($Visualizar = mysqli_fetch_assoc($seleciona)){
              ?>
              <option value="<?php echo $Visualizar['id_turno']; ?>" >
              <?php echo $Visualizar['turno']; ?></option>
              <?php 
                }
              ?>
            </select>                          
          </div>

          
        </div>
        <div>
          <a class="b btn btn-primary" data-toggle="modal" data-target="#modalsalvar">Salvar</a>

          <!-- Modal -->
          <div class="modal fade" id="modalsalvar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Notificação</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Adicionar nova matrícula?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                  <input type="submit" class="btn btn-primary" name="Matricular" value="Sim">
                </div>
              </div>
            </div>
          </div><!--Fim Modal--->

        </div>            
      </form>
      <!--SMS PHP-->
      <div>
        <?php
          $sms =isset($_GET['sms'])?$_GET['sms']:0;
          $falha = isset($_GET['sms2'])?$_GET['sms2']:0;
          if ($sms) {
            echo "<font color='blue'>Operacão com Sucesso</font>";
            }
             if ($falha) {
            echo "<font color='red'>Falha na Operacão!</font>";
          }
        ?>
      </div>       
    </div> 
  </body>
  <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>
