<?php
    //Model que vai cuidar da comunicação com o banco de dados
    class UsuariosModel extends DefaultModel{
      //Apenas vai receber todos os usuarios cadastrados
      function getUsers(){

        $query = $this->query()->select(["usuarios.id_usuario", "usuarios.nome", "usuarios.sobrenome", "usuarios.usuario", "usuarios.email", "nivel_usuario.nivel", "DATE_FORMAT(usuarios.data_registro, '%d/%b/%Y %H:%i') AS data", "usuarios.id_nivel"])
        ->innerJoin(["nivel_usuario" => "nivel_usuario.id_nivel = usuarios.id_nivel"])->order(["usuarios.data_registro" => "DESC"])->all();

        return $query;

      }
      //Recebe dados do usuario de acordo com a id
      function getUserById($id){

        $query = $this->query()->select()->where(["id_usuario" => $id])->all();

        return $query;
      }

      function updateUser($dados, $id){

        $query = $this->query()->update()->set($dados)->where(["usuarios.id_usuario =" => $id])->execute();

        return $query;

      }

      function addAdmin($dados = array()){

        $campos = ['nome', 'sobrenome', 'usuario', 'email', 'pass', 'id_nivel'];

        $query = $this->query()->insert($campos, $dados)->execute();

        return $query;

      }

      //Receber quantidade de usuarios comuns cadastrados
      function getCountUsers(){

        $query = $this->query()->select(["COUNT(id_usuario) as quantidade"])->where(["id_nivel" => '1'])->all();

        return $query;

      }
      //Receber quantidade de usuarios vendedores cadastrados
      function getCountVendors(){

        $query = $this->query()->select(["COUNT(id_usuario) as quantidade"])->where(["id_nivel" => '2'])->all();

        return $query;

      }
      //Receber quantidade de usuarios administradores cadastrados
      function getCountAdmins(){

        $query = $this->query()->select(["COUNT(id_usuario) as quantidade"])->where(["id_nivel" => '3'])->all();

        return $query;

      }
    }

 ?>
