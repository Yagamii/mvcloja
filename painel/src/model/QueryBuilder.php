<?php

	class QueryBuilder{
		public $table = false;
		public $connection = false;
		public $statement = false;
		public $execute = false;
		private $_query = "";

    //Armazenar cada faixa do comando sql
		private $_select = [];
		private $_set = [];
		private $_where = [];
		private $_order = [];
		private $_group = [];
		private $_join = [];

    //Variavel que armazena valores atribuidos
		private $boundValues = [];
    //A classe se inicia recebendo os valores de conexão e tabela
		public function __construct($connection,$table){

			$this->table = $table;

			$this->connection = $connection;
		}
    //Executar o comando do sql que foi inserido
		public function execute(){
      //Prepara o statement com a query inserida
			$this->statement = $this->connection->prepare($this->getQueryString());
      //Faz a atribuição e substituição dos valores
			$this->bindValues($this->boundValues);
      //Executa a query
			$this->execute = $this->statement->execute();

			return $this->execute;


		}

		public function bindValues($values = array()){

			foreach($values as $key =>&$value):

				$this->statement->bindValue(":".$key, $value);

			endforeach;

			return $this;

		}
    
		public function all(){

			$query = $this->execute();

			if($query):
				return $this->statement->fetchAll(PDO::FETCH_ASSOC);
			else:
				return false;
			endif;
		}

		public function first(){

			$query = $this->execute();

			if($query):
				return $this->statement->fetch(PDO::FETCH_ASSOC);
			else:
				return false;
			endif;
		}

		public function getQueryString(){

			$this->glueJoin();

			(empty($this->_join)) ? : $this->_query .= $this->_join;
			(empty($this->_set)) ? : $this->_query .= $this->_set;
			(empty($this->_where)) ? : $this->_query .= $this->_where;
			(empty($this->_order)) ? : $this->_query .= $this->_order;
			(empty($this->_group)) ? : $this->_query .= $this->_group;


			 return $this->_query;

		}

		public function __toString(){

			return $this->getQueryString();


		}

		public function glueJoin(){
			$this->_join = implode(" ", $this->_join);
		}

		public function select($columns = "*"){
			if(is_array($columns)):
				$this->_select = implode(', ', $columns);
			else:
				$this->_select = $columns;
			endif;

			$this->_query = " SELECT ".$this->_select." FROM ".$this->table;

			return $this;
		}

		public function insert($insert = array() , $values = array()){

			$this->_query = " INSERT INTO ".$this->table."(".implode(", ", $insert).") VALUES ('".implode("', '", $values)."')";

			return $this;
		}

		public function update(){

			$this->_query = " UPDATE ".$this->table;

			return $this;
		}

		public function set(array $toUpdate){

			foreach($toUpdate as $key => $value):

					if(preg_match("(\s[+*/-]\s)", $value)):

						$toQuery[] = $key."= ".$value." ";

					else:

						$toQuery[] = $key."='".$value."'";

					endif;

			endforeach;

			$this->_set = " SET ".implode(", ", $toQuery)." ";

			return $this;
		}

		public function delete(){

			$this->_query = " DELETE FROM ".$this->table;

			return $this;
		}

		public function where(array $conditions){
			$i = 0;
			foreach($conditions as $k => $v):

				if(preg_match("/(\>|\<|\=)$/", $k)):

					$whereClause[] = $k.":whr".$i;

					$this->boundValues["whr".$i] = $v;


				elseif(preg_match("/(IN)$/i", $k)):

					if(!is_array($v))
						throw new Exception("Erro de padrão: WHERE IN não utilizando array");

					$inValues = [];

					foreach($v as $index => $valor):

						$this->boundValues["whr".$i] = $valor;

						$inValues[] = ":whr".$i;

						if($index < sizeof($v)-1)
							$i++;

					endforeach;

					$whereClause[] = $k."(".implode(', ', $inValues).")";

				else:

					$whereClause[] = $k." = :whr".$i;

					$this->boundValues["whr".$i] = $v;


				endif;
			$i++;
			endforeach;

			$this->_where = " WHERE ".implode(" AND ", $whereClause)." ";

			return $this;
		}

		public function order(array $orders){

			foreach($orders as $k =>$v):
				if(isset($v)):
					$_orders[] = $k." ".$v." ";
				else:
					$_orders[] = $k." ";
				endif;
			endforeach;

				$orderClause = implode(", ", $_orders);

				$this->_order = " ORDER BY ".$orderClause;

			return $this;
		}

		public function group($groups){

			if(is_array($groups)):
				$_groups = implode(", ", $groups);
			else:
				$_groups = $groups;
			endif;

			$this->_group = " GROUP BY ".$_groups;

			return $this;
		}

		public function innerJoin(array $join){

			foreach($join as $k => $v):

				$_join[] = $k." ON ".$v." ";

			endforeach;

			$joinClause = implode(" INNER JOIN ", $_join);

			$this->_join[] = " INNER JOIN ".$joinClause;

			return $this;
		}

		public function leftJoin(array $join){

			foreach($join as $k => $v):

				$_join[] = $k." ON ".$v." ";

			endforeach;

			$clause = implode(" LEFT JOIN ", $_join);

			$this->_join[] = " LEFT JOIN ".$clause;

			return $this;
		}

		public function rightJoin(array $join){

			foreach($join as $k => $v):

				$_join[] = $k." ON ".$v." ";

			endforeach;

			$clause = implode(" RIGHT JOIN ", $_join);

			$this->_join[] = " RIGHT JOIN ".$clause;

			return $this;
		}

	}
