<?php
session_start();
include('../php/conexao.php');


if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
  header("location:login.php?logar=vazio");
}
$nivel = $_SESSION['nivel'];
$id    = $_SESSION['id'];

?>

<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>editar classe</title>

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
      .form{width: 30%;margin: auto;margin-top: 100px;border-radius: 10px;}
      .form-control{margin-bottom: 10px;}

    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="area_classes.php">Fechar</a>
      </nav>
    </div>

    <?php
      $id = $_GET["id"];
      $sql = mysqli_query($conexao,"SELECT * FROM classe WHERE id_classe='$id'");
      $exibe = mysqli_fetch_assoc($sql);
    ?>

    <div class="form p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
      <form action="../php/editar_classe.php" method="POST" autocomplete="off">           
        <input  type="hidden" name="id" value="<?php echo $exibe['id_classe'];?>">         
        <input type="text" name="classe" class="form-control" placeholder="Digite a Classe" value="<?php echo $exibe['classe'];?>">

        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Salvar</a>

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

      </form><hr>         
    </div>    

  </body>
   <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>
