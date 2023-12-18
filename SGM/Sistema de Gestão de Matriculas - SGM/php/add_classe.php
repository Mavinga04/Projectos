<?php
include('conexao.php');

$classe = $_POST['classe'];

$adicionar_classe = mysqli_query($conexao, " INSERT INTO classe(classe) Values ('$classe')");

if ($adicionar_classe) {
	# code...	
	header('Location:../paginas/area_classes.php?sms=sucesso');
}

else{
	header("location:../paginas/area_classes.php?sms2=falha");
}

?>