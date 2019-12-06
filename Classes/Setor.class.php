<?php
	class Setor{
		private $id;
		private $nome;
		
		public function __construct ($id = null, $nome = null) {
			if (empty($id)) {
				$this->nome = $nome;
			} else {
				$this->id = $id;
				$this->carregarSetor();
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
		}
		public function cadastrarSetor(){
			$sql = "INSERT INTO setores VALUES(DEFAULT, '{$this->nome}')";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}

		public function excluirSetor(){
			$sql = "DELETE FROM setores WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}

		public function alterarSetor(){
			$sql = "UPDATE setores SET nome = '{$this->nome}', WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}
		public function carregarSetor(){
			$sql = "SELECT * FROM setores WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				
				$this->nome = $res[0]['nome'];
				
				return true;
			} else {
				return false;
			}
		}
		
		public function listarSetores(){
			$sql = "SELECT * FROM setores";
			$qry = pg_query($sql);
			
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				
				return $res;
			} else {
				return false;
			}
		}
	}
?>