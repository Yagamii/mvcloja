<?php

	class ComentariosModel extends DefaultModel{

		public function getComentariosByProduto($id){

			$query = $this->query()->select(["comentarios.id_comentario, comentarios.mensagem, usuarios.usuario, DATE_FORMAT(comentarios.data_comentario, '%k:%i - %d/%m/%Y') AS data"])
			->innerJoin(["usuarios" => "usuarios.id_usuario = comentarios.id_usuario"])->where(["comentarios.id_produto =" => $id])->all();

			return $query;
		}

		public function addComentario($dados){

			$campos = ['id_usuario', 'mensagem', 'id_produto'];

			$query = $this->query()->insert($campos, $dados)->execute();

			return $query;

		}

		public function getComentarioById($id){

			$query = $this->query()->select("comentarios.id_comentario, comentarios.mensagem, usuarios.usuario")->innerJoin(["usuarios" => "usuarios.id_usuario = comentarios.id_usuario"])->where(["comentarios.id_comentario =" => $id])->all();

			return $query;

		}

		public function delComentario($id){

			$query = $this->query()->delete()->where(["comentarios.id_comentario =" => $id])->execute();

		}
	}

?>
