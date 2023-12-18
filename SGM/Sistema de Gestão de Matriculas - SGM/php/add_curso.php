<?php
include('conexao.php');

$curso = $_POST['curso'];

$adicionar_curso = mysqli_query($conexao, " INSERT INTO curso(curso) Values ('$curso')");

if ($adicionar_curso) {
	# code...	
	header('Location:../paginas/area_cursos.php?sms=sucesso');
}

else{
	header("location:../paginas/area_cursos.php?sms2=falha");
}

?>