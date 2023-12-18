<?php
include("conexao.php");

$id = $_GET['id'];

if(mysqli_query($conexao,"DELETE FROM curso WHERE id_curso='$id'")){
	
	header('Location:../paginas/area_cursos.php?sms=sucesso');
}

else{
	header("location:../paginas/area_cursos.php?sms2=falha");
}


?>