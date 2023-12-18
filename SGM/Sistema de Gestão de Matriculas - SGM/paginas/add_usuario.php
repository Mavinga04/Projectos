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
    <title>criar conta</title>

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
      .form{width: 40%; margin: auto; margin-top: 60px;border-radius: 10px;}
      .b{width: 100%;}
      .form-control{margin-bottom: 10px;}
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Adicionar Novo Conta</h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="definicoes.php">Fechar</a>
      </nav>
    </div>

    <!--form--->
    <div class="form p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
      <h1 class="text-center"><i class="fa fa-user-plus"></i></h1>
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
      <form action="../php/add_usuario.php" method="post" autocomplete="off">        
        
        <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
        <input type="text" name="usuario" class="form-control" placeholder="Nome de Usuário" required>
        <select class="custom-select d-block w-100 form-control" name="fk_sexo">
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

        <select class="custom-select d-block w-100 form-control" name="nivel" required>
          <option>Nivel de Acesso</option>
          <option value="1">Administrador</option>
          <option value="2">Usuário(comum)</option>                  
        </select>

        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
        <input type="text" name="senha_recuperacao" class="form-control" placeholder="Senha de Recuperação" required>
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
                Adicionar novo utilizador?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                <input type="submit" name="Salvar" class="btn btn-primary" value="Sim">
              </div>
            </div>
          </div>
        </div><!--Fim Modal--->

      </form>
    </div>
  </body>
  <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>
