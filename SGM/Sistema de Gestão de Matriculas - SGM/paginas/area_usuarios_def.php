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
    <title>atualizar conta</title>

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
      .Tabela{width: 80%;margin: auto;margin-top: 30px; border-radius: 10px;text-align: center;}
      
    </style>

  </head>
  <body>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Atualizar Conta</h5>
      
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="definicoes.php">Fechar</a>
      </nav>
    </div>

    <section class="Tabela p-3 px-md-4 mb-3 bg-white border-bottom shadow-lg p3 md-5 rounded">  
      <div align="left">
        <h5 class="my-0 mr-md-auto font-weight-normal">
          <i class="user fa fa-users"></i>
        </h5>
      </div>

      <div class="table-responsive" style="">
        <table class="table table-hover">
          <thead>
            <th>Nome</th>
            <th>Nome de Usuário</th>
            <th>Sexo</th>
            <th>Nivel de Acesso</th>
            <th>Senha de Recuperação</th>                          
            <th>Editar</th>
            <th>Remover</th>
          </thead>
          <?php
            $lista_usuario = mysqli_query($conexao,"SELECT * FROM usuario JOIN sexo ON usuario.fk_sexo = sexo.id_sexo");
            $total = mysqli_num_rows($lista_usuario);                            
            while($resultado = mysqli_fetch_array($lista_usuario)){
            $nome = $resultado['nome'];
            $usuario = $resultado['usuario'];         
            $sexo = $resultado['sexo'];         
            $nivel = $resultado['nivel'];
            $senha_recuperacao = $resultado['senha_recuperacao'];
          ?>
          <tbody>
            <tr>  
              <td><span class="cor"><?php echo $nome?></span></td>
              <td><span class="cor"><?php echo $usuario?></span></td>                  
              <td><span class="cor"><?php echo $sexo?></span></td>                  
              <td><span class="cor"><?php echo $nivel?></span></td>
              <td><span class="cor"><?php echo $senha_recuperacao?></span></td>

              <td><?php echo "<a href='ed_usuario.php?&id=".$resultado['id_usuario']."' class='btn btn-primary'>Editar</a>";?></td>

              <td>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $resultado['id_usuario']?>">Eliminar</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $resultado['id_usuario']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Notificação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="text-left modal-body">
                            Tens certeza que desejas eliminar esta conta?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                            <?php echo "<a href='../php/apagar_usuario.php?&id=".$resultado['id_usuario']."'class='btn btn-primary'>Sim</a>";?>
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
        <!--SMS PHP-->
      <div align="left">
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
    </section>

  </body>
   <!-- Jquery -->
  <script type="text/javascript" src="../assets/bootstrap/jquery.min.js"></script>
  <!-- bootstrap.min.Js -->
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script> 

</html>
