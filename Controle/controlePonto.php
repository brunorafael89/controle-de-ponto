<?php
    require_once("Classes/Ponto.class.php");
    require_once("Classes/MotivoPonto.class.php");
    require_once("Classes/Funcionario.class.php");
	require_once("Classes/Empresa.class.php");


    pg_connect("host=localhost port=5432 user=postgres password=cetsolucoes dbname=folhaponto");
    
    $ponto = new Ponto((int)$_POST['id'], (int)$_POST['id_funcionario'], (int)$_POST['id_motivo_ponto'], $_POST['dataPonto'], $_POST['observacao']);

    $motivoPonto = new MotivoPonto();
	$motivoPontos = $motivoPonto->listarMotivos();
	$funcionario = new funcionario();
    $funcionarios = $funcionario->listarFuncionarios();
    

    if( $_POST['acao'] === 'cadastrar' ){
        if ($ponto->cadastrarPonto()){
			echo "<script type=\"text/javascript\">alert('Ponto cadastrado com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao cadastrar Ponto!');</script>";
		};
    }

    if( $_POST['acao'] === 'alterar' ){
        if ($ponto->alterarPonto()){
			echo "<script type=\"text/javascript\">alert('Ponto alterado com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao alterar Ponto!');</script>";
		};
    }

    if( $_POST['acao'] === 'excluir' ){
        if ($ponto->excluirPonto()){
			echo "<script type=\"text/javascript\">alert('Ponto excluido com sucesso!');</script>";
		} else {
			echo "<script type=\"text/javascript\">alert('Falha ao excluir Ponto!');</script>";
		};
    }

    if( $_POST['acao'] === 'listar' ){
        $pontos = $ponto->listarPonto();
    }

    if( $_POST['acao'] === 'carregar' ){
        $ponto->carregarPonto();
    }
	if ($_POST['acao'] === 'voltar') {
		header('Location: '.'principal.php');
	}
?>