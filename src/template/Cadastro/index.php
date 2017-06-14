<div class="page-header" style="margin-top: -15px">
	<h1 align="center">Cadastro</h1>
</div>

<form name="cadastro" class="form-horizontal" action="index.php?page=cadastro" method="post">
	<div class="form-group">
			<label class="control-label col-sm-2 col-sm-offset-2" for="nome">Nome:</label>
			<div class="col-sm-4">
				<input type="text" name="nome" class="form-control" id="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" placeholder="Nome"/>
			</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="sobrenome">Sobrenome:</label>
		<div class="col-sm-4">
			<input type="text" name="sobrenome" class="form-control" id="sobrenome" value="<?php if(isset($_POST['sobrenome'])) echo $_POST['sobrenome'];?>" placeholder="Sobrenome"/>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="usuario">Usuário:</label>
		<div class="col-sm-4">
			<input type="text" name="usuario" class="form-control" id="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" placeholder="Usuário"/>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="email">Email:</label>
		<div class="col-sm-4">
			<input type="email" name="email" class="form-control" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email"/>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="senha">Senha:</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" name="senha" placeholder="Senha" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="confirmsenha">Confirmação:</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" name="confirmsenha" placeholder="Confirmação" />
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4 col-xs-offset-4">
			<input type="hidden" name="cadastrar" value="TRUE" />
			<button type="submit" class="btn btn-default" name="cadastro">Cadastrar</button>
		</div>
	</div>

</form>
