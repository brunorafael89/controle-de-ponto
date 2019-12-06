<?php
	ini_set('display_errors', false);	
	session_start();
	if (empty($_SESSION["ID"]))
	{
		header('Location: '.'index.php');
	}
	else
	{
		require_once("Classes/Setor.class.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
			Ponto Digital
		</h1>
		<div class="content">
			<div class="content-middle">
				<p>
					
				</p>
				<p>
					<?php 	
						setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
						date_default_timezone_set('America/Sao_Paulo');
						session_start();
						
						echo "Olá ".$_SESSION["Nome"]." hoje é ".strftime('%A, %d de %B de %Y', strtotime('today')); 
					?>
					<a href="index.php">Sair</a>
				</p>
			</div>
			<hr />
			<div class="content-columns">
				<div class="content-column-left">
					<h2>
						Controle de ponto digital
					</h2>
					<p>
						Utilize o menu ao lado para poder acessar seu ponto.					
					</p>
				</div>
				<div class="content-column-right">
					<form method="post">				
						<button name="acao" class="button" value="empresa"><a href="cadastrarEmpresa.php" style="color:white">Cadastro de empresa</a></button>
						<button name="acao" class="button" value="funcionario"><a href="cadastrarFuncionario.php" style="color:white">Cadastro de funcionário</a></button>
						<button name="acao" class="button" value="setor"><a href="cadastrarSetor.php" style="color:white">Cadastro de setor</a></button>
						<button name="acao" class="button" value="ponto"><a href="cadastrarPonto.php" style="color:white">Cadastro de ponto</a></button>
						<button name="acao" class="button" value="motivo"><a href="cadastrarMotivo.php" style="color:white">Cadastro de motivo</a></button>						
					</form>
				</div>
			</div>
		</div>
		<div class="content"></div>
	</body>
</html>
