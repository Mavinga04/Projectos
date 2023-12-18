<?php
session_start();
include('../php/conexao.php');

unset($_SESSION['usuario']);
unset($_SESSION['senha']);


$usuario = isset($_POST['usuario'])?$_POST['usuario']:'';
$senha   = isset($_POST['senha'])?md5($_POST['senha']):'';
$erro_login   = isset($_GET['logar'])?$_GET['logar']:0;
$erro_vazio   = 0;

if (isset($_POST['enviar'])) {
  if (!empty($usuario)) {
   if (!empty($senha)) {
    $select = mysqli_query($conexao,"SELECT * FROM usuario WHERE usuario ='$usuario' AND senha = '$senha' ");
    $login  = mysqli_fetch_array($select);
    if ($select) {
      if (mysqli_num_rows($select) > 0) {
        $_SESSION['usuario'] = $login['usuario'];
        $_SESSION['senha'] = $login['senha'];
        $_SESSION['id'] = $login['id'];
        $_SESSION['nivel'] = $login['nivel'];
        header("location:home.php");
      }
      else {
        $erro = 1;
      }
    }
    else {
      echo "erro";
    }
  }
  else {
    $erro_vazio = 1;
  }
}
else {
  $erro_vazio = 1;
}
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
    <title>login</title>

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
      /*body{background-image: url(../assets/img/B.jpg); background-size: cover; min-height: 60vh;}*/
      .user{font-size: 7.5rem;}
      .Area{width: 30%;margin: auto; margin-top: 50px; border-radius: 10px;}
      .acessar{width: 100%;}
      .form-control{margin-bottom: 10px;margin-top:10px;}

    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto text-dark font-weight-normal">
        <img src="../assets/img/sgm.png" width="60px" height="60px"></h5>
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
                  <p>Obs: Para acessar o sistema é necessário inserir:</p>
                  <p>1 - Nome de Usuário | 2 - Senha</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-outline-primary" href="../index.html">Fechar</a>      
      </nav>
      
    </div>

    <div class=" ">
    <div class="Area text-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded"><hr>
      <!--LOGO-->
      <i class="user fa fa-user-circle"></i>
      <!--SMS PHP-->
        <center>
          <?php
            if ($erro_login) {
            echo "<font color='red'>Não tens permição para acessar o sistema!</font>";}

            if ($erro_vazio) {echo "<font color='red'>Prencha os campos!</font>";}
          ?>
        </center>

      <!--AREA DOS FORMULARIOS-->
          <form method="post" action="#" autocomplete="off">

            <input type="text" name="usuario" class="form-control" placeholder="Nome de Usuário" required>
            <input type="password" name="senha" class="form-control" placeholder="Senha" required>

            <button type="submit" name="enviar" class="acessar btn btn-primary">Iniciar Sessão</button>
            
          </form><hr>
      </div></div>

  </body>
   <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

   
</html>
