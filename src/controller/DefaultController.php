<?php

	class DefaultController{
		//Serve para poder carregar outras models na controller e poder acessar elas com $this->NomeDaModelModel na controller da pagina
		public $loadModels = [];
		public $template_vars = [];
		public $template_name = NULL;

		public function __construct(){
			$this->DefaultModel = new DefaultModel();

			//Vai verificar os nomes dentro da array e incluir o arquivo especifico da model definida
			if(is_array($this->loadModels)):
				foreach($this->loadModels as $modelName):
					//Verifica se possui model no nome, caso encontre a palavra, ira substituir por nada, para assim ficar apenas o nome da model
					$className = preg_replace("/Model$/","",$modelName);
					include("src/model/".$className."/".$className."Model.php");
					//Instancia as models contidas na array
					$this->{$modelName} = new $modelName();
				endforeach;
			endif;

		}

		//Utilizado para que o controller defina variaveis que poderao ser utilizadas no template
		public function set($var, $value){
			$this->template_vars[$var] = $value;
		}

		//Recupera todas as variaveis
		public function getTemplateVars(){
			return $this->template_vars;
		}

	}

?>
