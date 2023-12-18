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
    <title>classes</title>

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
      i:hover{transform: scale(1.1);transition: 0.5s;}   .form{position:absolute;left:20px;width: 40%;border-radius:10px;}
      .form-control{margin-bottom: 5px;}
      .tabla{position: absolute;right:20px;width:33%;border-radius:10px;font-family:'Open Sans',sans-serif;}
       #descer{overflow: scroll;height: 500px;}
      .btn{margin-bottom: 5px;} 
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">
        <i class=" user fas fa-user-tie"></i> - <?php echo $_SESSION['usuario']; ?>
      </h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="home.php">Home</a>
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
                <p><span class="text-primary">Do lado esquerdo:</span><br> Encontra-se o formulário para adicionar novas classes no sistema.</p>
                <p><span class="text-primary">Do lado direito:</span><br> Temos as classes já adicionadas no sistema.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
              </div>
            </div>
          </div>
        </div> 
        
      </nav>
    </div>

   <!--form-->
    <div class="form p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">            
      <form action="../php/add_classe.php" method="post" autocomplete="off">
        <label>Adicionar classe:</label>            
        <input type="text" name="classe" class="form-control" placeholder="Digite novo classe" required>

        <a class="btn btn-primary" data-toggle="modal" data-target="#modalsalvar">Salvar</a>

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
                Adicionar nova classe?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                <input type="submit" name="editar" class="btn btn-primary" value="Sim">
              </div>
            </div>
          </div>
        </div><!--Fim Modal--->

      </form><hr>
    </div>

    <!--classe-->
    <div class="tabla p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">
      <div  id="descer">
        <legend>Todos as Classes</legend>      
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <!--<th>classe</th>
                <th>Remove</th>-->             
              </thead>
                <?php
                  $lista_classe = mysqli_query($conexao,"SELECT * FROM classe");
                  $total = mysqli_num_rows($lista_classe);                 
                  while($resultado = mysqli_fetch_array($lista_classe)){
                  $classe = $resultado['classe'];
                ?>
              <tbody>
                <tr>  
                  <td><span class="text-center"><?php echo $classe?></span></td>
                  <td>                                    
                    <?php echo "<a href='inscrito_classe.php?&id=".$resultado['id_classe']."'class='btn btn-success'>Inscrições</a>";?>
                    <?php echo "<a href='ed_classe.php?&id=".$resultado['id_classe']."'class='btn btn-primary'>Editar</a>";?> 

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $resultado['id_classe']?>">Eliminar</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $resultado['id_classe']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Notificação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Tens certeza que desejas eliminar esta Classe?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                            <?php echo "<a href='../php/apagar_classe.php?&id=".$resultado['id_classe']."'class='btn btn-primary'>Sim</a>";?>
                          </div>
                        </div>
                      </div>
                    </div><!--Fim Modal--->

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
