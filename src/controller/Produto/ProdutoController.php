<?php

	class ProdutoController extends DefaultController{
		
		public $loadModels = ["ProdutosModel", "ComentariosModel"];
		
		public function index(){
			
			$dados = $this->ProdutosModel->getProdutoById($_GET['id']);
			
			$this->set("dadosProduto", $dados);
			
			$comentarios = $this->ComentariosModel->getComentariosByProduto($_GET['id']);
			
			$this->set("comentario", $comentarios);
			
			if(isset($_POST['addCarrinho']))
				$this->addCarrinho($_GET['id'], $_POST['quantidade']);
			
			if(isset($_POST['addcomentario']))
				$this->ComentariosModel->addComentario([$_SESSION['id_usuario'], $_POST['comentario'], $_GET['id']]);
			
		}
		
		public function delComentario(){
			
			$comentarios = $this->ComentariosModel->getComentarioById($_GET['cid']);
			
			$this->set("comentario", $comentarios);
			
			if(isset($_POST['deletar'])):
				$this->ComentariosModel->delComentario($_GET['cid']);
				header("Location: index.php?page=produto&id=".$_GET['id']);
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