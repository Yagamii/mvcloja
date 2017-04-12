<?php

    class DefaultView{
      //Definir nome do arquivo de layout que sera utilizado
      public $layout = 'layout';

      //Utiliza o buffer para chamar o template desejado e rodar as variaveis contidas
      public function render($file, $vars){

        extract($vars);

        //inicia o buffer
        ob_start();

        //inclui o template
        include($file);

        //faz o template ser renderizado e armazena o conteudo na variavel
        $renderedHTML = ob_get_contents();

        //encerra o buffer e limpa ele
        ob_end_clean();

        //retorna a variavel contendo a pagina renderizada
        return $renderedHTML;

      }

      //Chama o layout geral utilizado
      public function getLayout(){

        return $this->layout;

      }

    }

 ?>
