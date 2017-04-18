<?php
    //Controller da pagina de usuarios, cuida da parte logica da pagina, passando dados recebidos da model para a view
    class UsuariosController extends DefaultController{
      //Especifica a model a ser carregada
      public $loadModels = ["UsuariosModel"];

      public function index(){
          //Receber estatisticas
          $this->getStatistics();

          //Armazena o valor que foi recebido com a lista de usuarios e define a variavel com esses dados para ser utilizado no template
          $listUser = $this->listUsers();

          $this->set("Usuarios", $listUser);

      }
      //Chama a função de receber usuarios da model e retorna os valores recebidos
      public function listUsers(){

        $list = $this->UsuariosModel->getUsers();

        return $list;

      }
      //Recebe a quantidade de cada tipo de usuario e define variaveis pra cada um deles
      public function getStatistics(){

        $countUsers = $this->UsuariosModel->getCountUsers();
        $countVendors = $this->UsuariosModel->getCountVendors();
        $countAdmins = $this->UsuariosModel->getCountAdmins();

        $this->set("CountUsuarios", $countUsers);
        $this->set("CountVendors", $countVendors);
        $this->set("CountAdmins", $countAdmins);
      }

    }

 ?>
