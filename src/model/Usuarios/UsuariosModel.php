<?php

	class UsuariosModel extends DefaultModel{
		
		function addUsuario($dados = array()){
			
			$campos = ['nome', 'sobrenome', 'usuario', 'email', 'pass', 'id_nivel'];
			
			$query = $this->query()->insert($campos, $dados)->execute();
			
			return $query;
		}
		
		function verificarUsuario($usuario){
			
			$query = $this->query()->select()->where(["usuarios.usuario =" => $usuario])->all();
			
			return $query;
		}
		
		function logar($usuario, $senha){
			
			$query = $this->query()->select()->where(["usuarios.usuario =" => $usuario, "usuarios.pass =" => $senha])->all();
			
			return $query;
		}
		
		function getDadosById($id){
			
			$query = $this->query()->select(["nome", "sobrenome", "usuario", "email"])->where(["usuarios.id_usuario =" => $id])->all();
			
			return $query;
			
		}
		
		function editar(array $dados,$id){
			
			$query = $this->query()->update()->set($dados)->where(["usuarios.id_usuario =" => $id])->all();
			
			return $query;
		}
	}

?>