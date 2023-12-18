<?php
include("conexao.php");

$id = $_POST['id'];
$turno =  $_POST['turno'];

if(mysqli_query($conexao,"UPDATE turno set turno='$turno' where id_turno='$id'")) {
	
	header('Location:../paginas/area_turnos.php?sms=sucesso');
}

else{
	header("location:../paginas/area_turnos.php?sms2=falha");
}

?>