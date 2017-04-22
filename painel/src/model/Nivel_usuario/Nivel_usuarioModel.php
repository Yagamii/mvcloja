<?php

    class Nivel_usuarioModel extends DefaultModel{

      function getNiveis(){

        $query = $this->query()->select()->all();

        return $query;

      }


    }

 ?>
