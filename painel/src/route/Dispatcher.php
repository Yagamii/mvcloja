<?php

    class Dispatcher{

      public function dispatch(){
        //Armazenar constantes em variaveis
        $action = action;
        $Fuseaction = Fuseaction;

        try{
          //Recebe o nome da Controller e View de acordo com o Fuseaction
          $controllerName = $Fuseaction."Controller";
          $viewName = $Fuseaction."View";

          //Instanciar View e controller
          $View = New $viewName();
          $Controller = New $controllerName();
          //Verifica se é possivel chamar a função da action q foi definida
          if(!is_callable([$Controller, $action]))
            throw new Exception("O método ".$action."() não existe!");

          //Passando na verificação, chama a função
          $Controller->$action;

          //Verifica se a controller ja possui um nome de template, caso não tenha, é definido o nome da action
          if($Controller->template_name === NULL):
            $template = $action;
          else:
            $template = $Controller->template_name;
          endif;

          //Recebe o diretorio dos arquivos que serão chamados
          $layout_file = "src/template/Layouts/".$View->getLayout().".php";
          $template_file = "src/template/".ucfirst($Fuseaction)."/".$template.".php";

          //Verificar existencia de ambos arquivos
          if(!file_exists($layout_file))
            throw new Exception("O arquivo ".$layout_file." do layout não existe.");

          if(!file_exists($template_file))
            throw new Exception("O arquivo ".$template_file." de template não existe.");

          //renderiza o layout utilizando como conteudo a pagina de template renderizada e chamando suas variaveis
          echo $view->render($layout_file, [ "content" => $view->render($template_file, $Controller->GetTemplateVars())]);

        }catch(Exception $e){
          //Renderiza pagina de erro e exibe ele na tela
          echo $view->render("src/template/Layouts/404.php", ["errors" => $e->getMessage()]);
        }

      }


    }

 ?>
