<?php

    class CategoriasController extends DefaultController{
      //Passa a model que sera carregada para ser usada na controller
      public $loadModels = ["CategoriasModel"];

      //função principal da controller, que sera chamada na pagina inicial
      function index(){

        //Verifica se foi enviado o hidden contido no form para add categoria
        if(isset($_POST['adicionar'])):
          try{
            //Verifica se o campo esta vazio
            if(empty($_POST['categoria']))
              throw new Exception("Campo vazio, por favor insira um nome antes de adicionar.");

            //Caso não esteja vazio, chama a função da model
            $this->CategoriasModel->addCategoria([$_POST['categoria']]);

            //Redireciona para a mesma pagina, pra que ela seja atualizada
            header("Location: index.php?page=categorias");
          }catch(Exception $e){
            //Utiliza a função da classe estatica para exibir mensagem
            MsgHandler::setError($e->getMessage());
          }

        endif;
        //Variavel recebe o return da função com todas categorias
        $categorias = $this->CategoriasModel->getCategorias();

        //Define a variavel que sera utilizada no template
        $this->set("categorias", $categorias);
      }

      function editar(){
        //Variavel recebe informações da categoria especifica chamada
        $infos = $this->CategoriasModel->getCategoriaById($_GET['id']);
        //Passa o valor pra variavel no template
        $this->set("catInfo", $infos);

        //Verifica se foi enviado o hidden contido no form
        if(isset($_POST['editarCategoria'])):
          try{
            if(empty($_POST['categoria']))
              throw new Exception("Campo em branco");

            //Chama a função para alterar informações no banco de dados
            $this->CategoriasModel->editCategoria(["categoria" => $_POST['categoria']], $_GET['id']);

            //Redireciona pra pagina anterior
            header("Location: index.php?page=categorias");

          }catch(Exception $e){
            MsgHandler::setError($e->getMessage());
          }
        endif;
      }

      //Função apenas sera chamada caso seja confirmado a exclusão na janela que é apresentada na tela ao aperta o botão
      function deletar(){
        //Verifica se o id é numerico e se o niveo do usuario logado é um perfil de admin
        if(is_numeric($_GET['id']) && $_SESSION['id_nivel'] === '3'):
          //Chama a função para deletar a categoria no banco de dados
          $this->CategoriasModel->delCategoria($_GET['id']);
          //Redireciona para a pagina inicial de categorias
          header("Location: index.php?page=categorias");

        endif;

      }

    }

 ?>
