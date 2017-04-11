<?php

	class CategoriasController extends DefaultController{
		
		public $loadModels = ["ProdutosModel", "CategoriasModel"];
		
		function index(){
			
			$categorias = $this->CategoriasModel->getCategorias();
			
			(!isset($_GET['id'])) ? : $this->listar();
			
			foreach($categorias as $key):
				$categoria[] = $key;
			endforeach;

			$this->set("categorias", $categoria);
			
		}
		
		function listar(){
			
			$produtosPorId = $this->ProdutosModel->getProdutosByCategoria($_GET['id']);
				
				foreach($produtosPorId as $key):
					$produtosById[] = $key;
				endforeach;
				
			$this->set("produtoById", $produtosById);
		
		}
	}
