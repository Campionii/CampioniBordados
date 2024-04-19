<?php 

$usuario = 'root';
$senha = '';
$banco = 'projetos';
$servidor = 'localhost';

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao conectar com o Banco de Dados!';
	echo '<br>';
	echo $e;
}

//valores para as variaveis do sistema
$nome_sistema = 'CampioniBordados';
$email_sistema = 'admin@gmail.com';
$telefone_sistema = '(11)94019-4169';
$endereco_sistema = '';
$senha_sistema = '123';

$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg == 0){
	$pdo->query("INSERT INTO config SET nome = '$nome_sistema', email = '$email_sistema', senha = '$senha_sistema', telefone = '$telefone_sistema', endereco = '$endereco_sistema', logo = 'logo.png', icone = 'icone.png', cor = '#00c1c1', titulo_contato = 'Contate-nos', subtitulo_contato = 'Preencha os Campos abaixo para entrar em contato conosco!'");
}else{
$nome_sistema = $res[0]['nome'];
$email_sistema = $res[0]['email'];
$telefone_sistema = $res[0]['telefone'];
$endereco_sistema = $res[0]['endereco'];
$senha_sistema = $res[0]['senha'];
$facebook_sistema = $res[0]['facebook'];
$twitter_sistema = $res[0]['twitter'];
$youtube_sistema = $res[0]['youtube'];
$linkedin_sistema = $res[0]['linkedin'];
$instagram_sistema = $res[0]['instagram'];
$cor_sistema = $res[0]['cor'];

$titulo_servicos = $res[0]['titulo_servicos'];
$subtitulo_servicos = $res[0]['subtitulo_servicos'];
$titulo_trabalhos = $res[0]['titulo_trabalhos'];
$subtitulo_trabalhos = $res[0]['subtitulo_trabalhos'];
$titulo_equipe = $res[0]['titulo_equipe'];
$subtitulo_equipe = $res[0]['subtitulo_equipe'];
$titulo_contato = $res[0]['titulo_contato'];
$subtitulo_contato = $res[0]['subtitulo_contato'];
$texto_rodape = $res[0]['texto_rodape'];

$whatsapp_sistema = '55'.preg_replace('/[ ()-]+/' , '' , $telefone_sistema);
}

$query = $pdo->query("SELECT * FROM sobre");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg == 0){
	$pdo->query("INSERT INTO sobre SET titulo = 'Sobre', subtitulo = 'Subtitulo caso Exista', descricao = 'Descrição da página Sobre', imagem = 'sem-foto.jpg', exibir = 'Imagem'");
}else{
$titulo_sobre = $res[0]['titulo'];
$subtitulo_sobre = $res[0]['subtitulo'];
$descricao_sobre = $res[0]['descricao'];
$imagem_sobre = $res[0]['imagem'];
$exibir_sobre = $res[0]['exibir'];
$video_sobre = $res[0]['video'];
}
 ?>
