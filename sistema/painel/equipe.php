<?php 
@session_start();
require_once('../conexao.php');
if(@$_SESSION['nome'] == ""){	
	echo '<script>window.location="../index.php"</script>';
	exit();
}

require_once("cabecalho.php");
$pag = 'equipe';
?>


<form id="form-config">
	<div class="row">
		<div class="col-md-3">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Título</label>
				<input name="titulo" type="text" class="form-control" placeholder="Título Equipe" value="<?php echo $titulo_equipe ?>" required>
			</div>
		</div>

		<div class="col-md-7 col-9">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Subtítulo</label>
				<input name="subtitulo" type="text" class="form-control" placeholder="Subtítulo se Houver" value="<?php echo $subtitulo_equipe ?>">
			</div>
		</div>

		<div class="col-md-2 col-3" style="margin-top: 30px">
			<button class="btn btn-primary" type="submit">Editar</button>
		</div>
	</div>
	<small><div id="mensagem-servicos" align="center"></div></small>
</form>

<hr>
<a class="btn btn-secondary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri"><i class="bi bi-plus-lg"></i> Novo Integrante</a>



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
			<form id="form-serv">
				<div class="modal-body">

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nome</label>
						<input name="nome" id="nome" type="text" class="form-control" placeholder="Nome Integrante Equipe" required>
					</div>

					<div class="row">
<div class="col-md-12">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Cargo</label>
						<input name="cargo" id="cargo" type="text" class="form-control" placeholder="Nome Integrante Equipe" required>
					</div>
				</div>
			</div>

					<div class="row">

						<div class="col-md-8 col-8">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Imagem Quadrada (500x500)</label>
								<input id="foto" name="foto" type="file" class="form-control" onchange="alterarImg('target', 'foto')">			
							</div>
						</div>
						<div class="col-md-4 col-4">
							<div><img id="target" src="../img/equipe/sem-foto.jpg" width="110px" style="margin-top: 15px"></div>
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

<script type="text/javascript">
	

	$("#form-config").submit(function () {
		$('#mensagem-servicos').text('...Carregando!')

		event.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			url: "scripts/salvar-equipe.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem-servicos').text('');
				$('#mensagem-servicos').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {                        
					location.reload();
					$('#mensagem-servicos').addClass('text-success')
					$('#mensagem-servicos').text(mensagem)
				} else {
					$('#mensagem-servicos').addClass('text-danger')
					$('#mensagem-servicos').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});


</script>




<script type="text/javascript">
	

	$("#form-serv").submit(function () {
		$('#mensagem').text('...Carregando!')

		event.preventDefault();		
		var formData = new FormData(this);

		$.ajax({
			url: pag + "/salvar.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem').text('');
				$('#mensagem').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {

					$('#btn-fechar').click();
					listar();          

				} else {

					$('#mensagem').addClass('text-danger')
					$('#mensagem').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});


</script>



<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>