<?php
	ini_set('display_errors', false);
	require_once('Controle/controleMotivo.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de motivo de ponto</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="Estilo/novoestilo.css">
	</head>
	
	<body>
		<h1>
			Ponto Digital - Cadastro de motivo de ponto
		</h1>
		<div class="content">
		<form method="post">
			<p>
				<label>
					ID: <br />
					<input type="text" name="id" readonly="readonly" value="<?php echo $motivo->id ?>" />
				</label>
			</p>
			<p>
				<label>
					Nome: <br />
					<input type="text" name="motivoponto" value="<?php echo $motivo->motivoponto ?>" />
				</label>
			</p>
			<p>
				<button name="acao" class="button" value="cadastrar">Cadastrar</button>
				<button name="acao" class="button" value="alterar">Alterar</button>
				<button name="acao" class="button" value="excluir">Excluir</button>
				<button name="acao" class="button" value="listar">Listar</button>
				<button name="acao" class="button" value="voltar">Voltar</button>
			</p>
			<div>
			<p>
				<?php
					if($motivos){
						echo "<table border=1 class='table'>
							<tr>
								<th>ID</th>
								<th>Motivo</th>
								
								<th>Ações</th>
							</tr>
						";
						foreach ($motivos as $motivo) {
							echo "<tr>
									<td>{$motivo['id']}</td>
									<td>'{$motivo['motivoponto']}'</td>
									
									<td style='width:100px';>
										<form method='post' style='width:110px'>
											<input type='hidden'  name='id' value='{$motivo['id']}' />
											<button name='acao' class='button' style='width:100px'; value='carregar'>Carregar</button>
										</form>
									</td>
								</tr>";
						}
						echo "</table>";
					}
				?>
			</p>
		</div>
		</div>
		</form>
	</body>
</html>