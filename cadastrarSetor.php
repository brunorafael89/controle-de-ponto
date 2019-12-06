<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Setor</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="Estilo/novoestilo.css">
	</head>
	
	<body>
		<?php
			//ini_set('display_errors', false);
			require_once('Controle/controleSetor.php');
			session_start();
	
			if (!empty($_SESSION["ID"]))
			{		
			if ($_SESSION ["Setor"]!= "Gerência"){
				echo "<script type=\"text/javascript\">alert('Usuário sem permissão de acesso'); window.location.href='principal.php';</script>";			
			}
		}
		?>
		<h1>
			Ponto Digital - Cadastro de Setor
		</h1>
		<div class="content">
		<form method="post" style="width:1010px">
		<center>
			<p>
				<label>
					ID:
				</label>
					<input type="text" name="id" readonly="readonly" value="<?php echo $setores->id ?>" />
			</p>
			<p>
				<label>
					Setor:
				</label>
					<input type="text" name="nome" value="<?php echo $setores->nome ?>" />
			</p>
			</center>
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
					if($setor){
						echo "<table border=1 class='table'>
							<tr>
								<th>Matrícula</th>
								<th>Nome</th>
								<th>Ações</th>
							</tr>
						";
						foreach ($setor as $set) {
							echo "<tr>
									<td>{$set['id']}</td>
									<td>'{$set['nome']}'</td>
									<td style='width:100px';>
										<form method='post' style='width:110px'>
											<input type='hidden'  name='id' value='{$set['id']}' />
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