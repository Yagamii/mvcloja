<?php
	
	class Dispatcher{
		
		public function dispatch(){
			$action = action;
			$Fuseaction = Fuseaction;
			
			try{
				$controllerName = $Fuseaction."Controller";
				$viewName = $Fuseaction."View";
				
				$View = new $viewName();
				$Controller = new $controllerName();
				
				if(!is_callable([ $Controller, $action ]))
					throw new Exception("O método ".$action."() não existe.");
				
				$Controller->$action();
				
				if($Controller->template_name === NULL):
					$template = $action;
				else:
					$template = $Controller->template_name;
				endif;
				
				$layout_file = "src/template/Layouts/".$View->getLayout().".php";
				$template_file = "src/template/".ucfirst($Fuseaction)."/".$template.".php";
				
				if(!file_exists($layout_file))
					throw new Exception("O arquivo ".$layout_file." de layout não existe.");
				
				if(!file_exists($template_file))
					throw new Exception("O arquivo ".$template_file." de template não existe");
				
				echo $View->render($layout_file, [ "content" => $View->render($template_file, $Controller->getTemplateVars()) ]);
				
			}catch(Exception $e){
				echo $View->render("src/template/Layouts/404.php", ["error" => $e->getMessage()]);
			}
		}
		
	}
