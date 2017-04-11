<?php

	class CarrinhoController extends DefaultController{
		
		public $loadModels = ["ProdutosModel"];
		
		public function index(){
			
			if(isset($_POST['removeProduto']))
				$this->removerProduto($_POST['id_produto']);
			
			if(isset($_POST['confirma'])):
				$this->finalizarCompra($_SESSION['carrinho']);
				MsgHandler::setSucess("Sua compra foi efetuada com sucesso!");
				unset($_SESSION['carrinho']);
			endif;
			
			$this->set("Carrinho", $this->ProdutosModel);
			
		}
		
		public function removerProduto($id){
			
			$_SESSION['carrinho'][$id] -= 1;
			
			if(empty($_SESSION['carrinho'][$id]))
				unset($_SESSION['carrinho'][$id]);
			
		}
		
		public function finalizarCompra(array $carrinho){
			
			foreach($carrinho as $produto => $quantidade):
				
				$this->ProdutosModel->finalizaCompra($produto, $quantidade);
				
			endforeach;
			
		}
		
	}
