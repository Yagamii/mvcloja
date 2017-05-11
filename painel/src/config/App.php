<?php

    class App{
      //Caminho das pastas do site
      private static $app_path = "htdoc/mvcloja/painel";


      public static function init(){

        self::$app_path = dirname(dirname(__DIR__));

        session_start();
        
        self::defineConstants();
        self::includeMVC();
      }

      private static function defineConstants(){

        //Definir as constantes fuseaction e action que serão utilizadas no código do site
        define("Fuseaction", @$_GET['page']?$_GET['page']:"home");
        define("action", @$_GET['action']?$_GET['action']:"index");

      }

      private static function includeMVC(){
        //Diretorio dos arquivos do MVC
        $classes = ["src/controller/DefaultController.php",
                    "src/model/DefaultModel.php",
                    "src/view/DefaultView.php",
                    "src/route/Dispatcher.php",
                    "src/model/QueryBuilder.php",
                    "src/view/MsgHandler.php"];

        //Faz a chamada de cada arquivo inserido
        foreach($classes as $class):
          require_once(self::$app_path."/".$class);
        endforeach;

        //Faz a chamada dos arquivos da Controller e View da pagina atual, utilizando valor definido no Fuseaction
        require_once(self::$app_path."/src/controller/".ucfirst(Fuseaction)."/".ucfirst(Fuseaction)."Controller.php");
        require_once(self::$app_path."/src/view/".ucfirst(Fuseaction)."/".ucfirst(Fuseaction)."View.php");
      }

      //função para efetuar conexao com o db por PDO
      public static function connectToDb(){
        $host = 'localhost';
        $db = 'phploja';
        $user = 'root';
        $pass = '';

        $dsn = "mysql:host=$host;dbname=$db";

        $conexao = new PDO($dsn, $user, $pass);

        return $conexao;
      }

    }

 ?>
