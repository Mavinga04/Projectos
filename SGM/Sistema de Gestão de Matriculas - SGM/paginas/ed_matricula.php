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
    <title>editar matricula</title>

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
      .form{width: 70%;margin: auto;margin-top: 20px;border-radius: 10px;}
      .form-control{margin-bottom: 10px;}
      .b{width: 100%;}

    </style>

  </head>
  <body>
    <?php
      $id = $_GET["id"];
      $sql = mysqli_query($conexao,"SELECT * from matricula JOIN encarregado ON matricula.fk_encarregado=encarregado.id_encarregado JOIN contacto ON matricula.fk_contacto=contacto.id_contacto JOIN morada ON matricula.fk_morada=morada.id_morada JOIN repitent ON matricula.fk_repitent = repitent.id_repitent  where id_matricula='$id'");

      $exibe = mysqli_fetch_assoc($sql);
    ?>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <?php echo "<a href='ed_foto.php?&id=".$exibe['id_matricula']."'class='text-dark'>Fotografia</a>";?> |
        <?php echo "<a href='ed_cert.php?&id=".$exibe['id_matricula']."'class='text-dark'>Certificado</a>";?> |
        <?php echo "<a href='../recibos/matricula.php?&id=".$exibe['id_matricula']."'class='text-dark'>Fechar</a>";?>
      </nav>
    </div>

    

    <div class="form p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
      <form method="POST" action="../php/editar_matricula.php" autocomplete="off">
        <input  type="hidden" name="id_matricula" value="<?php echo $exibe['id_matricula'];?>">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Nome Completo</label>
              <input type="text" class="form-control" name="nome" value="<?php echo $exibe['nome'];?>">               
            </div>

            <div class="col-md-5 mb-3">
              <label>Data de Nascimento</label>
              <input type="date" class="form-control" name="data" value="<?php echo $exibe['data'];?>">               
            </div>
         
            <div class="col-md-6 mb-3">
              <label>B.I/Cédula</label>
              <input type="text" class="form-control" name="bi" value="<?php echo $exibe['bi'];?>">                
            </div>
           
            <!---Tabela--> 
            <div class="col-md-3 mb-3">
              <label>Naturalidade</label>
              <select class="custom-select d-block w-100" name="fk_provincia" value="<?php echo $exibe['fk_provincia'];?>">
                <?php 
                  $seleciona = mysqli_query($conexao,"SELECT * FROM provincia");
                  while($Visualizar = mysqli_fetch_assoc($seleciona)){
                ?>
                <option value="<?php echo $Visualizar['id_provincia']; ?>" <?php if ($Visualizar['id_provincia'] == $exibe['fk_provincia']){echo "selected";} ?> >
                <?php echo $Visualizar['provincia']; ?></option>
                <?php 
                  }
                ?> 
              </select>      
            </div>

            <!---Tabela--> 
            <div class="col-md-3 mb-3">
              <label>sexo</label>
              <select class="custom-select d-block w-100" name="fk_sexo" value="<?php echo $exibe['fk_sexo'];?>">
                <?php 
                  $seleciona = mysqli_query($conexao,"SELECT * FROM sexo");
                  while($Visualizar = mysqli_fetch_assoc($seleciona)){
                ?>
                <option value="<?php echo $Visualizar['id_sexo']; ?>" <?php if ($Visualizar['id_sexo'] == $exibe['fk_sexo']){echo "selected";} ?> >
                    <?php echo $Visualizar['sexo']; ?></option>
                  <?php 
                    }
                  ?>
              </select>      
            </div>
              
            <!--Tabela-->
            <div class="col-md-6 mb-3">
              <label>Nome do Pai</label>
              <input type="text" class="form-control" name="pai" value="<?php echo $exibe['pai'];?>">               
            </div>

            <div class="col-md-6 mb-3">
              <label>Nome da Mãe</label>
              <input type="text" class="form-control" name="mae" value="<?php echo $exibe['mae'];?>">                
            </div>

            <div class="col-md-6 mb-3">
              <label>Nome do Encarregado</label>
              <input type="text" class="form-control" name="encarregado" value="<?php echo $exibe['encarregado'];?>">                
            </div>

            <!--Tabela-->
            <div class="col-md-3 mb-3">
              <label>Contacto:</label>
              <input type="text" class="form-control" name="contacto" placeholder="+224" value="<?php echo $exibe['contacto'];?>">        
            </div>

            <div class="col-md-3 mb-3">
              <label>Outro Contacto:</label>
              <input type="text" class="form-control" name="outro" placeholder="+224" value="<?php echo $exibe['outro'];?>">               
            </div>
            
            <!---Tabela-->          
            <div class="col-md-3 mb-3">
              <label>Endereço/Morada</label>
              <input type="text" class="form-control" name="morada" placeholder="Bairro" value="<?php echo $exibe['morada'];?>">            
            </div>    

            <!---TABELA CLASSE--> 
            <div class="col-md-2 mb-2">
              <label>Classe</label>
              <select class="custom-select d-block w-100 selection-1" onchange="ocultar();" name="fk_classe" id="classe" value="<?php echo $exibe['fk_classe'];?>">

                <?php  
                  $seleciona = mysqli_query($conexao,"SELECT * FROM classe");
                  while($Visualizar = mysqli_fetch_assoc($seleciona)){
                ?>
                <option value="<?php echo $Visualizar['id_classe']; ?>" <?php if ($Visualizar['id_classe'] == $exibe['fk_classe']){echo "selected";} ?> >
                
                <?php echo $Visualizar['classe']; ?></option>
                <?php 
                  }
                ?> 
              </select>      
            </div>

            <!---TABELA --> 
            <div class="col-md-2 mb-2">
              <label>Estado</label>
              <select class="custom-select d-block w-100 selection-1" name="fk_repitent" value="<?php echo $exibe['fk_repitent'];?>">

                <?php  
                  $seleciona = mysqli_query($conexao,"SELECT * FROM repitent");
                  while($Visualizar = mysqli_fetch_assoc($seleciona)){
                ?>
                <option value="<?php echo $Visualizar['id_repitent']; ?>" <?php if ($Visualizar['id_repitent'] == $exibe['fk_repitent']){echo "selected";} ?> >
                
                <?php echo $Visualizar['repitent']; ?></option>
                <?php 
                  }
                ?> 
              </select>      
            </div>
                  
            <!---Tabela--> 
            <div class="col-md-3 mb-3">
              <label>Curso</label>                  
              <select class="custom-select d-block w-100" name="fk_curso" id="curso" value="<?php echo $exibe['fk_curso'];?>">
                <?php 
                  $seleciona = mysqli_query($conexao,"SELECT * FROM curso");
                  while($Visualizar = mysqli_fetch_assoc($seleciona)){
                ?>
                <option value="<?php echo $Visualizar['id_curso']; ?>" <?php if ($Visualizar['id_curso'] == $exibe['fk_curso']){echo "selected";} ?> >
                <?php echo $Visualizar['curso']; ?></option>
                  <?php 
                    }
                  ?>
              </select>      
            </div>

            <!---Tabela--> 
            <div class="col-md-2 mb-3">
              <label>Turno</label>
              <select class="custom-select d-block w-100" name="fk_turno" value="<?php echo $exibe['fk_turno'];?>">
                <?php 
                  $seleciona = mysqli_query($conexao,"SELECT * FROM turno");
                  while($Visualizar = mysqli_fetch_assoc($seleciona)){
                ?>
                <option value="<?php echo $Visualizar['id_turno']; ?>" <?php if ($Visualizar['id_turno'] == $exibe['fk_turno']){echo "selected";} ?> >
                <?php echo $Visualizar['turno']; ?></option>
                <?php 
                  }
                ?>                      
              </select>                          
            </div>
          </div>
          <!--BOTÃO-->
          <input name="editar" value="Salvar" class="b btn btn-primary" data-toggle="modal" data-target="#exampleModal">

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Notificação</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Concluír com alteração? 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                  <input type="submit" name="editar" class="btn btn-primary" value="Editar">
                </div>
              </div>
            </div>
          </div><!--Fim Modal--->
             

           <input type="hidden" name="id" value="<?php echo $id; ?>">
           <input type="hidden" name="id_encarregado" value="<?php echo $exibe['id_encarregado'] ?>">
           <input type="hidden" name="id_morada" value="<?php echo $exibe['id_morada'] ?>">
           <input type="hidden" name="id_contacto" value="<?php echo $exibe['id_contacto'] ?>">               
        </form>
    </div>    

  </body>
   <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>
