<?php 
session_start();
include('conexao.php');


if (empty($_POST['senha_recuperacao'])){
	# code...
	header('Location:../paginas/rec_confir_conta.php');
	exit();
}

$senha_recuperacao = $_POST['senha_recuperacao'];

$verifica_dados = mysqli_query($conexao, "SELECT * FROM usuario Where senha_recuperacao ='$senha_recuperacao' ");

$row = mysqli_num_rows($verifica_dados);
if ($row == 1) {
	# code...
	$_SESSION['usuario'] = $senha_recuperacao;
	header('Location:../paginas/rec_ed_senha.php?sms=sucesso');
}

else{
	$_SESSION['nao_autenticado'] = true;
	header('Location:../paginas/rec_confir_conta.php?sms2=falha');
	exit();
}


?>
