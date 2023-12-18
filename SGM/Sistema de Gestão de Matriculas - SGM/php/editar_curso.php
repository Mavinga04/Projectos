<?php
include("conexao.php");

$id = $_POST['id'];
$curso =  $_POST['curso'];

if(mysqli_query($conexao,"UPDATE curso set curso='$curso' where id_curso='$id'")) {
	header('Location:../paginas/area_cursos.php?sms=sucesso');
}

else{
	header("location:../paginas/area_cursos.php?sms2=falha");
}

?>