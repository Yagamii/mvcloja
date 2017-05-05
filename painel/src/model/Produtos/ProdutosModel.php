<?php

    class ProdutosModel extends DefaultModel{

      function getProdutos(){

        $query = $this->query()->select()->innerJoin(["categorias" => "produtos.id_categoria=categorias.id_categoria"])->all();

        return $query;

      }

      public function getCountById($id){

        $query = $this->query()->select(["COUNT(id_produto) AS quantidade"])->where(["id_categoria =" => $id])->all();

        return $query;

      }

      public function addProduto($rows = array(), $values = array()){

        $query = $this->query()->insert($rows, $values)->execute();

      }

    }

 ?>
