 <?php
include 'conexao.php';


if (isset($_POST['editar'])) {
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$data = $_POST['data'];
	$bi = $_POST['bi'];
	$fk_provincia = $_POST['fk_provincia'];
	$fk_sexo = $_POST['fk_sexo'];		
	$pai = $_POST['pai'];
	$mae = $_POST['mae'];
	$encarregado = $_POST['encarregado'];	
	$contacto = $_POST['contacto'];
	$outro = $_POST['outro'];		
	$morada = $_POST['morada'];	
	$fk_classe = $_POST['fk_classe'];
	$fk_repitent = $_POST['fk_repitent'];
	$fk_curso = isset($_POST['fk_curso'])?$_POST['fk_curso']:1;
	$fk_turno = $_POST['fk_turno'];
	$id_encarregado = $_POST['id_encarregado'];
	$id_morada = $_POST['id_morada'];
	$id_contacto = $_POST['id_contacto'];

	$editar = mysqli_query($conexao, " UPDATE matricula SET nome = '$nome', data = '$data', bi = '$bi', fk_provincia = '$fk_provincia', fk_sexo = '$fk_sexo', fk_classe = '$fk_classe', fk_repitent='$fk_repitent', fk_curso = '$fk_curso', fk_turno = '$fk_turno' WHERE id_matricula = $id ");
	if ($editar){
		$editar = mysqli_query($conexao, " UPDATE encarregado SET pai = '$pai', mae = '$mae', encarregado = '$encarregado' WHERE id_encarregado = $id_encarregado ");
		if ($editar){
			$sql_morada = mysqli_query($conexao, " UPDATE morada SET morada = '$morada' WHERE id_morada = '$id_morada' ");
			$sql_contacto = mysqli_query($conexao, " UPDATE contacto SET contacto = '$contacto', outro = '$outro' WHERE id_contacto = '$id_contacto' ");
			if ($sql_morada && $sql_contacto){
				
				header('Location:../paginas/lista_matricula.php?sms=sucesso');

			}else {
				echo "nao";
			}
		}else {
			echo "nao";
		}
	}else {
		echo "nao";
	}
}
