<?php
    //Responsavel pela parte de conexão ao banco de dados e consultas que serão feitas nele
    class DefaultModel{
      //Armazenar conexão com banco e a table que sera consultada
      public $connection = NULL;
      public $table = false;

      public function __construct(){
        //Chama a função de conexão ao banco de dados e a armazena
        $this->connection = App::connectToDb();

        //Caso seja falso o valor de table
        if(!$this->table):
          //Recebera o nome da classe que esta sendo utilizada
          $className = get_class($this);
          //Limpa o nome removendo a palavra model, deixando apenas o nome puro da tabela
          $table = preg_replace("/Model$/", "", $className);
          //Ajusta o nome para letras minusculas e apenas letras, para ser armazenado
          $this->table = strtolower(substr(preg_replace("/([A-Z])/", "_$1", $table), 1));
        endif;

      }

      public function query(){

        return new QueryBuilder($this->connection, $this->table);

      }

    }

 ?>
