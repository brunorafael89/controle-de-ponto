<?php
	class Empresa {
		private $id;
		private $nome;
		private $fantasia;
		
		public function __construct ($id = null, $nome = null, $fantasia = null) {
			if (!empty($id) && empty($nome) && empty($fantasia)) {
				$this->id = $id;
				$this->carregarEmpresa();
			} else {
				$this->id = $id;
				$this->nome = $nome;
				$this->fantasia = $fantasia;
			}
		}
		
		public function __get ($atributo) {
			return $this->$atributo;
		}
		
		public function __set ($atributo, $valor) {
			if ($atributo === 'id' && is_int($valor))  {
				$this->$atributo = $valor;
			}
			
			if ($atributo === 'nome' && is_string($valor)) {
				$this->$atributo = $valor;
			}

			if ($atributo === 'fantasia' && is_string($valor)) {
				$this->$atributo = $valor;
			}
		}
		
		public function cadastrarEmpresa(){
			$sql = "INSERT INTO empresas VALUES(DEFAULT, '{$this->nome}', '{$this->fantasia}')";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}

		public function excluirEmpresa(){
			$sql = "DELETE FROM empresas WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}

		public function alterarEmpresa(){
			$sql = "UPDATE empresas SET nome = '{$this->nome}', fantasia = '{$this->fantasia}' WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}

		public function listarEmpresa() {
			$sql = "SELECT * FROM empresas";
			$qry = pg_query($sql);
			
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				
				return $res;
			} else {
				return false;
			}
		}

		public function carregarEmpresa() {
			$sql = "SELECT * FROM empresas WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				
				$this->nome = $res[0]['nome'];
				$this->fantasia = $res[0]['fantasia'];
				
				return true;
			} else {
				return false;
			}
		}
	}
?>