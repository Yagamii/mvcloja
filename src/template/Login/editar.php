<div class="page-header" style="margin-top: -15px">
	<h1 align="center">Editar dados</h1>
</div>

<form name="editar" class="form-horizontal" action="index.php?page=login&action=editar&id=<?php echo $_GET['id']; ?>" method="post">
	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="nome">Nome:</label>
		<div class="col-sm-4">
			<input type="text" name="nome" class="form-control" id="nome" value="<?php echo $dados[0]['nome'];?>" placeholder="Nome"/>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="sobrenome">Sobrenome:</label>
		<div class="col-sm-4">
			<input type="text" name="sobrenome" class="form-control" id="sobrenome" value="<?php echo $dados[0]['sobrenome']; ?>" placeholder="Sobrenome"/>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="usuario">Usuário:</label>
		<div class="col-sm-4">
			<input type="text" name="usuario" disabled class="form-control" id="usuario" value="<?php echo $dados[0]['usuario'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="email">Email:</label>
		<div class="col-sm-4">
			<input type="text" name="email" class="form-control" id="email" value="<?php echo $dados[0]['email'];?>" placeholder="Email"/>
		</div>
	</div>

	<div class="page-header">
		<h3 align="center">Alterar senha(Não obrigatório)</h3>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="senha">Senha:</label>
		<div class="col-sm-4">
			<input type="password" name="senha" class="form-control" id="senha" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2 col-sm-offset-2" for="csenha">Confirmação:</label>
		<div class="col-sm-4">
			<input type="password" name="csenha" class="form-control" id="csenha" />
		</div>
	</div>
<br/>
	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-4 col-xs-offset-4">
			<input type="hidden" name="editarUsuario" value="TRUE" />
			<button type="submit" class="btn btn-primary" name="editar">Alterar dados!</button>
		</div>
	</div>

</form>
