<?php
    require_once('Classes/MotivoPonto.class.php');

    pg_connect("host=localhost port=5432 user=postgres password=123456 dbname=folhaponto");

    $motivo = new MotivoPonto((int)$_POST['id'], $_POST['motivoponto']);

    if ($_POST['acao'] === 'cadastrar') {
		if ($motivo->cadastrarMotivo()) {
			echo "<script type=\"text/javascript\">alert('Motivo cadastrada com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao cadastrar Motivo!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'alterar') {
		if ($motivo->alterarMotivo()) {
			echo "<script type=\"text/javascript\">alert('Motivo alterada com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao alterar Motivo!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'excluir') {
		if ($motivo->excluirMotivo()) {
			echo "<script type=\"text/javascript\">alert('Motivo excluída com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao excluir Motivo!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'listar') {
		$motivos = $motivo->listarMotivos();
		
	}
	if ($_POST['acao'] === 'voltar') {
		header('Location: '.'principal.php');
	}
?>