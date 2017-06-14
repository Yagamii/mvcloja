<div class="page-header" style="margin-top: -15px">
  <h1 align="center">Promoções</h1>
</div>
<?php
foreach($promocoes as $value):
?>
<div class="col-sm-6 col-md-3" style="height: 490px">
  <div class="thumbnail">
    <img style="width:220px; height:220px" src="src/template/Includes/thumb/<?php echo $value['thumb'];?>" alt="<?php echo $value['nome_produto'];?>" >
    <div class="caption">
      <h3><a href="index.php?page=produto&id=<?php echo $value['id_produto'];?>"><?php echo $value['nome_produto'];?></a></h3>
      <p><?php echo $value['descricao'];?></p>
      <div align="right">
        <span class="btn btn-default" style="color: green; font-weight: bold">R$<?php echo $value['valor'];?></span>
      </div>
    </div>
  </div>
</div>

<?php
endforeach;
?>
