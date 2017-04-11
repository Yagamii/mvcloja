<?php

	class CadastroController extends DefaultController{
		
		public $loadModels = ["UsuariosModel"];
		
		public function index(){
			
			if(isset($_POST['cadastrar'])):
				try{
					
					if(empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['senha']))
						throw new Exception("Por favor, preencha todos os campos corretamente.");
					
					//Verificar se usuario inserido ja consta no banco de dados
					$verificar = $this->UsuariosModel->verificarUsuario($_POST['usuario']);
					
					//Caso retorne algum valor, mostra mensagem ao usuário
					if(!empty($verificar))
						throw new Exception("Usuario ja cadastrado no sistema!");
					
					if($_POST['senha'] != $_POST['confirmsenha'])
						throw new Exception("Senha e confirmação não coincidem, favor verificar");
					
					$_senha = md5($_POST['senha']);
					
					$this->UsuariosModel->addUsuario([$_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $_senha, 1]);
					MsgHandler::setSucess("Cadastro efetuado com sucesso!");
					
				}catch(Exception $e){
					MsgHandler::setError($e->getMessage());		
				}
				
			endif;
			
		}
		
	}

?>