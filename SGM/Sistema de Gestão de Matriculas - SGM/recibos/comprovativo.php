<?php
session_start();
include('../php/conexao.php');

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
  header("location:login.php?logar=1");
}
$ultima_matricula = mysqli_query($conexao,"SELECT * FROM matricula ORDER BY id_matricula DESC LIMIT 1");    
$buscar = mysqli_fetch_array($ultima_matricula);
    
?>

<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>comprovativo</title>

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
      .area{width: 50%; margin: auto; }
      .titulo{margin-bottom: 20px;}
      .descricao{margin-bottom: 5px;}
      /*#info{height: 880px; width: 840px;}*/
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Comprovativo</h5>
      <nav class="my-2 my-md-0 mr-md-3">        
        <input type="button" name="" class='btn btn-success' value="Imprimir" onclick="funcao_pdf()">
        <a href="../paginas/home.php" class="btn btn-primary">Concluír</a>
      </nav>
    </div>


    <div id="info" class="area p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <div><div align="right">Data:____/_____/_______</div><h3>Comprovativo de Matricula</h3></div><br>

      <div class="descricao">  
        <label>Nome Completo:____________________________________________________</label><br><br>
        <label>Área de Conhecimento:______________________________________________</label>
      </div><br>

      <div>
        <p>Obs: Conservar este recibo até ao ínicio das aulas</p>
        <div align="right">
          <label>Funcionário:______________________</label>
        </div>
      </div><br>

    </div>
  </body>
  <script>
  function funcao_pdf() {
    var select_dados = document.getElementById('info').innerHTML;

    var janela = window.open('','','width=300,heigth=400');
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
