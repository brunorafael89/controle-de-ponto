<?php
	class MotivoPonto {
		private $id;
		private $motivoponto;
		
		public function __construct ($id = null, $motivoponto = null) {
			if (empty($id)) {
				$this->motivoponto = $motivoponto;
			} else {
				$this->id = $id;
				$this->carregar();
			}
		}
		
		public function __get ($atributo) {
			return $this->$atributo;
		}
		
		public function __set ($atributo, $valor) {
			if ($atributo === 'id' && is_int($valor))  {
				$this->$atributo = $valor;
			}
			
			if ($atributo === 'motivoponto' && is_string($valor)) {
				$this->$atributo = $valor;
			}
		}
		public function cadastrarMotivo(){
			$sql = "INSERT INTO motivopontos VALUES(DEFAULT, '{$this->motivoponto}')";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}

		public function excluirMotivo(){
			$sql = "DELETE FROM motivopontos WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}

		public function alterarMotivo(){
			$sql = "UPDATE motivopontos SET nome = '{$this->motivoponto}', WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_affected_rows($qry)) {
				return true;
			} else {
				return false;
			}
		}
		public function carregar() {
			$sql = "SELECT * FROM motivopontos WHERE id = {$this->id}";
			$qry = pg_query($sql);
			
			if (pg_num_rows($qry)) {
				$res = pg_fetch_all($qry);
				
				$this->motivoponto = $res[0]['motivoponto'];
				
				return true;
			} else {
				return false;
			}
		}
		
		public function listarMotivos(){
			$sql = "SELECT * FROM motivopontos";
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