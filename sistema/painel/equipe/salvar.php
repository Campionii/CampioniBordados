<?php 
require_once("../../conexao.php");
$tabela = 'equipe';
$id = $_POST['id'];
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];


$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){
	$foto = $res[0]['imagem'];
}else{
	$foto = "sem-foto.jpg";
}


//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/equipe/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.jpg"){
				@unlink('../../img/equipe/'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}

if($id == ""){
	$pdo->query("INSERT INTO $tabela SET nome = '$nome', cargo = '$cargo', imagem = '$foto'");
}else{
	$pdo->query("UPDATE $tabela SET nome = '$nome', cargo = '$cargo', imagem = '$foto' WHERE id = '$id'");
}



echo 'Salvo com Sucesso';

 ?>