<div class="page-header" style="margin-top: -15px">
  <h1 align="center">Carrinho</h1>
</div>



	<table class="table">
		<tr>
			<th>Produto</th>
			<th class="hidden-xs">Descrição</th>
			<th>Valor</th>
			<th>Qntd.</th>
			<th></th>
		</tr>

	<?php if(!isset($_SESSION['carrinho']) or empty($_SESSION['carrinho'])):?>
		<tbody>
			<tr>
				<td align="center" colspan="5">
					<p>Seu carrinho está vazio no momento. :(</p>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
		else:
			echo '<tbody>';
			foreach($_SESSION['carrinho'] as $id => $qnt):
				$row = $Carrinho->getProdutoById($id);
	?>
		<tr>
			<td><?php echo $row[0]['nome_produto'];?></td>
			<td class="hidden-xs"><?php echo $row[0]['descricao']; ?></td>
			<td><?php echo $row[0]['valor']; ?></td>
			<td><?php echo $qnt;?></td>
			<td>
				<form action="index.php?page=carrinho" method="POST" name="removerProduto">
					<input type="hidden" name="id_produto" value="<?php echo $id;?>" />
					<input type="hidden" name="removeProduto" value="TRUE" />
					<input type="submit" class="btn btn-default" name="remover" value="Remover" />
				</form>
			</td>
		</tr>

	<?php
		endforeach;
	?>
</tbody>
	</table>
	<form action="index.php?page=carrinho" method="POST" name="confirmarCompra">
		<p align="right">
			<input type="hidden" name="confirma" value="TRUE" />
			<input type="submit" name="confirmaCompra" value="Finalizar compra" class="btn btn-primary"/>
		</p>
	</form>
	<?php
		endif;
	?>
