<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php
			echo ucfirst(Fuseaction);
		?>
	</title>


	<script language="javascript" type="text/javascript" src="src/template/Layouts/functions.js" ></script>
	<link href="../src/template/Layouts/css/bootstrap.css" rel="stylesheet">
	<!--<link rel="stylesheet" href="src/template/Layouts/style.css" type="text/css" media="screen" />-->
	<script language="javascript" type="text/javascript" src="../src/template/Layouts/functions.js" ></script>
	<!--[if lt IE 9]>
	 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<?php
	DefaultController::checkUser();
if(isset($_SESSION['id_usuario'])){ ?>

<body class="container-fluid">
	<nav class="navbar navbar-inverse" >
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
				<div class="header-logo">
					<p>Megatron <span style="font-size: 12px">PAINEL</span></p>
				</div>
				</a>
			</div>

			<ul class="nav navbar-nav navbar-right">
		    	<li><a href="index.php?page=login&action=logout">Logout</a></li>
		      <li><p class="navbar-text">Ola, <?php echo $_SESSION['usuario']; ?></p></li>
		  </ul>
		</div>
	</nav>





<div class="container-fluid">
	<div class="row row-offcanvas row-offcanvas-left">
		<div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="sidebar-nav">
				<ul class="nav">
		    	<li><a href="index.php?page=usuarios">Usuarios</a></li>
		        <li><a href="index.php?page=categorias">Categorias</a></li>
		        <li><a href="index.php?page=produtos">Produtos</a></li>
		    </ul>
			</div>
		</div>

<?php echo $this->render("src/template/Usuarios/cadastrado.php", array()); ?>
<div class="col-xs-12 col-sm-9">
<?php


				if(MsgHandler::getError()){
					foreach(MsgHandler::getError() as $erro){
						echo '<div class="alert alert-danger" role="alert">'.$erro.'</div>';
					}
				}elseif(MsgHandler::getSucess()){
					foreach(MsgHandler::getSucess() as $sucess){
						echo '<div class="alert alert-success" role="alert">>'.$sucess.'</div>';
					}
				}

				echo $content;

    		?>
</div>
</div>
</div>
<?php }else{

	if(MsgHandler::getError()){
					foreach(MsgHandler::getError() as $erro){
						echo '<p class="error" align="center">'.$erro.'</p>';
					}
				}elseif(MsgHandler::getSucess()){
					foreach(MsgHandler::getSucess() as $sucess){
						echo '<p class="sucess" align="center">'.$sucess.'</p>';
					}
				}

	echo $content;

} ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../src/template/Layouts/js/bootstrap.js"></script>

</body>
</html>
