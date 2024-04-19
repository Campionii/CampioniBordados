$(document).ready(function() {    
    listar();    
} );


function listar(){	
    $.ajax({
        url: pag + "/listar.php",
        method: 'POST',
        data: $('#form').serialize(),
        dataType: "html",

        success:function(result){
            $("#listar").html(result);
            $('#mensagem-excluir').text('');
        }
    });
}



function inserir(){
    $('#mensagem').text('');
    $('#titulo_inserir').text('Inserir Registro');
    $('#modalForm').modal('show');
    limparCampos();
}




$("#form").submit(function () {

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





$("#form-excluir").submit(function () {
 
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: pag + "/excluir.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {         

            if (mensagem.trim() == "Excluído com Sucesso") {  
            $('#btn-fechar-excluir').click();              
                listar();                
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }

        },

        cache: false,
        contentType: false,
        processData: false,

    
    });

});



function alterarImg(img, input){
		var target = document.getElementById(img);
		var file = document.querySelector('#'+input).files[0];

		var reader = new FileReader();

		reader.onloadend = function () {
			target.src = reader.result;
		};

		if (file) {
			reader.readAsDataURL(file);

		} else {
			target.src = "";
		}
	}

