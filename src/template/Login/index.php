<div class="page-header" style="margin-top: -15px">
	<h1 align="center"> Login </h1>
</div>

	<form action="index.php?page=login" class="form-horizontal" name="login" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2 col-sm-offset-3" for="user">Login:</label>
			<div class="col-sm-3">
				<input type="text" name="user" class="form-control" />
			</div>
		</div>

		<div class="form-group">
			<label style="margin-top: -7px" class="control-label col-sm-2 col-sm-offset-3" for="pass">Senha:</label>
			<div class="col-sm-3">
				<input type="password" name="pass" style="margin-top: -7px" class="form-control" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-5 col-sm-2 col-xs-offset-4">
				<input type="hidden" name="logando" value="TRUE" />
				<button class="btn btn-primary" type="submit" name="login"/>Login</button>
			</div>
		</div>

	</form>
