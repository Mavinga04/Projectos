<?php
session_start();
include('../php/conexao.php');

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
  header("location:login.php?logar=1");
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
    <title>matricula</title>

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
      .area{width: 65%; margin: auto; }
      .logotipo{margin-bottom: 50px;}
      .img-foto{border: 1px solid #f3f3f3; border-radius: 10px;}
      .img-post{float: left;margin: 0px 10px 10px 5px;}
      .ab{width: 34%;margin: auto;margin-top: 100px;}
      .btn {margin-bottom: 10px;}
      
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Informações</h5>

      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="../paginas/lista_matricula.php">Fechar</a>             
      </nav>
    </div>
    <?php
      $id = $_GET["id"];
      $lista_dados = mysqli_query($conexao,"SELECT * FROM matricula JOIN classe ON matricula.fk_classe = classe.id_classe JOIN curso ON matricula.fk_curso=curso.id_curso JOIN turno ON matricula.fk_turno=turno.id_turno JOIN encarregado ON matricula.fk_encarregado=encarregado.id_encarregado JOIN contacto ON matricula.fk_contacto=contacto.id_contacto JOIN provincia ON matricula.fk_provincia=provincia.id_provincia JOIN sexo ON matricula.fk_sexo=sexo.id_sexo JOIN morada ON matricula.fk_morada=morada.id_morada JOIN fotos ON (matricula.fk_foto = fotos.id_foto) JOIN repitent ON matricula.fk_repitent=repitent.id_repitent WHERE id_matricula='$id' ");

      $total = mysqli_num_rows($lista_dados);
      while($resultado = mysqli_fetch_array($lista_dados)){
      $id_matricula = $resultado['id_matricula'];              
      $nome = $resultado['nome'];
      $pai = $resultado['pai'];
      $mae = $resultado['mae'];
      $fk_provincia = $resultado['provincia'];
      $data = $resultado['data'];
      $fk_sexo = $resultado['sexo'];
      $fk_morada = $resultado['morada'];
      $bi = $resultado['bi'];
      $fk_repitent = $resultado['repitent'];
      $fk_classe = $resultado['classe'];
      $fk_curso = $resultado['curso'];
      $fk_turno = $resultado['turno'];
      $encarregado = $resultado['encarregado'];
      $contacto = $resultado['contacto'];
      $outro = $resultado['outro'];

    ?>

    <div id="info">
      <div class="area align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
        <div class="logotipo">
          <img src="../assets/img/logo.png" class="img-post" width= "100px" height="100px">
          <p>República de Angola<br> Complexo Escolar Bondo Adelina</p><hr>
        </div>

        <div>
            <img src="../imagens/fotos/<?php echo $resultado['foto'] ?>" width="200px" height="200px"
            class="img-foto img-post align-items-center p-3 px-md-4 mb-3 shadow-lg p3 md-5 rounded">  
        </div>

        <div class="dados">

          <div class="text-primary"><h4><?php echo $nome?>         N°:<?php echo $id_matricula?></h4></div>

          <div>
            <span class="text-primary">Filho/a de:</span> <?php echo $pai?> e <?php echo $mae?> | 
            <span class="text-primary">Data de Nascimento:</span> <?php echo $data?>
          </div>

          <div>
            <span class="text-primary">Natural:</span> <?php echo $fk_provincia?> | 
            <span class="text-primary">Sexo:</span> <?php echo $fk_sexo?> | 
            <span class="text-primary">Endereço/Morada:</span> <?php echo $fk_morada?> |
            
          </div>

          <div>
            <span class="text-primary">N° BI/Cedula:</span> <?php echo $bi?> |
            <span class="text-primary">Estudante da:</span> <?php echo $fk_classe?> Classe |
            <span class="text-primary"> <?php echo $fk_repitent?> </span>|  
            
          </div>

          <div>
            <span class="text-primary">Curso:</span> <?php echo $fk_curso?> |  
            <span class="text-primary">Turno:</span> <?php echo $fk_turno?> |
            <span class="text-primary">Encarregado de Educação:</span> <?php echo $encarregado?>
          </div>

          <div>
            <span class="text-primary">Contactos:</span> <?php echo $contacto?> / <?php echo $outro?>
          </div><br>
        </div>          
      </div>
     </div>  
      <div class="ab p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
        <input type="button" name="" class='btn btn-dark' value="Imprimir" onclick="funcao_pdf()">
          <?php echo "<a href='cert.php?&id=".$resultado['id_matricula']."' class='btn btn-success'>Certificado</a>";?>         
          <?php echo "<a href='../paginas/ed_matricula.php?&id=".$resultado['id_matricula']."' class='btn btn-primary'>Editar</a>";?>

            <?php if ($_SESSION['nivel'] == 1) {?>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $resultado['id_matricula']?>">Eliminar</button>          
            <!-- Modal -->
            <div class="modal fade" id="eliminar<?php echo $resultado['id_matricula']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Matrícula</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    Eliminar matricula
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <?php echo "<a href='../php/apagar_matricula.php?&id=".$resultado['id_matricula']."'class='btn btn-primary'>Sim</a>";?>
                    
                  </div>
                </div>
              </div>
            </div><!--Fim Modal--->   
          </div>
          <?php } ?>
      <?php } ?>                  
      </div>

</body>

<script>
  function funcao_pdf() {
    var select_dados = document.getElementById('info').innerHTML;

    var janela = window.open('','','width=500,heigth=500');
    janela.document.write('<html><head>');
    janela.document.write('<title>PDF</title>');
    janela.document.write(' </head><body>');
    janela.document.write(select_dados);
    janela.document.write('</body></html>');
    janela.document.close();
    janela.print();

  }
</script>    


  <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>

 
                