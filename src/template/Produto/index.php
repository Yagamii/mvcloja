
<h1 align="center"><?php echo $dadosProduto[0]['nome_produto'];?></h1>
	<div class="img-produto">
		<img src="src/template/Includes/thumb/<?php echo $dadosProduto[0]['thumb'];?>" width="330px" height="400px"/>
	</div>

	<div class="info-produto">
		<p style="font-size: 38px; color: red; font-weight: bold; font-family:  Arial, Helvetica, Verdana, sans-serif;">R$ <?php echo $dadosProduto[0]['valor'];?></p>
		<br/><br/>
		<form action="index.php?page=produto&id=<?php echo $_GET['id']; ?>" method="post" name="adicionaraocarinho">
		<label style="margin-left: 30px;">Quantidade: </label> <input type="number" name="quantidade" value="1" min="1" style="width: 40px; height: 30px" />
		<input type="hidden" name="addCarrinho" value="TRUE" />
		<input style="width: 100px; height: 34px; font-size: 20px; margin-left: 5px" type="submit" name="adicionar" value="+Carrinho" />
		</form>
	</div>

	<div class="desc-produto-full">
		<h2>Descrição</h2>
		<br/>
		<?php echo $dadosProduto[0]['descricao']; ?>
	</div>

	<div>
		<h2 align="center" style="padding-bottom: 15px">Comentários</h2>
		<?php foreach($comentario as $key => $value): ?>
			<p style="border-top: 1px dashed grey"><?php echo '<b>'.$value['usuario'].'</b> em '.$value['data']; ?>:</p>
			<p style="padding-left: 50px; padding-bottom: 10px; margin-top: -10px"><?php echo $value['mensagem'];?></p>
			<?php if(@$_SESSION['id_nivel'] > 2): ?>
			<p style="margin-top: -20px; text-align: right; padding-bottom: 5px">
				<a href="index.php?page=produto&action=delcomentario&id=<?php echo $_GET['id'];?>&cid=<?php echo $value['id_comentario'];?>" onclick="return confirm('Deseja apagar o comentario \'<?php echo $value['mensagem'];?>\'?');">Apagar comentário
				</a>
			</p>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>

	<div>
		<?php if(isset($_SESSION['id_usuario'])): ?>
		<form action="index.php?page=produto&id=<?php echo $_GET['id'];?>" name="formComentar" method="POST">
		<h2 style="border-top: 1px solid grey; padding-top: 10px; margin-top: 5px">Comentar:</h2>
		<p>Logado como: <?php echo $_SESSION['usuario']; ?></p>
		<p><textarea cols="100" rows="6" name="comentario"></textarea></p>
		<p align="center">
			<input type="hidden" name="addcomentario" value="TRUE" />
			<input type="submit" name="comentar" value="Comentar" />
		</p>
		</form>
		<?php else: ?>
			<h2 style="border-top: 1px solid grey; padding-top: 10px; margin-top: 5px">Comentar:</h2>
			<p>Você não esta logado no momento, faça seu <a href="index.php?page=login">login.</a></p>
			<p>Caso não tenha uma conta criada, <a href="index.php?page=cadastro">cadastre-se aqui.</a></p>
		<?php endif; ?>
	</div>
