<?php
session_start();
include('../php/conexao.php');

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
  header("location:login.php?logar=1");
}

$id = $_GET["id"];
$sql_listar_cadastros = mysqli_query($conexao,"SELECT * FROM matricula JOIN classe ON matricula.fk_classe = classe.id_classe JOIN curso ON matricula.fk_curso=curso.id_curso JOIN turno ON matricula.fk_turno=turno.id_turno JOIN encarregado ON matricula.fk_encarregado=encarregado.id_encarregado JOIN contacto ON matricula.fk_contacto=contacto.id_contacto JOIN provincia ON matricula.fk_provincia=provincia.id_provincia JOIN sexo ON matricula.fk_sexo=sexo.id_sexo JOIN morada ON matricula.fk_morada=morada.id_morada JOIN fotos ON (matricula.fk_foto = fotos.id_foto) JOIN cert ON (matricula.fk_cert = cert.id_cert) WHERE id_matricula='$id' ");

$total_registros = mysqli_num_rows($sql_listar_cadastros);
                
while($resultado = mysqli_fetch_array($sql_listar_cadastros)){
$id_matricula = $resultado['id_matricula'];              
$nome = $resultado['nome'];
$pai = $resultado['pai'];
$mae = $resultado['mae'];
$fk_provincia = $resultado['provincia'];
$data = $resultado['data'];
$fk_sexo = $resultado['sexo'];
$fk_morada = $resultado['morada'];
$bi = $resultado['bi'];
$fk_classe = $resultado['classe'];
$fk_curso = $resultado['curso'];
$fk_turno = $resultado['turno'];
$encarregado = $resultado['encarregado'];
$contacto = $resultado['contacto'];
$outro = $resultado['outro'];
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>certificado</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body{background:#f3f3f3; }
      .area{width: 65%; margin: auto; }
      .logotipo{margin-bottom: 50px;}
      .img-foto{border: 1px solid #f3f3f3; border-radius: 10px;}
      .img-post{float: left;margin: 0px 10px 10px 5px;}
      .dados{margin-bottom: 0px;}
      info{height: 880px; width: 840px;}
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
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
        <input type="button" name="" class='btn btn-dark' value="Imprimir" onclick="funcao_pdf()">   
        <?php echo "<a href='matricula.php?&id=".$exibe['id_matricula']."'class='text-dark'>Fechar</a>";?>
      </nav>
    </div>
    

    <div class="area align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <div class="logotipo">
        <img src="../assets/img/logo.png" class="img-post" width= "100px" height="100px">
        <p>República de Angola<br> Complexo Escolar Bondo Adelina</p><hr>
      
        <div id="info" class="area">
          <center>
              <img src="../imagens/certificados/<?php echo $resultado['cert'] ?>" width="600px" class="img-foto img-post align-items-center p-3 px-md-4 mb-3 shadow-sm">
          </center>       
        </div>
      </div>

    
          <?php
            }
          ?>
      </div> 

    </div>
  </body>
  <script>
  function funcao_pdf() {
    var select_dados = document.getElementById('info').innerHTML;

    var janela = window.open('','','width=800,heigth=600');
    janela.document.write('<html><head>');
    janela.document.write('<title>PDF</title>');
    janela.document.write(' </head><body>');
    janela.document.write(select_dados);
    janela.document.write('</body></html>');
    janela.document.close();
    janela.print();

  }
</script> 
</html>
