<?php

	class ProdutoController extends DefaultController{

		public $loadModels = ["ProdutosModel", "ComentariosModel"];

		public function index(){

			$dados = $this->ProdutosModel->getProdutoById($_GET['id']);

			$this->set("dadosProduto", $dados);

			$quantidade = $this->ProdutosModel->checkQuantity($_GET['id']);

			$this->set("quantidade", $quantidade);

			$comentarios = $this->ComentariosModel->getComentariosByProduto($_GET['id']);

			$this->set("comentario", $comentarios);

			if(isset($_POST['addCarrinho']))
				$this->addCarrinho($_GET['id'], $_POST['quantidade']);

			if(isset($_POST['addcomentario'])):
				$this->ComentariosModel->addComentario([$_SESSION['id_usuario'], $_POST['comentario'], $_GET['id']]);
				header("Location: index.php?page=produto&id=".$_GET['id']);
			endif;

		}

		public function delComentario(){


				if(isset($_SESSION['id_nivel']) && $_SESSION['id_nivel'] === '3'):
					$this->ComentariosModel->delComentario($_GET['cid']);
					header("Location: index.php?page=produto&id=".$_GET['id']);
				else:

					MsgHandler::setError('Você não tem permissão para executar essa ação!');
				endif;
		}

		public function addCarrinho($id, $quantidade){

			if(!isset($_SESSION['carrinho']))
				$_SESSION['carrinho'] = array();

			$_id = intval($id);

			if(!isset($_SESSION['carrinho'][$_id])):

				$_SESSION['carrinho'][$_id] = $quantidade;

			else:

				$_SESSION['carrinho'][$_id] += $quantidade;

			endif;
		}
	}

?>
