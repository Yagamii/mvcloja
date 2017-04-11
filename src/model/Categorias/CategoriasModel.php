<?php

	class CategoriasModel extends DefaultModel{
		
		function getCategorias(){
			
			$query = $this->query()->select()->all();
			
			return $query;
		}
		
	}
