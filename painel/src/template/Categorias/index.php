<div class="content-border">
	<div class="col-sm-5 well">
		<h1 align="center">Adicionar categoria</h1>
			<form action="index.php?page=categorias" class="form-horizontal" method="POST" name="addcategoria">
				<div class="form-group">
					<label class="control-label col-sm-offset-1 col-sm-2" for="categoria">Nome: </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="categoria" id="categoria" value="<?php if(isset($_POST['categoria'])) echo $_POST['categoria'];?>" placeholder="Categoria"/>
					</div>
				</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<input type="hidden" name="adicionar" value="TRUE" />
							<button type="submit" class="btn btn-default" onclick="return alert('Categoria adicionada com sucesso.')" name="addcat">Adicionar</button>
						</div>
					</div>
			</form>
	</div>
	<div class="col-sm-6 col-sm-offset-1 well">
		<h1 align="center">Categorias</h1>

		<table class="table table-hover" style="margin: 0 auto; width: 70%">
			<tr>
				<th>Nome</th>
				<th>Editar</th>
				<th>Apagar</th>
			</tr>
			<?php foreach($categorias as $key): ?>
				<tr>
					<td>
						<?php echo $key['categoria'];?>
					</td>
					<td>
						<a href="index.php?page=categorias&action=editar&id=<?php echo $key['id_categoria'];?>" title="Apagar <?php echo $key['categoria'];?>">
              <img src="src/template/Includes/icone-editar.png" width="18" height="18" />
            </a>
					</td>
					<td>
						<a href="index.php?page=categorias&action=deletar&id=<?php echo $key['id_categoria'];?>" onclick="return confirm('Tem certeza que deseja excluir a categoria: \'<?php echo $key['categoria'];?>\'?')" title="Apagar <?php echo $key['categoria'];?>">
              <img src="src/template/Includes/icone-apagar.png" width="18" height="18"/>
            </a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
