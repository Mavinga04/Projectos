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
    <title>lista dos Matriculados</title>

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
       #descer{overflow: scroll;height: 450px;}
       .area{width: 95%;margin: auto;border-radius: 10px;}
       .btn{color: #fff;}
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">
        <i class=" user fas fa-user-tie"></i> - <?php echo $_SESSION['usuario']; ?>
      </h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="home.php">Home</a>
        <a class="p-2 text-dark" href="add_matricula.php">Matricular</a>        
        <a class="p-2 text-dark" href="pesquisar_matricula.php">Pesquisar</a>
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
                Esta Janela Apresenta todos os inscritos ou matriculados na Instituição.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <div class="area p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
      <div align="right">
        <?php 
          $total= mysqli_query($conexao, "SELECT COUNT(*) AS count FROM matricula");
          while($mostra= mysqli_fetch_array($total)){
        ?>            
        <h4><i class="fa fa-users"></i> - <?php echo $mostra['count']; ?></h4><?php }?>
      </div>
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
              $lista_matricula = mysqli_query($conexao,"SELECT * FROM matricula JOIN classe ON matricula.fk_classe = classe.id_classe JOIN curso ON matricula.fk_curso=curso.id_curso JOIN turno ON matricula.fk_turno=turno.id_turno JOIN encarregado ON matricula.fk_encarregado=encarregado.id_encarregado JOIN contacto ON matricula.fk_contacto=contacto.id_contacto");

              $total_registros = mysqli_num_rows($lista_matricula);
                    
              while($resultado = mysqli_fetch_array($lista_matricula)){
                $nome = $resultado['nome'];
                $fk_classe = $resultado['classe'];
                $fk_curso = $resultado['curso'];
                $fk_turno = $resultado['turno'];
                $encarregado = $resultado['encarregado'];
                $contacto = $resultado['contacto'];
                $outro = $resultado['outro'];
                $criado = $resultado['criado'];
            ?>
            <tbody>
              <tr>  
                <td class="cor"><?php echo $nome?></td>
                <td class="cor"><?php echo $fk_classe?></td>
                <td class="cor"><?php echo $fk_curso?></td>
                <td class="cor"><?php echo $fk_turno?></td>
                <td class="cor"><?php echo $encarregado?></td>
                <td class="cor"><?php echo $contacto?> / <?php echo $outro?></td>
                <td class="cor"><?php echo $criado?></td>
                       
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
    </div>
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
  </div>
</body>
  <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>
