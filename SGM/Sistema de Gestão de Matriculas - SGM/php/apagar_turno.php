<?php
include("conexao.php");

$id = $_GET['id'];

if(mysqli_query($conexao,"DELETE FROM turno WHERE id_turno='$id'")){
	
	header('Location:../paginas/area_turnos.php?sms=sucesso');
}

else{
	header("location:../paginas/area_turnos.php?sms2=falha");
}


?>