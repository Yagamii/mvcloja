<div class="content-fluid">
	<div class="col-sm-5 well">
		<h1 align="center">Adicionar produto</h1>
		<form action="index.php?page=produtos" class="form-horizontal" enctype="multipart/form-data" method="POST" name="adicionarProduto">

			<div class="form-group">
				<label class="control-label col-sm-3" for="nome">Nome:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nome" id="nome" value="<?php if(isset($_POST['nome']))echo $_POST['nome'];?>" placeholder="Nome"/>
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="descricao">Descrição:</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="descricao" id="descricao" rows="5" placeholder="Descrição"><?php if(isset($_POST['descricao']))echo $_POST['descricao'];?></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="categoria">Categoria:</label>
				<div class="col-sm-8">
					<select name="categoria" id="categoria" class="form-control">
					<?php foreach($categorias as $key): ?>
						<option value="<?php echo $key['id_categoria'];?>"><?php echo $key['categoria'];?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3">Valor(R$):</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" name="valor" id="valor" value="<?php if(isset($_POST['valor']))echo $_POST['valor'];?>" placeholder="Valor"/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3">Quantidade:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php if(isset($_POST['quantidade']))echo $_POST['quantidade'];?>" placeholder="Quantidade"/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3">Imagem:</label>
				<div class="col-sm-8">
					<input type="hidden" name="MAX_FILE_SIZE" value="500000" />
					<label class="btn btn-default btn-file">
							Upload... <input type="file" name="imagem" style="display: none;">
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-4">
					<input type="hidden" name="addProduto" value="TRUE" />
					<button type="submit" class="btn btn-default" name="add">Adicionar</button>
				</div>
			</div>
		</form>
	</div>

	<div class="col-sm-6 col-sm-offset-1 well">
		<h1 align="center">Produtos</h1>
		<br/>
		<table class="table table-hover" style="margin: 0 auto; width: 100%">
			<tr>
				<th>Nome</th>
				<th>Categoria</th>
				<th>Valor</th>
				<th>Estoque</th>
				<th>Editar</th>
				<th>Apagar</th>
			</tr>
			<?php foreach($produtos as $row): ?>
				<tr>
					<td><?php echo $row['nome_produto']; ?></td>
					<td><?php echo $row['categoria']; ?></td>
					<td><?php echo 'R$' .$row['valor'];?></td>
					<td><?php echo $row['estoque'];?></td>
					<td>
						<a href="index.php?page=produtos&action=editar&id=<?php echo $row['id_produto'];?>" title="Apagar <?php echo $row['nome_produto'];?>">
							<img src="src/template/Includes/icone-editar.png" width="18" height="18" />
						</a>
					</td>
					<td>
						<a href="index.php?page=produtos&action=apagar&id=<?php echo $row['id_produto'];?>" onclick="return confirm('Tem certeza que deseja excluir o produto: \'<?php echo $row['nome_produto'];?>\'?')" title="Apagar <?php echo $row['nome_produto'];?>">
							<img src="src/template/Includes/icone-apagar.png" width="18" height="18"/>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>

	<div class="col-sm-4 col-sm-offset-1 well">
		<h1>Estatisticas</h1>

		<?php
		//O while é utilizado para apresentar o nome das categorias, enquanto a função dentro dele faz a contagem de produtos contidos na categoria
		foreach($categorias as $key):
			//Recebe a quantidade de produtos contidos na categoria, utilizando a função countCategoria e passando pra ela o id da categoria
			$getCount = $categoriasQuantidades->getCountById($key['id_categoria']);

      $count = $getCount[0]['quantidade'];
			//Exibe o nome da categoria e a quantidade de produtos nela
			echo '<p>'.$key['categoria'] . ': <b>'. $count.'</b></p>';
			//Variavel para armazenas a quantidade total de produtos cadastrados
			@$total += $count;
		endforeach;
			echo '<p>Total: <b>'. $total .'</b></p>'?>
	</div>
</div>
