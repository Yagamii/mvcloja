<?php

	class ProdutosModel extends DefaultModel{

		function getProdutos(){

			$query = $this->query()->select()->all();

			return $query;
		}

		function getPromocoes(){

			$query = $this->query()->select()->where(["produtos.promo =" => "1"])->all();

			return $query;
		}

		function getProdutosByCategoria($id){

			$query = $this->query()->select()->where(["produtos.id_categoria =" => $id])->all();

			return $query;

		}

		function getProdutoById($id){

			$query = $this->query()->select()->where(["produtos.id_produto =" => $id])->all();

			return $query;

		}

		function finalizaCompra($produto, $quantidade){

			$query = $this->query()->update()->set(["estoque" => "estoque - ".$quantidade.""])->where(["produtos.id_produto =" => $produto])->all();

			return $query;

		}

		function checkQuantity($id){

			$query = $this->query()->select("produtos.estoque")->where(["produtos.id_produto =" => $id])->all();

			return $query;

		}

	}
