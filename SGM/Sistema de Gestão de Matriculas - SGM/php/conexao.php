<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "gestor";

	//Conexão
	$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname) or die("Conexão não foi possivel");
?>