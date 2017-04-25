<div class="content-border">
	<div class="content-user">
		<h1>Editar categoria</h1>
		<br/>
		<form action="index.php?page=categorias&action=editar&id=<?php echo $catInfo[0]['id_categoria'];?>" method="POST" name="editCategoria">
			<label>Nome:</label><input type="text" name="categoria" value="<?php echo $catInfo[0]['categoria'];?>" />
			<br/><br/>
			<input type="hidden" name="editarCategoria" value="TRUE" />
			<input type="submit" name="editar" value="Editar" />
			<br/><br/>
		</form>
	</div>
</div>
