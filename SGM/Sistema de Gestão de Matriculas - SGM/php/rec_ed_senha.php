<?php
include("conexao.php");
$id = $_POST['id_usuario'];
$senha =  $_POST['senha'];

if(mysqli_query($conexao,"UPDATE usuario SET senha=md5('$senha') WHERE id_usuario='$id'")) {

	header('Location:../paginas/login.php?sms=sucesso');
}

else{
	header("location:../paginas/rec_ed_senha.php?sms2=falha");
}

?>