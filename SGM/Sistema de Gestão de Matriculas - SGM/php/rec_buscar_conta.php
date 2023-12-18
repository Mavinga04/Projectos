<?php 
session_start();
include('conexao.php');

if (empty($_POST['usuario'])){
	# code...
	header('Location:../paginas/buscar_conta.php');
	exit();
}

$usuario = $_POST['usuario'];

$verifica_dados = mysqli_query($conexao, "SELECT * FROM usuario Where usuario ='$usuario' ");

$row = mysqli_num_rows($verifica_dados);
if ($row == 1) {
	# code...
	$_SESSION['usuario'] = $usuario;
	header('Location:../paginas/rec_confir_conta.php?sms=sucesso');
}

else{
	$_SESSION['nao_autenticado'] = true;
	header('Location:../paginas/rec_buscar_conta.php?sms2=falha');
	exit();
}


?>
