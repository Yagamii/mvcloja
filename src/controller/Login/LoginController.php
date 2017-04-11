<?php

	class LoginController extends DefaultController{

		public $loadModels = ["UsuariosModel"];

		public function index(){

			if(isset($_POST['logando'])):
				try{
					$senha = md5($_POST['pass']);

					$logar = $this->UsuariosModel->logar($_POST['user'], $senha);

					if(empty($logar))
						throw new Exception("Não foi encontrado a combinação de usuário e senha, tente novamente");

					session_start();
					foreach($logar as $logado):
						$_SESSION['id_usuario'] = $logado['id_usuario'];
						$_SESSION['usuario'] = $logado['usuario'];
						$_SESSION['id_nivel'] = $logado['id_nivel'];
						$_SESSION['logado'] = true;
					endforeach;

					//Após logar, joga o usuario de volta a pagina inicial
					header("Location: index.php");

				}catch(Exception $e){
					MsgHandler::setError($e->getMessage());
				}

			endif;

		}

		public function logout(){

			$_SESSION = [];

			session_destroy();

			header("Location: index.php");

		}

		public function editar(){

			if(isset($_POST['editarUsuario'])):

				try{

					if(empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['email']))
						throw new Exception("Por favor, não deixe nenhum campo de informação em branco");

					if(!empty($_POST['senha']) || !empty($_POST['csenha'])):

						if($_POST['senha'] != $_POST['csenha'])
							throw new Exception("Senha e confirmação não coincidem.");

						$senha = md5($_POST['senha']);

					else:
						$senha = false;
					endif;

					if(!empty($senha)):
						$this->UsuariosModel->editar(["nome" => $_POST['nome'], "sobrenome" => $_POST['sobrenome'], "email" => $_POST['email'], "pass" => $senha], $_GET['id']);
					else:
						$this->UsuariosModel->editar(["nome" => $_POST['nome'], "sobrenome" => $_POST['sobrenome'], "email" => $_POST['email']], $_GET['id']);
					endif;

					MsgHandler::setSucess("Dados alterados com sucesso.");

				}catch(Exception $e){
					MsgHandler::setError($e->getMessage());
				}

			endif;

			$dadosUsuario = $this->UsuariosModel->getDadosById($_GET['id']);

			$this->set("dados", $dadosUsuario);
		}
	}

?>
