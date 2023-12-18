<?php
include('conexao.php');

$turno = $_POST['turno'];

$adicionar_turno = mysqli_query($conexao, " INSERT INTO turno(turno) Values ('$turno')");

if ($adicionar_turno) {
	# code...	
	header('Location:../paginas/area_turnos.php?sms=sucesso');
}

else{
	header("location:../paginas/area_turnos.php?sms2=falha");
}

?>