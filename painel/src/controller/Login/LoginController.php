<?php

    class LoginController extends DefaultController{

      public $loadModels = ["UsuariosModel"];

      function index(){

        if(isset($_POST['logarUser'])):

          try{
            $pass = md5($_POST['pass']);

            $logar = $this->UsuariosModel->login($_POST['usuario'], $pass);

            if(empty($logar))
              throw new Exception("Usuario ou senha inválido!");
              print_r($logar[0]["id_nivel"]);
            if($logar[0]["id_nivel"] != '3')
              throw new Exception("Usuario sem permissão para acessar o painel");

              session_start();
    					foreach($logar as $logado):
    						$_SESSION['id_usuario'] = $logado['id_usuario'];
    						$_SESSION['usuario'] = $logado['usuario'];
    						$_SESSION['id_nivel'] = $logado['id_nivel'];
    					endforeach;

    					header("Location: index.php?page=home");

          }catch(Exception $e){

            MsgHandler::setError($e->getMessage());

          }

        endif;

      }

      function logout(){

        $_SESSION = [];

        session_destroy();

        header("Location: index.php?page=login");

      }

    }

 ?>
