<?php
    //Controller da pagina de usuarios, cuida da parte logica da pagina, passando dados recebidos da model para a view
    class UsuariosController extends DefaultController{
      //Especifica a model a ser carregada
      public $loadModels = ["UsuariosModel", "Nivel_usuarioModel"];

      public function index(){
        //Verifica se foi enviado o formulario para cadastrar novo admin
        if(isset($_POST['cadastrar'])):
          //Verifica se tem algum campo vazio
          if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['usuario']) && !empty($_POST['email']) && !empty($_POST['senha'])):
            //criptografar a senha
            $senha = md5($_POST['senha']);
            //Armazena em array os dados que serão inseridos no banco de dados
            $dados = [$_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $senha, 3];
            //Chama a função da model para executar a query, passando os dados inseridos
            $this->UsuariosModel->addAdmin($dados);

            $_SESSION['alert_cadastro'] = TRUE;

            header("Location: index.php?page=usuarios");
            exit();
          else:
            //Caso algum campo esteja vazio, apresenta mensagem
            MsgHandler::setError("Preencha todos os campos!");
          endif;
        endif;

          //Receber estatisticas
          $this->getStatistics();

          //Armazena o valor que foi recebido com a lista de usuarios e define a variavel com esses dados para ser utilizado no template
          $listUser = $this->listUsers();

          $this->set("Usuarios", $listUser);

      }

      public function editar(){

        if(isset($_POST['alterar'])):

          if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['usuario']) && !empty($_POST['email'])):

            $this->UsuariosModel->updateUser(["nome" => $_POST['nome'], "sobrenome" => $_POST['sobrenome'], "usuario" => $_POST['usuario'], "email" => $_POST['email'], "id_nivel" => $_POST['nivel']], $_GET['id']);

            header("Location: index.php?page=usuarios");

          else:
            MsgHandler::setError("Não deixe nenhum campo em branco!");
          endif;

        endif;

        $edit = $this->UsuariosModel->getUserById($_GET['id']);
        $this->set("infos", $edit);

        $nivel = $this->Nivel_usuarioModel->getNiveis();
        $this->set("niveis", $nivel);

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
