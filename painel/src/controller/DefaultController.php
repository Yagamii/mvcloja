<?php

    class DefaultController{
        //Serve para poder carregar outras models na controller e poder acessar elas com a chamada $this->NomeDaModelModel na controller da pagina
        public $loadModels = [];
        public $template_vars = [];
        public $template_name = NULL;

        public function __construct(){
          //Instancia a DefaultModel
          $this->DefaultModel = new DefaultModel();

          if(is_array($this->loadModels)):

            foreach($this->loadModels as $modelName):
                //Recebe o nome da model a ser chamada, limpando o nome model da mesma caso tenha
                $className = preg_replace("/Model$/", "", $modelName);
                //Chama o arquivo da model especifica
                include("src/model/".$className."/".$className."Model.php");
                //Instancia essa model especifica que foi chamada
                $this->{$modelName} = new $modelName();
            endforeach;

          endif;
        }

        //Utilizado para que a controller defina valores de variaveis que estarão contidas no template
        public function set($var, $value){

          $this->template_vars[$var] = $value;

        }

        //Retorna as variaveis que foram definidas para o template
        public function getTemplateVars(){

          return $this->template_vars;

        }
    }

 ?>
