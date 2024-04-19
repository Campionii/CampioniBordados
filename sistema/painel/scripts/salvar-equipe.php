<?php 
require_once("../../conexao.php");
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

$pdo->query("UPDATE config SET titulo_equipe = '$titulo', subtitulo_equipe = '$subtitulo'");

echo 'Salvo com Sucesso';

 ?>