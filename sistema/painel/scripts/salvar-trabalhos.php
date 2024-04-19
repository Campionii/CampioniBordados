<?php 
require_once("../../conexao.php");
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

$pdo->query("UPDATE config SET titulo_trabalhos = '$titulo', subtitulo_trabalhos = '$subtitulo'");

echo 'Salvo com Sucesso';

 ?>