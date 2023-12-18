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
    <title>editar conta</title>

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
      i:hover{transform: scale(1.1);transition: 0.5s;}
      body{background: #f3f3f3;}
      .form{width: 40%; margin: auto;}
      .b{width: 100%;}
      .form-control{margin-bottom: 10px;}
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Editar Conta</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="area_usuarios_def.php">Fechar</a>
      </nav>
    </div>

    <?php
      $id = $_GET["id"];
      $sql = mysqli_query($conexao,"SELECT * FROM usuario WHERE id_usuario='$id'");
      $exibe = mysqli_fetch_assoc($sql);
    ?>

    <div class="form text-center px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h1><i class="fas fa-user-cog"></i></h1>
     
      <form action="../php/editar_usuario.php" method="POST" autocomplete="off">
        <input  type="hidden" name="id_usuario" value="<?php echo $exibe['id_usuario'];?>">
        <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $exibe['nome'];?>" required>

        <input type="text" name="usuario" class="form-control" placeholder="usuario" value="<?php echo $exibe['usuario'];?>" required>

        <select class="custom-select d-block w-100 form-control" name="fk_sexo" value="<?php echo $exibe['fk_sexo'];?>" required>
          <?php 
            $seleciona = mysqli_query($conexao,"SELECT * FROM sexo");
            while($Visualizar = mysqli_fetch_assoc($seleciona)){
          ?>
          <option value="<?php echo $Visualizar['id_sexo']; ?>" <?php if ($Visualizar['id_sexo'] == $exibe['fk_sexo']){echo "selected";} ?> >
            <?php echo $Visualizar['sexo'];?></option>
            <?php 
              }
            ?> 
        </select>

        <select class="form-control" name="nivel" value="<?php echo $exibe['nivel'];?>" required>
          <option>Nivel</option>
          <option value="1">Administrador</option>
          <option value="2">Usuário(comum)</option>
        </select>

        <input type="password" name="senha" class="form-control" placeholder="Senha" value="<?php echo $exibe['senha'];?>" required>
        
        <input type="text" name="senha_recuperacao" class="form-control" placeholder="senha_recuperacao" value="<?php echo $exibe['senha_recuperacao'];?>" required>
 
        <a class="b btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</a>

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
              <div class="text-left modal-body">
                Concluir alteração?
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
