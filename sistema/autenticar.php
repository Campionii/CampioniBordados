<?php
@session_start();
require_once("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($email == $email_sistema and $senha == $senha_sistema) {
    $_SESSION['nome'] = $nome_sistema;
    echo '<script>window.location="painel"</script>';
} else {
    echo '<script>alert("Dados Incorretos")</script>';
    echo '<script>window.location="index.php"</script>';
}
