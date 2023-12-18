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
    <title>pesquisar matrícula</title>

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
      .form-area{width: 50%; margin: auto;}
      #botão-pesquisa{position: absolute; right: 10px; top: 0px;}
      .area-resultado{width: 90%;margin: auto; margin-top: 40px;}
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">
      </h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="lista_matricula.php">Fechar</a>
      </nav>
    </div>

    <div class="">
      <center>
        <form method="post" action="" autocomplete="off">
            <div class="col-md-5">
              <!--form--> 
              <input type="text" name="nome" id="form" class="form-control" placeholder="Digite o Nome" required>
              <!--botão-->
              <div id="botão-pesquisa">
                <button name="enviar" type="submit"  class="btn btn-primary" value="pesquisar"><i class="fa fa-search"></i></button>
              </div>

            </div>
        </form>
      </center>
    </div>

    <div class="area-resultado align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
      <div id="descer">  
        <div class="text-center table-responsive">
          <table class="table table-hover">
            <thead>
              <th>Nome Completo</th>
              <th>Classe</th>
              <th>Curso</th>
              <th>Turno</th>
              <th>Nome do Encarregado</th>
              <th>Contactos</th>
              <th>Data-emissão</th>
              <th>Informações</th>
            </thead>
            <?php
        $enviar = filter_input(INPUT_POST, 'enviar');
        if ($enviar) {
             
          $nome = filter_input(INPUT_POST, 'nome');
                
          $result_pesquisa = "SELECT * FROM matricula JOIN classe ON matricula.fk_classe = classe.id_classe JOIN curso ON matricula.fk_curso=curso.id_curso JOIN turno ON matricula.fk_turno=turno.id_turno JOIN encarregado ON matricula.fk_encarregado=encarregado.id_encarregado JOIN contacto ON matricula.fk_contacto=contacto.id_contacto WHERE nome LIKE '%$nome%'";
                
          $resultado = mysqli_query($conexao, $result_pesquisa);

          while ($row_encontrado = mysqli_fetch_assoc($resultado)){

            $nome = $row_encontrado['nome'];
            $fk_classe = $row_encontrado['classe'];
            $fk_curso = $row_encontrado['curso'];
            $fk_turno = $row_encontrado['turno'];
            $encarregado = $row_encontrado['encarregado'];
            $contacto = $row_encontrado['contacto'];
            $criado = $row_encontrado['criado'];                     
        ?>
        <tbody>
          <tr>  
            <td class="cor"><?php echo $nome?></td>
            <td class="cor"><?php echo $fk_classe?></td>
            <td class="cor"><?php echo $fk_curso?></td>
            <td class="cor"><?php echo $fk_turno?></td>
            <td class="cor"><?php echo $encarregado?></td>
            <td class="cor"><?php echo $contacto?></td>
            <td class="cor"><?php echo $criado?></td>
            <td>
              <?php echo "<a href='../recibos/matricula.php?&id=".$row_encontrado['id_matricula']."' class='btn btn-primary'>Informações</a>";?>
            </td> 
          </tr>
        </tbody>
        <?php 
            }
          }
        ?>             
      </table><hr> 
      </div>
    </div>
  </div>
</body>
</html>
