<?php
    require_once('Classes/Setor.class.php');

    pg_connect("host=localhost port=5432 user=postgres password=cetsolucoes dbname=folhaponto");

    $setores = new Setor((int)$_POST['id'], $_POST['nome']);

    if ($_POST['acao'] === 'cadastrar') {
		if ($setores->cadastrarSetor()) {
			echo "<script type=\"text/javascript\">alert('Setor cadastrada com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao cadastrar setor!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'alterar') {
		if ($setores->alterarSetor()) {
			echo "<script type=\"text/javascript\">alert('Setor alterada com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao alterar setor!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'excluir') {
		if ($setores->excluirSetor()) {
			echo "<script type=\"text/javascript\">alert('Setor excluída com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao excluir setor!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'listar') {
		$setor = $setores->listarSetores();		
	}
	if ($_POST['acao'] === 'voltar') {
		header('Location: '.'principal.php');
	}
?>