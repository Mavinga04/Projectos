<?php
include 'conexao.php';

if (isset($_POST['Matricular'])) {
	if (isset($_FILES['foto'])){
		$f_e = strtolower(substr($_FILES['foto']['name'], -4));
		$f_n = md5(time()).$f_e;
		$pasta = '../imagens/fotos/';
		move_uploaded_file($_FILES['foto']['tmp_name'], $pasta.$f_n);

		$c_e = strtolower(substr($_FILES['cert']['name'], -4));
		$c_n = md5(time()).$c_e;
		$pasta = '../imagens/certificados/';
		move_uploaded_file($_FILES['cert']['tmp_name'], $pasta.$f_n);

		$sql = mysqli_query($conexao,"INSERT INTO fotos(foto) VALUES ('$f_n')");
		$sql = mysqli_query($conexao,"INSERT INTO cert(cert) VALUES ('$c_n')");
	
		$s_f = mysqli_query($conexao,"SELECT * FROM fotos ORDER BY id_foto DESC LIMIT 1");
		$s_c = mysqli_query($conexao,"SELECT * FROM cert ORDER BY id_cert DESC LIMIT 1");
	
		$b_f = mysqli_fetch_array($s_f);
		$b_c = mysqli_fetch_array($s_c);
	
		$id_foto = $b_f['id_foto'];
		$id_cert = $b_c['id_cert'];
	}
		
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


		$sql = mysqli_query($conexao,"INSERT INTO morada(morada) VALUES ('$morada')");
		$sql = mysqli_query($conexao,"INSERT INTO contacto(contacto, outro) VALUES ('$contacto', '$outro')");
		$sql = mysqli_query($conexao,"INSERT INTO encarregado(pai, mae, encarregado) VALUES ('$pai', '$mae', '$encarregado')");

		if ($sql) {
			$select1 = mysqli_query($conexao,"SELECT * FROM morada ORDER BY id_morada DESC LIMIT 1");
			$pegar1 = mysqli_fetch_array($select1);

			$select2 = mysqli_query($conexao,"SELECT * FROM contacto ORDER BY id_contacto DESC LIMIT 1");
			$pegar2 = mysqli_fetch_array($select2);

			$select3 = mysqli_query($conexao,"SELECT * FROM encarregado ORDER BY id_encarregado DESC LIMIT 1");
			$pegar3 = mysqli_fetch_array($select3);

			$sql = mysqli_query($conexao,"INSERT INTO matricula(nome, data, bi , fk_foto, fk_cert, fk_provincia, fk_sexo, fk_encarregado, fk_contacto, fk_morada, fk_classe, fk_repitent, fk_curso, fk_turno, criado) VALUES ('$nome', '$data', '$bi', '$id_foto', '$id_cert', '$fk_provincia', '$fk_sexo', '".$pegar3['id_encarregado']."', '".$pegar2['id_contacto']."', '".$pegar1['id_morada']."', '$fk_classe', '$fk_repitent','$fk_curso', '$fk_turno', NOW())");

			if ($sql) {
		
				header('Location:../recibos/comprovativo.php?sms=sucesso');
			}else{
				header('Location:../paginas/add_matricula.php?sms=falha');
			}

		}else{
			echo "Falha ao salvar nas outras tabelas";
		}
	}
?>
