<?php

	class DefaultView{
		//Define o nome do arquivo de layout que sera carregado
		public $layout = "layout";
		
		//Utiliza o buffer para fazer a chamada do layout e rodar as variaveis contidas nele
		public function render($file, $vars){
			extract($vars);
			
			//Inicia buffer
			ob_start();
			
			//Faz uma chamada de arquivo
			include($file);
			//Recebe os dados que foram chamado dentro do buffer
			$renderedHTML = ob_get_contents();
			
			//Finaliza buffer
			ob_end_clean();
			
			return $renderedHTML;
		}
		
		//Recebe o nome do layout
		public function getLayout(){
			return $this->layout;
		}
	}
