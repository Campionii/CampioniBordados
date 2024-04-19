<?php 
@session_start();
require_once('../conexao.php');
if(@$_SESSION['nome'] == ""){	
	echo '<script>window.location="../index.php"</script>';
	exit();
}

require_once("cabecalho.php");
$pag = 'banner';
?>

	
<a class="btn btn-secondary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri"><i class="bi bi-plus-lg"></i> Novo Banner</a>


<div class="bs-example widget-shadow" style="padding:15px" id="listar">
	
</div>


<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="titulo_inserir"></span></h5>
				<button id="btn-fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form">
			<div class="modal-body">
				
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Título</label>
						<input name="titulo" id="titulo" type="text" class="form-control" placeholder="Título do Banner se Houver">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Subtítulo</label>
						<input name="subtitulo" id="subtitulo" type="text" class="form-control" placeholder="Subtítulo se Houver">
					</div>

					<div class="row">

						<div class="col-md-8 col-8">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Imagem (Aprox 2000 x 900)</label>
								<input id="foto" name="foto" type="file" class="form-control" onchange="alterarImg('target', 'foto')">			
							</div>
						</div>
						<div class="col-md-4 col-4">
							<div><img id="target" src="../img/banners/sem-foto.jpg" width="110px" style="margin-top: 15px"></div>
						</div>
					</div>

					<input type="hidden" name="id" id="id">
					<small><div id="mensagem" align="center"></div></small>
				
			</div>
			<div class="modal-footer">        
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
			</form>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Excluir Registro</h5>
				<button id="btn-fechar-excluir" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir">
			<div class="modal-body">

				<p>Deseja realmente excluir o registro: <span id="titulo-excluir"></span></p>
				
					<input type="hidden" name="id" id="id-excluir">
					<small><div id="mensagem-excluir" align="center"></div></small>
				
			</div>
			<div class="modal-footer">        
				<button type="submit" class="btn btn-danger">Excluir</button>
			</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">var pag = "<?=$pag?>"</script>
<script src="js/ajax.js"></script>

  
<script type="text/javascript">
	$(document).ready( function () {
    $('#tabela').DataTable({
    		"ordering": false,
			"stateSave": true
    	});
   
} );
</script>