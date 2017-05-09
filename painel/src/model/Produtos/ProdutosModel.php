<?php

    class ProdutosModel extends DefaultModel{

      function getProdutos(){

        $query = $this->query()->select()->innerJoin(["categorias" => "produtos.id_categoria=categorias.id_categoria"])->all();

        return $query;

      }

      function getProdutoById($id){

        $query = $this->query()->select()->where(["id_produto =" => $id])->all();

        return $query;

      }

      function updateProduto($dados, $id){

        $query = $this->query()->update()->set($dados)->where(["produtos.id_produto =" => $id])->execute();

      }

      public function getCountById($id){

        $query = $this->query()->select(["COUNT(id_produto) AS quantidade"])->where(["id_categoria =" => $id])->all();

        return $query;

      }

      public function addProduto($rows = array(), $values = array()){

        $query = $this->query()->insert($rows, $values)->execute();

      }

      public function delProduto($id){

        $query = $this->query()->delete()->where(["produtos.id_produto =" => $id])->execute();

      }

    }

 ?>
