<?php
include("conexao.php");

$id = $_GET['id'];

if(mysqli_query($conexao,"DELETE FROM classe WHERE id_classe='$id'")){
	
	header('Location:../paginas/area_classes.php?sms=sucesso');
}

else{
	header("location:../paginas/area_classes.php?sms2=falha");
}


?>