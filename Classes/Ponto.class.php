<?php
    class Ponto{
        private $id;
        private $id_funcionario;
        private $id_motivo_ponto;
        private $dataPonto;
        private $observacao;

        public function __construct($id = null, $id_funcionario = null, $id_motivo_ponto = null, $dataPonto = null, $observacao = null){
            if( !empty($id) && empty($id_funcionario) && empty($id_motivo_ponto) && empty($dataPonto) && empty($observacao) ){
                $this->id = $id;
                $this->carregarPonto();
            } else {
                $this->id = (int)$id;
                $this->id_funcionario = (int)$id_funcionario;
                $this->id_motivo_ponto = (int)$id_motivo_ponto;
                $this->dataPonto = $dataPonto;
                $this->observacao = $observacao;
            }
        }
            
        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo === 'id' && is_int($valor) ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'id_funcionario' && $valor instanceof Funcionario ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'id_motivo_ponto' && $valor instanceof MotivoPonto ){
                $this->$atributo = $valor;
            }

            if( $atributo === 'dataPonto' && is_string($valor) ){
				
                $this->$atributo = $timestamp;
            }

            if( $atributo === 'observacao' && is_string($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function cadastrarPonto(){
            $sql = "INSERT INTO pontos VALUES (DEFAULT, 
            '{$this->dataPonto}', '{$this->observacao}', {$this->id_funcionario}, {$this->id_motivo_ponto})";
			echo $sql;

            $qry = pg_query($sql);

            if( pg_affected_rows($qry) ){
                return true;
            } else {
                return false;
            }
        }

        public function excluirPonto(){
            $sql = "DELETE FROM ponto WHERE id = {$this->id}";
            $qry = pg_query($sql);

            if( pg_affected_rows($qry) ){
                return true;
            } else {
                return false;
            }
        }

        public function alterarPonto(){
			$dtime = DateTime::createFromFormat('Y-m-d H:i:s e');
			$timestamp = $dtime->$this->dataPonto;
            $sql = "UPDATE ponto SET id_funcionario = {$this->funcionario->id}, motivo_ponto = {$this->motivo_ponto->id}, 
            dataPonto = '{$timestamp}', observacao = '{$this->observacao}' WHERE id = {$this->id}";
            $qry = pg_query($sql);

            if( pg_affected_rows($qry) ){
                return true;
            } else {
                return false;
            }
        }

        public function listarPonto(){
			session_start();
			$_SESSION["ID"]=2;
			$sqlSetor = "select setor from funcionarios where id = {$_SESSION["ID"]}";
            $qry = pg_query($sqlSetor);

            if( pg_num_rows($qry) ){
				$res = pg_fetch_all($qry);
				foreach($res as $item)
				{
					$idSetor = $item["setor"];
				}
                $sqlSetor = "select nome from setores where id = {$idSetor}";
                
                $qry = pg_query($sqlSetor);
    
                if( pg_num_rows($qry) ){
					$res = pg_fetch_all($qry);
					foreach($res as $item)
					{
						$gerente = $item["nome"];
					}
                }   
			}
            $sql = "select f.nome as funcionario, e.fantasia, s.nome as setor, p.dataponto, p.id, p.obs, m.motivoponto
                    from funcionarios f
                    inner join empresas e on f.empresa = e.id
                    inner join setores s on f.setor = s.id
                    inner join pontos p on f.id = p.funcionario
                    inner join motivopontos m on p.motivoponto = m.id";
//            if ($gerente != "Gerência")
  //              $sql = $sql." where funcionario = ".$_SESSION["ID"];
                    //$sql = "SELECT p.id, p.dataponto, p.obs, f.nome AS funcionario, m.motivoponto AS motivoponto FROM pontos p
            //INNER JOIN funcionarios f ON p.funcionario = p.id INNER JOIN motivopontos m ON p.motivoponto = p.id	";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }

        public function carregarPonto(){
            $sql = "SELECT * FROM pontos WHERE id = {$this->id}";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                $this->id_funcionario = new Funcionario($res[0]['funcionario']);
                $this->id_motivo_ponto = new MotivoPonto($res[0]['motivoponto']);
                $this->dataPonto = $res[0]['dataPonto'];
                $this->observacao = $res[0]['obs'];

                return true;
            } else {
                return false;
            }
        }
    }
?>