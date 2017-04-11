<?php
	//Responsavel pela parte de conexão ao banco de dados e consultas que serão feitas nele
	class DefaultModel{
		public $connection = NULL;
		public $table = false;
		
		public function __construct(){
			//Passa para a variavel a conexão ao Db para ser utilizado nas funções da model
			$this->connection = App::connectToDb();
			
			if(!$this->table):
				$className = get_class($this);
			
				$table = preg_replace("/Model$/","",$className);
			
				$this->table = strtolower(substr(preg_replace("/([A-Z])/", "_$1", $table), 1));
			endif;
			
			//echo $this->query()
			//->select(["produtos.id_produto", "produtos.nome_produto"])
			//->innerJoin(["pedidos" => "pedidos.id_produto = produto.id_produto"])
			//->leftJoin(["users" => "users.id_user = pedidos.id_user", "produtos" => "produto.id_produto = pedido.id_produto"])
			//->where(["id_produto IN" => [1, 2], "valor >" => 3.2, "nome" =>"Teste"])
			//->order(["produto.preco" => "ASC", "produtos.nome_produto" => "DESC"])->group(["produtos.id_produto"]);
			
			//echo $this->query()->where(["id_produto IN" => $this->query()->select(["id_produto"])]);
			
			
		}
		
		public function query(){
			return new QueryBuilder($this->connection,$this->table);
		}
		
	}
