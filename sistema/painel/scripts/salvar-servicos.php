<?php 
require_once("../../conexao.php");
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

$pdo->query("UPDATE config SET titulo_servicos = '$titulo', subtitulo_servicos = '$subtitulo'");

echo 'Salvo com Sucesso';

 ?>