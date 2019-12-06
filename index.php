<?php
	ini_set('display_errors', false);
	require_once('Controle/controleFuncionario.php');
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
					<?php 	
						setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
						date_default_timezone_set('America/Sao_Paulo');
						echo strftime('%A, %d de %B de %Y', strtotime('today')); 
					?>
				</p>
			</div>
			<hr />
			<div class="content-columns">
				<div class="content-column-left">
					<h2>
						Controle de ponto digital
					</h2>
					<p>
						Faça seu login para que possa acessar nosso ponto digital e informar suas entradas e saídas					
					</p>
				</div>
				<div class="content-column-right">
					<form method="post">				
						<span> 
							<label>E-Mail</label>
						</span>
						<input type="textbox" name="email"/>
						<br />
						<br />
						<span> 
							<label>Senha</label>
						</span>
						<input type="password" name="senha"/>
						<br />
						<br />
						<button name="acao" class="button" value="login">Login</button>
					</form>
				</div>		
			</div>
		</div>
	</body>
</html>
