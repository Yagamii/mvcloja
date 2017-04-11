<?php
	
	class App{
		//Caminho completo do site no servidor
		private static $app_path = "htdocs/mvcloja";
		
		public static function init(){
			//Recebe o diretorio atual do site
			self::$app_path = dirname(dirname(__DIR__));
			
			session_start();
			
			self::defineConstants();
			self::includeMVC();
		}
		
		//Define as constantes Fuseaction e action
		private static function defineConstants(){
			//Caso tenha algo setado na page, define o Fuseaction com o nome, senão define como Home
			//O mesmo para o action
			define("Fuseaction", @$_GET['page']?$_GET['page']:"home");
			define("action", @$_GET['action']?$_GET['action']:"index");
		}
		//Inclui todos os arquivos padrões
		private static function includeMVC(){
			$classes = [	"src/controller/DefaultController.php",
							"src/model/DefaultModel.php",
							"src/view/DefaultView.php",
							"src/route/Dispatcher.php",
							"src/model/QueryBuilder.php",
							"src/view/MsgHandler.php"		];
			
			//Utilizado para dar requiere em todos elementos da array
			foreach($classes as $class):
				require_once(self::$app_path."/".$class);
			endforeach;
			
			//Da require nos arquivos de controller e view especificos do Fuseaction definido, utilizando o caminho completo do site no servidor
			require_once(self::$app_path."/src/controller/".ucfirst(Fuseaction)."/".ucfirst(Fuseaction)."Controller.php");
			require_once(self::$app_path."/src/view/".ucfirst(Fuseaction)."/".ucfirst(Fuseaction)."View.php");
		}
		
		//Função de conexão ao Db
		public static function connectToDb(){
			$host = 'localhost';
			$db = 'phploja';
			$user = 'root';
			$pass = '';
			//$charset = 'utf8';
			
			$dsn = "mysql:host=$host;dbname=$db";
			
			$conexao = new PDO($dsn, $user, $pass);
			
			return $conexao;
		}
	}
	
?>