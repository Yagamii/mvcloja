<?php

    class ProdutosController extends DefaultController{

      //Carregar models que serão utilizadas
      public $loadModels = ["ProdutosModel", "CategoriasModel"];

      function index(){
        //Carrega todas categorias para ser exibido como option para add um novo produto
        $categorias = $this->CategoriasModel->getCategorias();

        $this->set("categorias", $categorias);

        //Carrega todos produtos ja cadastrados no sistema
        $produtos = $this->ProdutosModel->getProdutos();

        $this->set("produtos", $produtos);

        $this->set("categoriasQuantidades", $this->ProdutosModel);
      }

    }

 ?>
