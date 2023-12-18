<?php
include("conexao.php");

if (isset($_POST['editar'])) {

	$id = $_POST['id'];
	$classe =  $_POST['classe'];

	if(mysqli_query($conexao,"UPDATE classe set classe='$classe' where id_classe='$id'")) {
		
		header('Location:../paginas/area_classes.php?sms=sucesso');
	}

	else{
		header("location:../paginas/area_classes.php?sms2=falha");
	}
}
?>