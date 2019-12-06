<?php
	//ini_set('display_errors', false);
	require_once('Controle/controlePonto.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Pontos</title>
		<meta charset="utf8" />
		<link rel="stylesheet" type="text/css" href="Estilo/novoestilo.css">
	</head>
	
	<body>
	<h1>
			Ponto Digital - Cadastro de ponto
		</h1>
		<div class="content">
		<form method="post">
			<p>
				<label>
					ID: <br />
					<input type="text" name="id" readonly="readonly" value="<?php echo $ponto->id ?>" />
				</label>
			</p>
			
			<p>
				<label>
					Data: <br />
					<input type="text" name="dataPonto" value="<?php echo $ponto->dataponto ?>" />
				</label>
			</p>
			
			<p>
				<label>
					Observação: <br />
					<input type="text" name="observacao" value="<?php echo $func->observacao ?>" />
				</label>
			</p>
			
			<p>
				<label>
					Funcionário: <br />
					<select name="id_funcionario">
						<?php
							foreach ($funcionarios as $funcionario) {
								echo "<option value='{$funcionario['id']}'>{$funcionario['nome']}</option>";
							}
						?>
					</select>
				</label>
			</p>
			
			<p>
				<label>
					Motivo: <br />
					<select name="id_motivo_ponto">
						<?php
							foreach ($motivoPontos as $motivo) {
								echo "<option value='{$motivo['id']}'>{$motivo['motivoponto']}</option>";
							}
						?>
					</select>
				</label>
			</p>
			
			<p>
				<button name="acao" class="button" value="cadastrar">Cadastrar</button>
				<button name="acao" class="button" value="alterar">Alterar</button>
				<button name="acao" class="button" value="excluir">Excluir</button>
				<button name="acao" class="button" value="listar">Listar</button>
				<button name="acao" class="button" value="voltar">Voltar</button>
			</p>
		</form>
		<div>
			<p>
				<?php
					if($pontos){
						echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Funcionário</th>
                            <th>Ponto</th>
                            <th>Data</th>
                            <th>Observação</th>
                            <th>Empresa</th>
                            <th>Setor</th>
                            <th>Ações</th>
                        </tr>
						";
						foreach ($pontos as $ponto) {
							echo "<tr>
                                    <td>{$ponto['id']}</td>
                                    <td>{$ponto['funcionario']}</td>
                                    <td>{$ponto['motivoponto']}</td>
                                    <td>{$ponto['dataponto']}</td>
                                    <td>{$ponto['obs']}</td>
                                    <td>{$ponto['empresa']}</td>
                                    <td>{$ponto['setor']}</td>
                                                <td>
										<form method='post'>
											<input type='hidden' name='id' value='{$ponto['id']}' />
											<button name='acao' value='carregar'>Carregar</button>
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
	</body>
</html>