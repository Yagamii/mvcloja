<?php
	
	class HomeController extends DefaultController{
		
		public $loadModels = ["ProdutosModel"];
		
		public function index(){
			$produto = $this->ProdutosModel->getProdutos();
			
			foreach($produto as $key):
				$produtos[] = $key;
			endforeach;
			
			$this->set("produtos", $produtos);
			
		}
		
	}
