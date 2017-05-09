<?php

    class ProdutosController extends DefaultController{

      //Carregar models que serão utilizadas
      public $loadModels = ["ProdutosModel", "CategoriasModel"];

      function index(){
        //Carrega todas categorias para ser exibido como option para add um novo produto
        $categorias = $this->CategoriasModel->getCategorias();

        $this->set("categorias", $categorias);

        //Carrega todos produtos ja cadastrados no sistema
        $produtos = $this->ProdutosModel->getProdutos();

        //Passa o array contendo informação de todos produtos
        $this->set("produtos", $produtos);

        //Passa a variavel com a chamada da classe, para que o template possa chamar uma função especifica de consulta
        $this->set("categoriasQuantidades", $this->ProdutosModel);

        //Caso tenha sido setado para add um produto
        if(isset($_POST['addProduto'])):
            try{
              //Verifica se tem algum campo vazio
              if(empty($_POST['nome']) || empty($_POST['descricao']) || empty($_POST['valor']) || empty($_POST['quantidade']))
                throw new Exception("Por favor, preencha todos os campos");
              //Chama a função que verifica o formato do arquivo que foi enviado, para checar se é uma imagem
              $thumb = $this->checkImage($_FILES['imagem']['type'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);

              //Caso tenha retornado falso, apresenta mensagem
              if(!$thumb)
                throw new Exception("Imagem não é válida.");
              //campos do banco de dados que serão inseridos do produto
              $campos = ['nome_produto', 'valor', 'descricao', 'id_categoria', 'thumb', 'estoque', 'promo'];
              //Valores que serão inseridos
              $valores = [$_POST['nome'], $_POST['valor'], $_POST['descricao'], $_POST['categoria'], $thumb, $_POST['quantidade'], 0];
              //Chamada da função da model passando campos e valores
              $this->ProdutosModel->addProduto($campos, $valores);
              //Definido para apresentar alerta de cadastro feito com sucesso
              $_SESSION['alert_cadastro'] = TRUE;
              //Atualiza a pagina
              header("Location: index.php?page=produtos");
              exit();
            }catch(Exception $e){
              MsgHandler::setError($e->getMessage());
            }
        endif;
      }

      function checkImage($format, $name, $tpmname){
        //Armazena os formatos de arquivo validos
        $valid = array('image/jpeg', 'image/jpg', 'image/JPG', 'image/png', 'imagem/PNG');
        print_r($_FILES['imagem']);
  				//Verifica se o formato da imagem upada corresponde aos formatos inseridos na array
          if(in_array($format, $valid)){

  					//Tenta mover o arquivo de nome temporario para seu diretorio
  					if(move_uploaded_file($tpmname, "../src/template/Includes/thumb/".$name."")){

  						//Caso bem sucessido, retorna para variavel que chamar a função o nome do arquivo que foi upado
  						return $name;
  					}
  				}else{

  				//caso o formato do arquivo upado não esteja dentro da array, retornara falso, definindo assim que o formato do arquivo é invalido
  				return false;
  				}

      }

      function apagar(){

        if(is_numeric($_GET['id']) && $_SESSION['id_nivel'] === '3'):

          $this->ProdutosModel->delProduto($_GET['id']);

          header("Location: index.php?page=produtos");

        endif;

      }

      function editar(){

        //Carrega todas categorias para ser exibido como option para add um novo produto
        $categorias = $this->CategoriasModel->getCategorias();

        $this->set("categorias", $categorias);
        //Carrega informações do produto desejado de acordo com seu id
        $produto = $this->ProdutosModel->getProdutoById($_GET['id']);

        $this->set("produto", $produto);

        if(isset($_POST['editarProduto'])):
          try{
              if(empty($_POST['nome']) || empty($_POST['descricao']) || empty($_POST['valor']) || empty($_POST['quantidade']))
                throw new Exception("Não deixe nenhum campo vazio");

              if(!empty($_FILES['imagem']['name'])):

                $thumb = $this->checkImage($_FILES['imagem']['type'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);

                if(!$thumb)
                  throw new Exception("Imagem invalida!");

                $dados = ["nome_produto" => $_POST['nome'], "valor" => $_POST['valor'], "descricao" => $_POST['descricao'], "id_categoria" => $_POST['categoria'], "thumb" => $thumb, "estoque" => $_POST['quantidade'], "promo" => $_POST['promo']];

                $this->ProdutosModel->updateProduto($dados, $_GET['id']);

                header("Location: index.php?page=produtos");
              else:
                $dados = ["nome_produto" => $_POST['nome'], "valor" => $_POST['valor'], "descricao" => $_POST['descricao'], "id_categoria" => $_POST['categoria'], "estoque" => $_POST['quantidade'], "promo" => $_POST['promo']];

                $this->ProdutosModel->updateProduto($dados, $_GET['id']);

                header("Location: index.php?page=produtos");
              endif;
          }catch(Exception $e){
            MsgHandler::setError($e->getMessage());
          }
        endif;

      }

    }

 ?>
