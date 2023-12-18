<?php
include("conexao.php");
$id = $_POST['id_usuario'];
$nome =  $_POST['nome'];
$usuario = $_POST['usuario'];
$fk_sexo = $_POST['fk_sexo'];
$nivel = $_POST['nivel'];
$senha = $_POST['senha'];
$senha_recuperacao = $_POST['senha_recuperacao'];


if(mysqli_query($conexao,"UPDATE usuario SET nome='$nome', usuario='$usuario', fk_sexo='$fk_sexo', nivel='$nivel', senha=md5('$senha'), senha_recuperacao='$senha_recuperacao' WHERE id_usuario='$id'")) {

	header('Location:../paginas/area_usuarios_def.php?sms=sucesso');
}

else{
	header("location:../paginas/area_usuarios_def.php?sms2=falha");
}

?>