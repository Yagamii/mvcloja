<div class="page-header" style="margin-top: -15px">
	<h1 align="center"><?php echo $dadosProduto[0]['nome_produto'];?></h1>
</div>

	<div class="media col-sm-offset-2">
		<div class="media-left media-top">
			<img src="src/template/Includes/thumb/<?php echo $dadosProduto[0]['thumb'];?>" width="330px" height="400px"/>
		</div>
		<div class="media-body">
			<p class="col-sm-7 col-sm-offset-1" style="font-size: 38px; color: green; font-weight: bold; font-family:  Arial, Helvetica, Verdana, sans-serif;">R$ <?php echo $dadosProduto[0]['valor'];?></p>

			<form action="index.php?page=produto&id=<?php echo $_GET['id']; ?>" method="post" name="adicionaraocarinho">
			<?php if($quantidade[0]['estoque'] > '0'):?>
				<div class="col-sm-8">
				<label style="margin-left: 50px;">Quantidade: </label>
			 		<input type="number" name="quantidade" value="1" min="1" max="<?php echo $quantidade[0]['estoque'];?>" style="width: 40px; height: 30px" />
					<input type="hidden" name="addCarrinho" value="TRUE" />
					 <button type="submit" style="margin-left: 4px" name="adicionar" class="btn btn-success">+Carrinho</button>

				</div>
			<?php else: ?>
					<p align="center" style="font-size: 24px; color: red; font-weight: bold" >Produto fora de estoque</p>
			<?php endif; ?>
			</form>
		</div>
	</div>

	<div class="page-header">
		<h2 align="center">Descrição</h2>
	</div>
<?php echo '<p align="center">'. $dadosProduto[0]['descricao'].'</p>'; ?>

	<div class="col-sm-10 col-sm-offset-1">
		<div class="page-header">
		<h2 align="center" style="padding-bottom: 15px">Comentários</h2>
	</div>
		<?php if(empty($comentario)):?>
			<p style="text-align: center; margin-bottom: 5px; color: brown">
				Nenhum comentário até agora. Seja o primeiro a comentar logo abaixo. :D
			</p>
		<?php else: ?>
		<?php foreach($comentario as $key => $value): ?>
			<p><?php echo '<b>'.$value['usuario'].'</b> em '.$value['data']; ?>:</p>
			<p style="padding-left: 50px; padding-bottom: 10px; margin-top: -10px"><?php echo $value['mensagem'];?></p>
			<?php if(@$_SESSION['id_nivel'] > 2): ?>
			<p style="border-bottom: 1px grey dashed;margin-top: -20px; text-align: right; padding-bottom: 12px">
				<a class="btn btn-primary" href="index.php?page=produto&action=delcomentario&id=<?php echo $_GET['id'];?>&cid=<?php echo $value['id_comentario'];?>" onclick="return confirm('Deseja apagar o comentario \'<?php echo $value['mensagem'];?>\'?');">Apagar comentário
				</a>
			</p>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>


	<div class="col-sm-10 col-sm-offset-1">
		<?php if(isset($_SESSION['id_usuario'])): ?>
		<form action="index.php?page=produto&id=<?php echo $_GET['id'];?>" name="formComentar" method="POST">
			<div class="form-group">
				<h2 class="" style="padding-top: 10px; margin-top: 5px">Comentar:</h2>
				<label for="logado">Logado como: <?php echo $_SESSION['usuario']; ?></label>
				<p><textarea class="form-control" rows="3" style="resize: vertical;" name="comentario"></textarea></p>
			</div>
		<p align="center">
			<input type="hidden" name="addcomentario" value="TRUE" />
			<button type="submit" name="comentar" class="btn btn-default">Comentar</button>
		</p>
		</form>
		<?php else: ?>
			<h2 style="border-top: 1px solid grey; padding-top: 10px; margin-top: 5px">Comentar:</h2>
			<p>Você não esta logado no momento, faça seu <a href="index.php?page=login">login.</a></p>
			<p>Caso não tenha uma conta criada, <a href="index.php?page=cadastro">cadastre-se aqui.</a></p>
		<?php endif; ?>
	</div>
