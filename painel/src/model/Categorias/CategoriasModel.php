<?php

    class CategoriasModel extends DefaultModel{
      //Recebe todas categorias contidas no banco de dados
      public function getCategorias(){

        $query = $this->query()->select()->all();

        return $query;

      }
      //Adiciona uma nova categoria
      public function addCategoria($dado = array()){

        $campo = ["categoria"];

        $query = $this->query()->insert($campo, $dado)->execute();

      }
      //Recura informações de categoria de acordo com id
      public function getCategoriaById($id){

        $query = $this->query()->select()->where(["id_categoria =" => $id])->all();

        return $query;

      }
      //Edita informações da categoria de acordo com o id
      public function editCategoria($dados = Array(), $id){

        $query = $this->query()->update()->set($dados)->where(["id_categoria =" => $id])->execute();

      }
      //Deleta categoria de acordo com o id
      public function delCategoria($id){

        $query = $this->query()->delete()->where(["id_categoria =" => $id])->execute();

      }
    }

 ?>
