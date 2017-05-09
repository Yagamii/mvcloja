<div class="content-border">
	<div class="content-user">
		<h1>Editar produto</h1>
		<form action="index.php?page=produtos&action=editar&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data" method="POST" name="formEditarProduto">
			<p>
				<label>Nome: </label>
				<input type="text" name="nome" size="58px" value="<?php echo $produto[0]['nome_produto'];?>" />
			</p>
			<p>
				<label style="margin-left: -31px">Descrição: </label>
				<textarea name="descricao" cols="60" rows="6"><?php echo $produto[0]['descricao'];?></textarea>
			</p>
			<p>
				<label style="margin-left: -174px">Categoria: </label>
				<select name="categoria" style="width: 300px; margin-left: 5px">
				<?php foreach($categorias as $key): ?>
					<?php if($key['id_categoria'] === $produto[0]['id_categoria']): ?>
					<option selected value="<?php echo $key['id_categoria'];?>"><?php echo $key['categoria'];?></option>
					<?php else: ?>
					<option value="<?php echo $key['id_categoria'];?>"><?php echo $key['categoria'];?></option>
				<?php 	endif;
              endforeach; ?>
				</select>
			</p>
			<p>
				<label style="margin-left: -287px">Valor(R$): </label>
				<input type="text" name="valor" value="<?php echo $produto[0]['valor']; ?>" />
			</p>
			<p>
				<label style="margin-left: -308px">Quantidade: </label>
				<input type="text" name="quantidade" value="<?php echo $produto[0]['estoque']; ?>" />
			</p>
			<br/>
			<p>
				<img style="border: 1px solid black; border-radius: 5px 5px 5px 5px" src="../src/template/Includes/thumb/<?php echo $produto[0]['thumb']; ?>" width="200px" height="200px" />
			</p>
			<p>
				<label style="margin-left: -50px">Imagem: </label>
				<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
				<input type="file" name="imagem" />
			</p>
			<p>
				<label style="margin-left: -340px">Promoção: </label>
				<?php if($produto[0]['promo'] === '1'): ?>
				      <input type="checkbox" checked name="promo" value="1" />
				<?php else: ?>
				      <input type="checkbox" name="promo" value="1" />
				<?php endif; ?>
			</p>
			<br/>
			<p>
				<input type="hidden" name="editarProduto" value="TRUE" />
				<input type="submit" name="editar" value="Editar" />
			</p>
			<br/>
		</form>
	</div>
</div>
