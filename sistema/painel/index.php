<?php
@session_start();
require_once('../conexao.php');
if(@$_SESSION['nome'] == ""){    
    echo '<script>window.location="../index.php"</script>';
    exit();
}

require_once("cabecalho.php");
?>

 <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 <script type="text/javascript" src="DataTables/datatables.min.js"></script>

<form id="form-config">
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome Site</label>
            <input name="nome" type="text" class="form-control" placeholder="Nome do Site" value="<?php echo $nome_sistema ?>" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email Site</label>
            <input name="email" type="email" class="form-control" placeholder="Email do Site" value="<?php echo $email_sistema ?>" required>
        </div>
    </div>

    <div class="col-md-2 col-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Senha Site</label>
            <input name="senha" type="password" class="form-control" placeholder="Senha do Site" value="<?php echo $senha_sistema ?>" required>
        </div>
    </div>

    <div class="col-md-2 col-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Telefone Site</label>
            <input name="telefone" id="telefone" type="text" class="form-control" placeholder="Telefone do Site" value="<?php echo $telefone_sistema ?>">
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Endereço</label>
            <input name="endereco" type="text" class="form-control" placeholder="Endereço se Houver" value="<?php echo $endereco_sistema ?>">
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Instagram</label>
            <input name="instagram" type="text" class="form-control" placeholder="Instagram se Houver" value="<?php echo $instagram_sistema ?>">
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Twitter</label>
            <input name="twitter" type="text" class="form-control" placeholder="Twitter se Houver" value="<?php echo $twitter_sistema ?>">
        </div>
    </div>


</div>




<div class="row">
    <div class="col-md-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Facebook</label>
            <input name="facebook" type="text" class="form-control" placeholder="Facebook se Houver" value="<?php echo $facebook_sistema ?>">
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Linkedin</label>
            <input name="linkedin" type="text" class="form-control" placeholder="Linkedin se Houver" value="<?php echo $linkedin_sistema ?>">
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Youtube</label>
            <input name="youtube" type="text" class="form-control" placeholder="Youtube se Houver" value="<?php echo $youtube_sistema ?>">
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cor Template Hexadecimal</label>
            <input name="cor" type="text" class="form-control" placeholder="#00c1c1" value="<?php echo $cor_sistema ?>">
        </div>
    </div>


</div>


<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Texto Rodapé Site</label>
            <input name="texto_rodape" type="text" class="form-control" placeholder="Texto do Rodapé se Houver" value="<?php echo $texto_rodape ?>">
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Título Contato</label>
            <input name="titulo_contato" type="text" class="form-control" placeholder="Título da área de Contato" value="<?php echo $titulo_contato ?>">
        </div>
    </div>

    <div class="col-md-8">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subtítulo Contato</label>
            <input name="subtitulo_contato" type="text" class="form-control" placeholder="Texto Subtítulo contato se Houver" value="<?php echo $subtitulo_contato ?>">
        </div>
    </div>
</div>




<div class="row">
   
    <div class="col-md-4 col-8">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Logo (*png)</label>
            <input id="logo" name="logo" type="file" class="form-control" onchange="alterarImg('target-logo', 'logo')">            
        </div>
    </div>
    <div class="col-md-2 col-4">
        <div><img id="target-logo" src="../img/logo.png" width="110px" style="margin-top: 15px"></div>
    </div>

    <div class="col-md-4 col-8">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ícone (*png)</label>
            <input id="icone" name="icone" type="file" class="form-control" onchange="alterarImg('target-icone', 'icone')">            
        </div>
    </div>
    <div class="col-md-2 col-4">
        <div><img id="target-icone" src="../img/icone.png" width="50px" style="margin-top: 25px"></div>
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
    var formData = new FormData(this);

    $.ajax({
        url: "scripts/salvar-config.php",
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