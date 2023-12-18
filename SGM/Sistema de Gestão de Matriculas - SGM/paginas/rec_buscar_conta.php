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
    <title>buscar conta</title>

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
      .Area{width: 50%; margin: auto; border-radius: 10px; margin-top: 100px;}
      .form-control{margin-bottom: 10px;}
      .form{margin-top: 10px;}
      .btn{width: 100%;}
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Recuperar Conta</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="definicoes.php">Fechar</a>
      </nav>
    </div>

    <div class="Area p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
      <div class="text-primary"><h5>Buscar Conta</h5></div><hr>
      <!--form-->
      <div class="form">
        <form method="post" action="../php/rec_buscar_conta.php" autocomplete="off"> 
          <input type="text" name="usuario" class="form-control" placeholder="Digite o nome de usuário da conta" required>
          <button type="submit" name="enviar" class="btn btn-primary">Buscar</button>
        </form>
      </div>
    </div>
    
  </body>
</html>
