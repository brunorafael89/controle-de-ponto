<?php
	class Funcionario {
		private $id;
		private $nome;
		private $cpf;
		private $email;
		private $senha;
		private $empresa;
		private $setor;

		public function __construct($id = null, $nome = null, $cpf = null, $email = null, $senha = null, $empresa = null, $setor = null){	
            if( !empty($id) && empty($nome) && empty($cpf) && empty($email) && empty($senha) && empty($empresa) && empty($setor) ){
                $this->id = $id;
                $this->carregarFuncionario();
            } else if ((empty($id) || $id == 0) && empty($nome) && empty($cpf) && !empty($email) && !empty($senha) && empty($empresa) && empty($setor) ){
                $this->email = $email;
                $this->senha = $senha;
                $this->carregarLogin();				
			}
			else {
                $this->id = (int)$id;
                $this->nome = $nome;
                $this->cpf = $cpf;
                $this->email = $email;
				$this->senha = $senha;
				$this->empresa = $empresa;
				$this->setor = $setor;
            }
        }
		
		public function __get($atributo) {
			return $this->$atributo;
		}
		
		public function __set($atributo, $valor) {
			if ($atributo == 'id' && is_int($valor)) {
				$this->$atributo = $valor;
			}
			
			if ($atributo == 'nome' && is_string($valor)) {
				$this->$atributo = $valor;
			}
			
			if ($atributo == 'cpf' && is_string($valor)) {
				$this->$atributo = $valor;
			}
			
			if ($atributo == 'email' && is_string($valor)) {
				$this->$atributo = $valor;
			}

			if ($atributo == 'senha' && is_string($valor)) {
				$this->$atributo = $valor;
			}

			if ($atributo == 'empresa' && $valor instanceof Empresa) {
				$this->$atributo = $valor;
			}
			
			if ($atributo == 'setor' && $valor instanceof Setor) {
				$this->$atributo = $valor;
			}
		}
		
		public function cadastrarFuncionario() {
			
			$sql = "INSERT INTO funcionarios VALUES(DEFAULT, '{$this->nome}', '{$this->cpf}', '{$this->email}', '{$this->senha}', {$this->empresa}, {$this->setor})";
			
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}
		
		public function alterarFuncionario() {
			echo $this->setor;
			$sql = "UPDATE funcionarios SET nome = '{$this->nome}', cpf = '{$this->cpf}', email = '{$this->email}', 
			senha = '{$this->senha}', empresa = {$this->empresa}, setor = {$this->setor}
			WHERE id = {$this->id}";
			
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}
		
		public function excluirFuncionario() {
			$sql = "DELETE FROM funcionarios WHERE id = {$this->id}";
			
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}
		
		public function listarFuncionarios() {
			session_start();
			if (!empty($_SESSION["ID"]))
			{
				$gerente = $_SESSION["Setor"];
			}
			else
			{
				header('Location: '.'index.php');
			}
			$sql = "SELECT j.id, j.nome, j.cpf, j.email, j.senha, a.fantasia as empresa, s.nome as setor from funcionarios j 
			inner join empresas a on j.empresa = a.id inner join setores s on j.setor = s.id";
			if (!empty($_SESSION["ID"]))
			{
				if ($gerente != "Gerência"){
					$sql = "SELECT j.id, j.nome, j.cpf, j.email, j.senha, a.fantasia as empresa, s.nome as setor from funcionarios j 
					inner join empresas a on j.empresa = a.id inner join setores s on j.setor = s.id where j.id = {$_SESSION["ID"]}";
				}
			}
			$qry = pg_query($sql);
			
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				
				return $res;
			} else {
				return false;
			}
		}
		
		public function carregarLogin() {
			$sql = "SELECT * FROM funcionarios WHERE email = '{$this->email}' and senha = '{$this->senha}'";
			$qry = pg_query($sql);
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				$this->id = $res[0]['id'];
				$this->nome = $res[0]['nome'];
				$this->cpf = $res[0]['cpf'];
				$this->email = $res[0]['email'];
				$this->senha = $res[0]['senha'];
				$this->empresa = new Empresa($res[0]['empresa']);
				$this->setor = new Setor($res[0]['setor']);
				Session_Start();
				$_SESSION["ID"] = $this->id;
				$_SESSION["Setor"] = $this->setor->nome;
				$_SESSION["Nome"] = $this->nome;
				header('Location: '.'principal.php');
				return true;
			} else {
				return false;
			}
		}
		
		public function carregarFuncionario() {			
			$sql = "SELECT * FROM funcionarios WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				
				$this->id = $res[0]['id'];
				$this->nome = $res[0]['nome'];
				$this->cpf = $res[0]['cpf'];
				$this->email = $res[0]['email'];
				$this->senha = $res[0]['senha'];
				$this->empresa = new Empresa($res[0]['empresa']);
				
				$this->setor = new Setor($res[0]['setor']);				
				return true;
			} else {
				return false;
			}
		}
	}
?>