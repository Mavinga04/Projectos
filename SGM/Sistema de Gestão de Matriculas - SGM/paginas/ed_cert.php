<?php
session_start();
include('../php/conexao.php');

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
  header("location:login.php?logar=vazio");
}

$id_matricula = $_GET['id'];
$select = mysqli_query($conexao,"SELECT matricula.*, cert.* FROM matricula JOIN cert ON (matricula.fk_cert = cert.id_cert) WHERE matricula.id_matricula = $id_matricula");
$dados = mysqli_fetch_array($select);
if (isset($_POST['botao'])){
  if (isset($_FILES['cert'])){
    $cert = strtolower(substr($_FILES['cert']['name'], -4));
    $nome = md5(time()).$cert;
    $pasta = '../imagens/certificados/';
    unlink('../imagens/certificados/'.$dados['cert']);
    move_uploaded_file($_FILES['cert']['tmp_name'],$pasta.$nome);
    $sql = mysqli_query($conexao,"UPDATE cert SET cert = '$nome' WHERE id_cert = '".$dados['id_cert']."' ");

    header('Location:../paginas/lista_matricula.php?sms=sucesso');

  }else {
    //echo "Nenhum arquivo selecionado";
    header('Location:ed_foto.php?sms2=falha');

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
      .form{width: 50%;margin: auto; margin-top: 50px;border-radius: 10px;}
      .form-control{margin-bottom: 6px;}
      .btn{ margin-bottom: 10px;}
    </style>
  </head>
  <body>
    <?php
      $id = $_GET["id"];
      $sql = mysqli_query($conexao,"SELECT * from matricula JOIN encarregado ON matricula.fk_encarregado=encarregado.id_encarregado JOIN contacto ON matricula.fk_contacto=contacto.id_contacto JOIN morada ON matricula.fk_morada=morada.id_morada JOIN repitent ON matricula.fk_repitent = repitent.id_repitent  where id_matricula='$id'");

      $exibe = mysqli_fetch_assoc($sql);
    ?>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"> </h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
        <?php echo "<a href='../paginas/ed_matricula.php?&id=".$exibe['id_matricula']."'class='text-dark'>Fechar</a>";?>
      </nav>
    </div>
    
    <div class="form px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">  
      <h4>Editar Imagem do Certificado</h4><hr>

      <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="cert" class="form-control" required>
        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</a>

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
                  <input type="submit" name="botao" value="sim" class="btn btn-primary">
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
