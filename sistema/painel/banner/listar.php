<?php 
require_once("../../conexao.php");
$tabela = 'banner';

$query = $pdo->query("SELECT * FROM $tabela order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Título</th>	
	<th class="esc">Subtítulo</th> 		
	<th class="esc">Imagem</th>		
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
		$id = $res[$i]['id'];
		$titulo = $res[$i]['titulo'];		
		$subtitulo = $res[$i]['subtitulo'];		
		$imagem = $res[$i]['imagem'];
	
		$subtituloF = mb_strimwidth($subtitulo, 0, 80, "...");	

		
echo <<<HTML
<tr>
<td>{$titulo}</td>
<td class="esc">{$subtituloF}</td>
<td class="esc"><img src="../img/banners/{$imagem}" width="30px"></td>
<td>
	<big><a href="#" onclick="editar('{$id}','{$titulo}', '{$subtitulo}', '{$imagem}')" title="Editar Dados"><i class="bi bi-pencil-square text-primary"></i></a></big>

	<big><a href="#" onclick="excluir('{$id}','{$titulo}')" title="Excluir Registro"><i class="bi bi-trash text-danger"></i></a></big>



</td>
</tr>
HTML;

}

echo <<<HTML
	</tbody>
	<small><div align="center" id="mensagem-excluir"></div></small>
	</table>
	</small>
HTML;


}else{
	echo 'Não possui registros cadastrados!';
}


 ?>





<script type="text/javascript">
	function editar(id, titulo, subtitulo, foto){
		$('#id').val(id);
		$('#titulo').val(titulo);
		$('#subtitulo').val(subtitulo);	
		
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');
		$('#foto').val('');
		$('#target').attr('src','../img/banners/' + foto);
	}

		function excluir(id, titulo){
		$('#id-excluir').val(id);
		$('#titulo-excluir').text(titulo);				
		
		$('#modalExcluir').modal('show');		
	}



	function limparCampos(){
		$('#id').val('');
		$('#subtitulo').val('');
		$('#titulo').val('');		
		$('#foto').val('');
		$('#target').attr('src','../img/banners/sem-foto.jpg');
	}

</script>