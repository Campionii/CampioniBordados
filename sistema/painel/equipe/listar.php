<?php 
require_once("../../conexao.php");
$tabela = 'equipe';

$query = $pdo->query("SELECT * FROM $tabela order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>	
	<th class="esc">Cargo</th>	
	<th class="esc">Imagem</th>			
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
		$id = $res[$i]['id'];
		$nome = $res[$i]['nome'];		
		$cargo = $res[$i]['cargo'];		
		$imagem = $res[$i]['imagem'];
	
			
echo <<<HTML
<tr>
<td>{$nome}</td>
<td class="esc">{$cargo}</td>
<td class="esc"><img src="../img/equipe/{$imagem}" width="30px"></td>

<td>
	<big><a href="#" onclick="editar('{$id}','{$nome}', '{$cargo}', '{$imagem}')" title="Editar Dados"><i class="bi bi-pencil-square text-primary"></i></a></big>

	<big><a href="#" onclick="excluir('{$id}','{$nome}')" title="Excluir Registro"><i class="bi bi-trash text-danger"></i></a></big>



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
	function editar(id, nome, cargo, foto){
		$('#id').val(id);
		$('#nome').val(nome);
		$('#cargo').val(cargo);
		
		
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');
		$('#foto').val('');
		$('#target').attr('src','../img/equipe/' + foto);
	}

		function excluir(id, titulo){
		$('#id-excluir').val(id);
		$('#titulo-excluir').text(titulo);				
		
		$('#modalExcluir').modal('show');		
	}



	function limparCampos(){
		$('#id').val('');
		
		$('#cargo').val('');
		$('#nome').val('');		
		$('#foto').val('');
		$('#target').attr('src','../img/equipe/sem-foto.jpg');
	}

</script>