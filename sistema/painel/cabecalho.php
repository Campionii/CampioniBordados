<?php 
require_once("../conexao.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nome_sistema ?></title>
	<meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<link rel="shortcut icon" type="image/x-icon" href="../img/icone.png">


	<!-- jQery -->
	<script src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/mascaras.js"></script>
	<!-- Ajax para funcionar Mascaras JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 

	<script type="text/javascript" src="js/ajax.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">

 <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>


</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="../img/logo.png" width="80px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Configurações</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="banner.php">Banner</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="sobre.php">Sobre</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="servicos.php">Serviços</a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="trabalhos.php">Trabalhos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="equipe.php">Equipe</a>
        </li>

       <li class="nav-item">
          <a class="nav-link" href="logout.php">Sair</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>

 <div class="container" style="margin-top: 20px">