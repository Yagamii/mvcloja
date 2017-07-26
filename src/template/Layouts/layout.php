<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php
				//Utiliza o a pagina do Fuseaction para alterar o titulo da pagina no navegador
				echo ucfirst(Fuseaction);
			?>
    </title>
	<link href="src/template/Layouts/css/bootstrap.css" rel="stylesheet">
	<!--<link rel="stylesheet" href="src/template/Layouts/style.css" type="text/css" media="screen" />-->
	<script language="javascript" type="text/javascript" src="src/template/Layouts/functions.js" ></script>
	<!--[if lt IE 9]>
	 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>
<body class="container">
	<!-- Definições inciais do cabeçalho e aparencia do botão para mobile -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
					<span class="sr-only">Abrir menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Mercatron</a>
			</div>

			<!-- Itens do cabeçalho -->

		<div class="collapse navbar-collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li><a href="index.php?page=promocoes">Promoções<span class="sr-only">(current)</span></a></li>
				<li><a href="index.php?page=categorias">Categorias</a></li>


			</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?page=cadastro">Cadastro</a></li>
					<li class="dropdown">
						<?php if(isset($_SESSION['id_usuario'])){
			            			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'
												.$_SESSION['usuario'].
												'<span class="caret"></span></a>';
												echo '<ul class="dropdown-menu">';
												if($_SESSION['id_nivel'] == 3){
													echo '<li><a href="painel/index.php">Admin</a></li>';
												}
												echo '
												<li><a href="index.php?page=carrinho">Carrinho <span class="badge">'.count(@$_SESSION['carrinho']).'</span></a></li>
												<li><a href="index.php?page=login&action=editar&id='.$_SESSION['id_usuario'].'">Editar dados</a></li>
												<li><a href="index.php?page=login&action=logout">Logout</a></li>
											</ul>';
									}else{
									echo '<a href="index.php?page=login">Login</a>';
									}
			                        ?>
					</li>
				</ul>
		</div>
		</div>
	</nav>

	<div class="row">

		<?php
			//Classe estatica sempre verificada para reconhecer mensagem de errou ou sucesso
		if(MsgHandler::getError()){
			foreach(MsgHandler::getError() as $erro){
				echo '<div class="alert alert-danger" role="alert">'.$erro.'</div>';
			}
		}elseif(MsgHandler::getSucess()){
			foreach(MsgHandler::getSucess() as $sucess){
				echo '<div class="alert alert-success" role="alert">'.$sucess.'</div>';
			}
		}

		echo $this->render("src/template/Login/logado.php", array());

		?>

		<?php
		echo $content;
		?>

	</div>

	<footer>
		<div class="container">
			<div class="row ">
				<div class="panel-footer "><span class="text-muted col-sm-offset-1">Todos os direitos reservados a Yago Gomes.</span></div>
			</div>
		</div>
	</footer>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/template/Layouts/js/bootstrap.js"></script>
</body>
</html>
