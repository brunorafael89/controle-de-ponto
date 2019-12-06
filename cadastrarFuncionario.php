<?php
	ini_set('display_errors', false);
	require_once('Controle/controleFuncionario.php');
	session_start();
	
	if (!empty($_SESSION["ID"]))
	{		
	   if ($_SESSION ["Setor"]!= "Gerência"){
			echo "<script type=\"text/javascript\">alert('Usuário sem permissão de acesso'); window.location.href='principal.php';</script>";			
	   }
	}
	
?>
<!DOCTYPE html>
<html>
<head>
		<title>
			Ponto Digital
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
		<meta name="robots" content="index, nofollow" />
		<link rel="stylesheet" type="text/css" href="Estilo/novoestilo.css">
		
	</head>
	<body>
		<h1>
			Ponto Digital - Cadastro de funcionários
		</h1>
		<div class="content">
		<form method="post" style="width:1010px">
		<div class="content-column-left">
			<p>
				<label>
					ID:
					</label>
					<input type="text" name="id" readonly="readonly" value="<?php echo $func->id ?>" />
				
			</p>
			
			<p>
				<label>
					Nome:</label>
					<input type="text" name="nome" value="<?php echo $func->nome ?>" />
				
			</p>
			
			<p>
				<label>
					CPF: </label>
					<input type="text" name="cpf" value="<?php echo $func->cpf ?>" />
				
			</p>
			</div>
			<p>
				<label>
					Email: </label>
					<input type="text" name="email" value="<?php echo $func->email ?>" />
				
			</p>

			<p>
				<label>
					Senha:</label>
					<input type="password" name="senha" value="<?php echo $func->senha ?>" />
				
			</p>

			<p>
				<label>
					Empresa: </label>
					<select name="empresa">
						<?php
							foreach ($empresas as $empresa) {
								echo "<option value='{$empresa['id']}'>{$empresa['fantasia']}</option>";
							}
						?>
					</select>
				
			</p>
			
			<p>
				<label>
					Setor: </label>
					<select name="setor">
						<?php
							foreach ($setores as $setor) {
								echo "<option value='{$setor['id']}'>{$setor['nome']}</option>";
							}
						?>
					</select>
				
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
					if($funcionarios){
						echo "<table border=1 class='table'>
							<tr>
								<th>Matrícula</th>
								<th>Nome</th>
								<th>CPF</th>
								<th>Email</th>
								<th>Senha</th>
								<th>Empresa</th>
								<th>Setor</th>
								<th>Ações</th>
							</tr>
						";
						foreach ($funcionarios as $func) {
							echo "<tr>
									<td>{$func['id']}</td>
									<td>{$func['nome']}</td>
									<td>{$func['cpf']}</td>
									<td>{$func['email']}</td>
									<td>{$func['senha']}</td>
									<td>{$func['empresa']}</td>
									<td>{$func['setor']}</td>
									<td style='width:100px';>
										<form method='post' style='width:110px'>
											<input type='hidden'  name='id' value='{$func['id']}' />
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
		<div class="content"></div>
	</body>
</html>