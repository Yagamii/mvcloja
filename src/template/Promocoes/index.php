<h1 align="center">Promoções</h1>
<?php
foreach($promocoes as $v):
?>
<div class="produto-curto">
    	<h3><a href="index.php?page=produto&id=<?php echo $v['id_produto']; ?>" ><?php echo $v['nome_produto']; ?></a></h3>
    	<a href="index.php?page=produto&id=<?php echo $v['id_produto']; ?>" ><img src="src/template/Includes/thumb/<?php echo $v['thumb']; ?>" width="220" height="210"/></a>
        <p class="desc-produto"><?php echo $v['descricao']; ?> </p>
        <div class="valor">R$<?php echo $v['valor']; ?></div>
        <a href="index.php?page=produto&id=<?php echo $v['id_produto']; ?>" ><div class="ver-produto">Ver</div></a>
	</div>
<?php	
endforeach;
?>
