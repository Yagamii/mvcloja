<div class="content-border">
	<div class="content-user">
    	<h1>Editar usuário</h1>
        <form action="index.php?page=usuarios&action=editar&id=<?php echo $_GET['id'];?>" name="editUsuario" method="post">
        <br/>
        <label>Nome:</label><input type="text" name="nome" value="<?php echo $infos[0]['nome']; ?>" /><br/><br/>
        <label style="margin-left: -32px">Sobrenome:</label><input type="text" name="sobrenome" value="<?php echo $infos[0]['sobrenome']; ?>" /><br/><br/>
        <label>Email:</label><input type="text" name="email" value="<?php echo $infos[0]['email']; ?>" /><br/><br/>
        <label style="margin-left: -10px">Usuário:</label><input type="text" name="usuario" value="<?php echo $infos[0]['usuario']; ?>" /><br/><br/>
        <label style="margin-left: -78px">Função:</label><select name="nivel">
        						<option></option>
        						<?php foreach($niveis as $key):
                                	if($infos[0]['id_nivel'] == $key['id_nivel']){
										                          echo '<option selected value="'.$infos[0]['id_nivel'].'">'.$key['nivel'].'</option>';
									                }else{
										                          echo '<option value="'.$key['id_nivel'].'">'.$key['nivel'].'</option>';
									                }
                          endforeach; ?>
        					  </select><br/><br/>
        <input type="hidden" name="alterar" value="TRUE" />
        <input type="submit" name="alter" value="Editar" /><br/><br/>
        </form>
    </div>
</div>
