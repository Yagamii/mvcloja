<div class="page-header" style="margin-top: -15px">
  <h1 align="center">Últimos produtos</h1>
</div>
<?php
foreach($produtos as $v):
?>
<div class="col-sm-6 col-md-3" style="height: 490px">
  <div class="thumbnail">
    <img style="width:220px; height:220px" src="src/template/Includes/thumb/<?php echo $v['thumb']; ?>" alt="<?php echo $v['nome_produto'];?>"/>
    <div class="caption">
      <h3><a href="index.php?page=produto&id=<?php echo $v['id_produto']; ?>" ><?php echo $v['nome_produto']; ?></a></h3>
      <p class="desc-produto"><?php echo $v['descricao']; ?> </p>
      <div align="right">
        <span class="btn btn-default">R$<?php echo $v['valor']; ?></span> <a href="index.php?page=produto&id=<?php echo $v['id_produto']; ?>" class="btn btn-primary" role="button">Ver</a>
      </div>
    </div>
  </div>
</div>

<?php
endforeach;
?>
