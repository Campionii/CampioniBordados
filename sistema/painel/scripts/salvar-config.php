<?php
require_once("../../conexao.php");
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$endereco = $_POST['endereco'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$linkedin = $_POST['linkedin'];
$youtube = $_POST['youtube'];
$twitter = $_POST['twitter'];
$cor = $_POST['cor'];
$titulo_contato = $_POST['titulo_contato'];
$subtitulo_contato = $_POST['subtitulo_contato'];
$texto_rodape = $_POST['texto_rodape'];
//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = 'logo.png';
$caminho = '../../img/' . $nome_img;
$imagem_temp = @$_FILES['logo']['tmp_name'];
if (@$_FILES['logo']['name'] != "") {
    $ext = pathinfo($nome_img, PATHINFO_EXTENSION);
    if ($ext == 'png') {
        move_uploaded_file($imagem_temp, $caminho);
    } else {
        echo 'Extensão de Imagem não permitida, insira apenas

imagem png!';

        exit();
    }
}
//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = 'icone.png';
$caminho = '../../img/' . $nome_img;
$imagem_temp = @$_FILES['icone']['tmp_name'];
if (@$_FILES['icone']['name'] != "") {
    $ext = pathinfo($nome_img, PATHINFO_EXTENSION);
    if ($ext == 'png') {
        move_uploaded_file($imagem_temp, $caminho);
    } else {

        echo 'Extensão de Imagem não permitida, insira apenas

imagem png!';

        exit();
    }
}
$pdo->query("UPDATE config SET nome = '$nome', email = '$email', senha
= '$senha', telefone = '$telefone', endereco = '$endereco', facebook =
'$facebook', twitter = '$twitter', linkedin = '$linkedin', youtube =
'$youtube', instagram = '$instagram', cor = '$cor', titulo_contato =
'$titulo_contato', subtitulo_contato = '$subtitulo_contato',
texto_rodape = '$texto_rodape' ");
echo 'Salvo com Sucesso';

?>