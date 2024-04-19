<?php 
@session_start();
require_once('../conexao.php');
if(@$_SESSION['nome'] == ""){	
	echo '<script>window.location="../index.php"</script>';
	exit();
}

require_once("cabecalho.php");
?>

<form id="form-config">
<div class="row">
	<div class="col-md-4">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Título</label>
			<input name="titulo" type="text" class="form-control" placeholder="Título Sobre" value="<?php echo $titulo_sobre ?>" required>
		</div>
	</div>

	<div class="col-md-8">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Subtítulo</label>
			<input name="subtitulo" type="text" class="form-control" placeholder="Subtítulo se Houver" value="<?php echo $subtitulo_sobre ?>">
		</div>
	</div>


</div>


<div class="row">
<div class="col-md-12">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Descrição</label>
			<textarea class="form-control" name="descricao" id="area"><?php echo $descricao_sobre ?></textarea>
		</div>
	</div>
</div>



<div class="row">
	
	<div class="col-md-4 col-8">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Imagem</label>
			<input id="foto" name="foto" type="file" class="form-control" onchange="alterarImg('target', 'foto')">			
		</div>
	</div>
	<div class="col-md-2 col-4">
		<div><img id="target" src="../img/<?php echo $imagem_sobre ?>" width="110px" style="margin-top: 15px"></div>
	</div>

	<div class="col-md-4">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Vídeo</label>
			<input name="video" type="text" class="form-control" placeholder="Url Incorporada do Vídeo" value="<?php echo $video_sobre ?>">
		</div>
	</div>

	<div class="col-md-2">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Imagem / Vídeo</label>
			<select name="exibir" class="form-select">
				<option value="Imagem" <?php if($exibir_sobre == 'Imagem'){ ?> selected <?php } ?> >Imagem</option>
				<option value="Vídeo" <?php if($exibir_sobre == 'Vídeo'){ ?> selected <?php } ?>>Vídeo</option>
			</select>
		</div>
	</div>


</div>


<div align="right">
 <button class="btn btn-primary" type="submit">Salvar</button>
</div>

<small><div id="mensagem" align="center"></div></small>

</form>

<br><br>
</div>


<script type="text/javascript">
	

$("#form-config").submit(function () {
	$('#mensagem').text('...Carregando!')

    event.preventDefault();
    nicEditors.findEditor('area').saveContent();
    var formData = new FormData(this);

    $.ajax({
        url: "scripts/salvar-sobre.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {                        
            	location.reload();
            	$('#mensagem').addClass('text-success')
            	$('#mensagem').text(mensagem)
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