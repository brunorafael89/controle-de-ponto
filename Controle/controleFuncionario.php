<?php
	require_once("Classes/Funcionario.class.php");
	require_once("Classes/Setor.class.php");
	require_once("Classes/Empresa.class.php");
	
	pg_connect("host=localhost port=5432 user=postgres password=123456 dbname=folhaponto");
	
	$func = new Funcionario((int) $_POST['id'], $_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['senha'], $_POST['empresa'], $_POST['setor'], $_POST['acao']);
	
	$setor = new Setor();
	$setores = $setor->listarSetores();
	$empresa = new Empresa();
	$empresas = $empresa->listarEmpresa();
	
	
	
	if ($_POST['acao'] === 'cadastrar') {
		if ($func->cadastrarFuncionario()) {
			echo "<script type=\"text/javascript\">alert('Funcionário cadastrado com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao cadastrar funcionário!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'alterar') {
		if ($func->alterarFuncionario()) {
			echo "<script type=\"text/javascript\">alert('Funcionário alterado com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao alterar funcionário!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'excluir') {
		if ($func->excluirFuncionario()) {
			echo "<script type=\"text/javascript\">alert('Funcionário excluído com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao excluir funcionário!');</script>";
		}
	}
	
	if ($_POST['acao'] === 'listar') {
		$funcionarios = $func->listarFuncionarios();
	}
	
	if ($_POST['acao'] === 'voltar') {
		header('Location: '.'principal.php');
	}
	
	if (isset($_POST['id']) && $_POST['acao'] === 'carregar') {
		$func->carregarFuncionario();
	}
	
	if ($_POST['acao'] === 'login') {		
		if ($func->carregarLogin()){
			echo "";
		} else {
			echo "<script type=\"text/javascript\">alert('Usuário ou senha inválidos!');</script>";
		}
	}
?>
?>