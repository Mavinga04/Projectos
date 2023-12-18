<?php
include('conexao.php');

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$fk_sexo = $_POST['fk_sexo'];
$senha_recuperacao = $_POST['senha_recuperacao'];
$nivel = $_POST['nivel'];
$senha = $_POST['senha'];

$adicionar_usuario = mysqli_query($conexao, "INSERT INTO usuario( nome, usuario , fk_sexo, senha_recuperacao, nivel , senha) Values ('$nome', '$usuario', '$fk_sexo', '$senha_recuperacao','$nivel', md5('$senha'))");

if ($adicionar_usuario) {
	# code...	
	header('Location:../paginas/area_usuarios_def.php?sms=sucesso');
}

else{
	header("location:../paginas/add_usuario.php?sms2=falha");
}

?>
