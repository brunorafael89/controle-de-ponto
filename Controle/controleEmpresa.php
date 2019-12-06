<?php
    require_once('Classes/Empresa.class.php');

    pg_connect("host=localhost port=5432 user=postgres password=cetsolucoes dbname=folhaponto");

    $empresas = new Empresa((int)$_POST['id'], $_POST['nome'], $_POST['fantasia']);
    if ($_POST['acao'] === 'cadastrar') {
		if ($empresas->cadastrarEmpresa()) {
			echo "<script type=\"text/javascript\">alert('Empresa cadastrada com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao cadastrar empresa!";
		}
	}
	
	if ($_POST['acao'] === 'alterar') {
		if ($empresas->alterarEmpresa()) {
			echo "<script type=\"text/javascript\">alert('Empresa alterada com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao alterar empresa!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'excluir') {
		if ($empresas->excluirEmpresa()) {
			echo "<script type=\"text/javascript\">alert('Empresa excluída com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao excluir empresa!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'listar') {
		$empresa = $empresas->listarEmpresa();				
	}
	if ($_POST['acao'] === 'voltar') {
		header('Location: '.'principal.php');
	}
?>