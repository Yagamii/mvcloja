<?php

	class PromocoesController extends DefaultController{
		
		public $loadModels = ["ProdutosModel"];
		
		public function index(){
			$produto = $this->ProdutosModel->getPromocoes();
			
			foreach($produto as $key):
				$produtos[] = $key;
			endforeach;
			
			$this->set("promocoes", $produtos);
			
		}
		
	}
