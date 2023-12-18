<?php
session_start();
include('../php/conexao.php');

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
  header("location:login.php?logar=1");
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
    <title>lista dos inscritos </title>

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
      .area{width: 80%; margin: auto; }
      .logotipo{margin-bottom: 50px;}
      .img-foto{border: 1px solid #f3f3f3; width: 150px; height: 150px;}
      .img-post{float: left;margin: 0px 10px 10px 5px;}
      .user{font-size: 1.5rem;}
      #descer{overflow: scroll;height: 320px;text-align: center;}
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"></h5>

      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="area_cursos.php">Fechar</a>
      </nav>
    </div>

    <div >  
      <div class="area align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
        <div class="logotipo">
          <img src="../assets/img/logo.png" class="img-post" width= "100px" height="100px">
          <p>República de Angola<br> Complexo Escolar Bondo Adelina</p><hr>
        </div>

        <div id="descer">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th>Nome Completo</th>
                <th>Turno</th>
                <th>Nome do Encarregado</th>
                <th>Contactos</th>
                <th>Informações</th>
              </thead>
              <?php
                $id = $_GET["id"];
                $lista_inscritos = mysqli_query($conexao,"SELECT * FROM matricula JOIN classe ON matricula.fk_classe = classe.id_classe JOIN curso ON matricula.fk_curso=curso.id_curso JOIN turno ON matricula.fk_turno=turno.id_turno JOIN encarregado ON matricula.fk_encarregado=encarregado.id_encarregado JOIN contacto ON matricula.fk_contacto=contacto.id_contacto JOIN provincia ON matricula.fk_provincia=provincia.id_provincia JOIN sexo ON matricula.fk_sexo=sexo.id_sexo JOIN morada ON matricula.fk_morada=morada.id_morada WHERE fk_curso='$id' ");

                $total = mysqli_num_rows($lista_inscritos);
                      
                while($resultado = mysqli_fetch_array($lista_inscritos)){
                  $nome = $resultado['nome'];
                  $fk_classe = $resultado['classe'];
                  $fk_curso = $resultado['curso'];
                  $fk_turno = $resultado['turno'];
                  $encarregado = $resultado['encarregado'];
                  $contacto = $resultado['contacto'];
                  $outro = $resultado['outro'];
              ?>
              <tbody>
              <tr>
                <div style="position: fixed; top: 100px; right: 20%;">                 
                  <h5><?php echo $fk_curso?></h5>
                </div>
    
                <td class="cor"><?php echo $nome?></td>
                <td class="cor"><?php echo $fk_turno?></td>
                <td class="cor"><?php echo $encarregado?></td>
                <td class="cor"><?php echo $contacto?> / <?php echo $outro?></td>

                <td>
                <?php echo "<a href='../recibos/matricula.php?&id=".$resultado['id_matricula']."' class='btn btn-primary'>Informações</a>";?>
                </td>                     
              </tr>
            </tbody>
            <?php
              }
            ?>           
          </table>
        </div>
      </div><hr>

      <div>
        <?php 
          $total= mysqli_query($conexao, "SELECT COUNT(*) AS count FROM matricula WHERE fk_curso='$id'");
          while($mostra= mysqli_fetch_array($total)){
        ?>
        <p><i class="fas fa-users "></i> Total: <?php echo $mostra['count']; ?></p>
        <?php }?>
      </div>
    </div>
  </div>
</body>

</html>    