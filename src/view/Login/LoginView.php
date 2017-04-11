<?php

	class LoginView extends DefaultView{

		public $layout = "layout";

		function __construct(){
		if(@$_SESSION['logado'] === true):
				$template = "src/template/Login/logado.php";
				$this->layout = "logado";

				echo $this->render($template, $this->layout);
		endif;
		}
	}
?>
