<div class="content-border">
	<div class="content">
		<h1>Adicionar categoria</h1>
			<form action="index.php?page=categorias" method="POST" name="addcategoria">
				<br/>
				<label>Nome: </label><input type="text" name="categoria" />
				<br/><br/>
				<input type="hidden" name="adicionar" value="TRUE" />
				<input type="submit" onclick="return alert('Categoria adicionada com sucesso.')" name="addcat" value="Adicionar" />
				<br/><br/>
			</form>
	</div>
	<div class="content">
		<h1>Categorias</h1>
		<br/>
		<table style="margin: 0 auto; width: 70%">
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
						<a href="index.php?page=categorias&action=editar&id=<?php echo $key['id_categoria'];?>">
              <img src="src/template/Includes/icone-editar.png" width="18" height="18" />
            </a>
					</td>
					<td>
						<a href="index.php?page=categorias&action=deletar&id=<?php echo $key['id_categoria'];?>" onclick="return confirm('Tem certeza que deseja excluir a Categoria?')">
              <img src="src/template/Includes/icone-apagar.png" width="18" height="18"/>
            </a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
