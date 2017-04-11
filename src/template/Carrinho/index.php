<h1 align="center">Carrinho</h1>
	<br/>
	<table width="100%">
		<tr>
			<th>Produto</th>
			<th>Descrição</th>
			<th>Valor</th>
			<th>Quantidade</th>
			<th></th>
		</tr>
	
	<?php if(!isset($_SESSION['carrinho']) or empty($_SESSION['carrinho'])):?>
		<tr>
			<td colspan="5"><p>Seu carrinho está vazio no momento. :(</p></td>
		</tr>
	</table>
	<?php 
		else:
			foreach($_SESSION['carrinho'] as $id => $qnt):
				$row = $Carrinho->getProdutoById($id);
	?>
		<tr>
			<td id="carrinho-produtos"><?php echo $row[0]['nome_produto'];?></td>
			<td id="carrinho-produtos"><?php echo $row[0]['descricao']; ?></td>
			<td id="carrinho-produtos"<?php echo $row[0]['valor']; ?></td>
			<td id="carrinho-produtos"><?php echo $qnt;?></td>
			<td id="carrinho-produtos">
				<form action="index.php?page=carrinho" method="POST" name="removerProduto">
					<input type="hidden" name="id_produto" value="<?php echo $id;?>" />
					<input type="hidden" name="removeProduto" value="TRUE" />
					<input type="submit" name="remover" value="Remover" />
				</form>
			</td>
		</tr>
	<?php 
		endforeach;
	?>
	</table>
	<form action="index.php?page=carrinho" method="POST" name="confirmarCompra">
		<p align="right">
			<input type="hidden" name="confirma" value="TRUE" />
			<input type="submit" name="confirmaCompra" value="Finalizar compra" style="padding: 5px 5px; border-radius: 5px 5px 5px 5px"/>
		</p>
	</form>
	<?php
		endif;
	?>
	
	
