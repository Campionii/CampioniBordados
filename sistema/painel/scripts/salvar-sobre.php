<?php 
require_once("../../conexao.php");
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$video = $_POST['video'];
$descricao = $_POST['descricao'];
$exibir = $_POST['exibir'];



$query = $pdo->query("SELECT * FROM sobre");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){
	$foto = $res[0]['imagem'];
}else{
	$foto = "sem-foto.jpg";
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.jpg"){
				@unlink('../../img/'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}


$pdo->query("UPDATE sobre SET titulo = '$titulo', subtitulo = '$subtitulo', descricao = '$descricao', imagem = '$foto', video = '$video', exibir = '$exibir'");

echo 'Salvo com Sucesso';

 ?>