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
    <title>home</title>

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
      .user{font-size: 2.1rem;}
      body{background: #f3f3f3;}
      /*body{background-image: url(../assets/img/E.jpg); background-size: cover; min-height: 60vh;}*/
      .container{width: 70%; margin: auto;}
      .artigos{display: flex;justify-content: space-between;flex-wrap: wrap;margin-top: 70px;}

      a{text-decoration: none; color: #fff;}
      a:hover{text-decoration: none; color: #fff;}

      article{width: 33%;height: 150px;margin-bottom: 3px;transition: 0.5s;border-radius: 1px;color: #fff; }
      article:hover{transform: scale(1.1);transition: 0.5s;color: #fff;}

      i:hover{transform: scale(1.1);transition: 0.5s;}      
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">
        <i class=" user fas fa-user-tie"></i> - <?php echo $_SESSION['usuario']; ?>
      </h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
       
        <a class="p-2 text-dark" data-toggle="modal" data-target="#exampleModal">Ajuda</a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Esta janela apresenta o menu inicial, onde se encontra todas operações dos utilizadores de acordo ao seu nivel de acesso.  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
              </div>
            </div>
          </div>
        </div>

       
      </nav>
      <a class="btn btn-outline-primary" href="../php/terminar_sessao.php">Terminar Sessão</a>
    </div>

    <!--definições--->
    <section>
      <div class="sessao-principal">
        <section class="artigos container">
         <article class="bg-warning">
            <div class="card-header">Matrícular</div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="add_matricula.php">
                    <h1><i class='fas fa-book' aria-hidden='true'></i></h1>                      
                  </a>
                </h5>
              </div>
          </article>
          
          <article class="bg-success">
            <div class="card-header">Lista dos Matriculados</div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="lista_matricula.php">
                    <?php 
                      $total= mysqli_query($conexao, "SELECT COUNT(*) AS count FROM matricula");
                        while($mostra= mysqli_fetch_array($total)){
                    ?>             
                     <h1><i class='fas fa-list' aria-hidden='true'>  <?php echo $mostra['count']; ?></i></h1>
                    <?php }?>
                  </a>
                </h5>
              </div>
          </article>

          <?php
            if ($_SESSION['nivel'] == 1) {
          ?>
          
          <article class="bg-danger">
            <div class="card-header">Definições de Contas Utilizadores</div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="definicoes.php">
                    <?php 
                      $total= mysqli_query($conexao, "SELECT COUNT(*) AS count FROM usuario");
                        while($mostra= mysqli_fetch_array($total)){
                    ?>             
                     <h1><i class="fas fa-users-cog">  <?php echo $mostra['count']; ?></i></h1>
                    <?php }?>
                  </a>
                </h5>
              </div>
          </article>

          <article class="bg-info">
            <div class="card-header">Classes</div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="area_classes.php">
                    <h1>
                      <i class="fa fa-home"></i>
                    </h1> 
                  </a>
                </h5>
              </div>
          </article>

          <article class="bg-dark">
            <div class="card-header">Cursos</div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="area_cursos.php">
                    <h1>
                      <i class="fa fa-home"></i>
                    </h1> 
                  </a>
                </h5>
              </div>
          </article> 

          <article class="bg-primary">
            <div class="card-header">Turnos</div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="area_turnos.php">
                    <h1>
                      <i class="far fa-clock"></i>
                    </h1> 
                  </a>
                </h5>
              </div>
          </article>
          <?php
            }
          ?>

          <article class="bg-secondary">
            <div class="card-header">infomações</div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="info.html">
                    <h1><i class="fa fa-home"></i></h1> 
                  </a>
                </h5>
              </div>
          </article>          
        </section>      
      </div>
    <!--fim--->
    </section>
  
  </body>
  <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>
