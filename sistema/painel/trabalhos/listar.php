<?php 
require_once("../../conexao.php");
$tabela = 'trabalhos';

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
	<th class="esc">Vídeo</th>
	<th class="esc">Exibir</th>
	<th class="esc">Link</th>	
	<th class="esc">Imagem</th>			
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
		$id = $res[$i]['id'];
		$titulo = $res[$i]['titulo'];		
		$descricao = $res[$i]['descricao'];		
		$imagem = $res[$i]['imagem'];
		$video = $res[$i]['video'];
		$exibir = $res[$i]['exibir'];
		$link = $res[$i]['link'];
	
		$descricaoF = mb_strimwidth($descricao, 0, 80, "...");	
		$linkF = mb_strimwidth($link, 0, 50, "...");

		//retirar caracter
		$descricao = str_replace(array('"'), ' ** ', $descricao);	

		
echo <<<HTML
<tr>
<td>{$titulo}</td>
<td class="esc">{$video}</td>
<td class="esc">{$exibir}</td>
<td class="esc"><a href="{$link}" target="_blank">{$linkF}</a></td>
<td class="esc"><img src="../img/trabalhos/{$imagem}" width="30px"></td>

<td>
	<big><a href="#" onclick="editar('{$id}','{$titulo}', '{$descricao}', '{$imagem}', '{$video}', '{$exibir}', '{$link}')" title="Editar Dados"><i class="bi bi-pencil-square text-primary"></i></a></big>

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
	function editar(id, titulo, descricao, foto, video, exibir, link){

		for (let letra of descricao){  				
					if (letra === '*'){
						descricao = descricao.replace(' ** ', '"')
					}			
				}
				
		$('#id').val(id);
		$('#titulo').val(titulo);
		nicEditors.findEditor("area").setContent(descricao);
		$('#video').val(video);	
		$('#exibir').val(exibir).change();	
		$('#link').val(link);	
		
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');
		$('#foto').val('');
		$('#target').attr('src','../img/trabalhos/' + foto);
	}

		function excluir(id, titulo){
		$('#id-excluir').val(id);
		$('#titulo-excluir').text(titulo);				
		
		$('#modalExcluir').modal('show');		
	}



	function limparCampos(){
		$('#id').val('');
		nicEditors.findEditor("area").setContent('');
		$('#video').val('');
		$('#exibir').val('Imagem').change();		
		$('#titulo').val('');		
		$('#foto').val('');
		$('#link').val('');
		$('#target').attr('src','../img/trabalhos/sem-foto.jpg');
	}

</script>