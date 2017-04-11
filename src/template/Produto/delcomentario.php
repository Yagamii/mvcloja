<h1 align="center">Deletar comentário</h1>
<form action="index.php?page=produto&action=delcomentario&id=<?php echo $_GET['id']; ?>&cid=<?php echo $_GET['cid']; ?>" name="delcomentario" method="POST">
	<p align="center">Tem certeza que deseja apagar o comentário de <b><?php echo $comentario[0]['usuario']; ?></b>?</p>
	<p align="center">"<?php echo $comentario[0]['mensagem'];?>"</p>
	
	<p align="center">
		<input type="hidden" name="deletar" value="TRUE" />
		<input type="submit" name="del" value="Apagar!" />
	</p>
</form>