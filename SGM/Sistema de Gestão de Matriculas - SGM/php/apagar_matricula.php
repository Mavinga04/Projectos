<?php
include("conexao.php");

$id = $_GET['id'];

if(mysqli_query($conexao,"DELETE FROM matricula WHERE id_matricula='$id'")){
	
	header('Location:../paginas/lista_matricula.php?sms=sucesso');
}

else{
	header("location:../paginas/lista_matricula.php?sms2=falha");
}


?>