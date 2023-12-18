<?php
include("conexao.php");

$id = $_GET['id'];

if(mysqli_query($conexao,"DELETE FROM usuario WHERE id_usuario='$id'")){
	
	header('Location:../paginas/area_usuarios_def.php?sms=sucesso');
}

else{
	header("location:../paginas/area_usuarios_def.php?sms2=falha");
}

?>