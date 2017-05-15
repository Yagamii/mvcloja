<div class="content-border">
	<div class="content">
    	<h1>Adicionar Administrador</h1>
        <form name="addadmin" action="index.php?page=usuarios" method="post">
        	<br/>
            <label>Nome:</label><input type="text" name="nome" /><br/><br/>
            <label style="margin-left: -30px">Sobrenome:</label><input type="text" name="sobrenome" /><br/><br/>
        	<label style="margin-left: -10px">Usuario: </label><input type="text" name="usuario" /><br/><br/>
            <label style="margin-left: 4px">Email:</label><input type="text" name="email" /><br/><br/>
        	<label>Senha: </label><input type="password" name="senha" />
            <br/><br/>
            <input type="hidden" name="cadastrar" value="TRUE" />
            <input type="submit" name="cadastro" value="Registrar" />
            <br/><br/>
        </form>
    </div>
    <div class="content">
    	<h1>Usuarios</h1>
        <table style="margin: 0 auto; width: 100%">
        <tr>
        	<th>Nome</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Registro</th>
            <th>Função</th>
            <th>Editar</th>
            <th>Apagar</th>
        </tr>
        <?php foreach($Usuarios as $key): ?>
        	<tr>
            	<td><?php echo $key['nome']; ?></td>
                <td><?php echo $key['usuario'];?></td>
                <td><?php echo $key['email'];?></td>
                <td><?php echo $key['data'];?></td>
                <td><?php echo $key['nivel']; ?></td>
                <td>
									<a href="index.php?page=usuarios&action=editar&id=<?php echo $key['id_usuario']; ?>" title="Editar <?php echo $key['usuario'];?>">
										<img src="src/template/Includes/icone-editar.png" width="18" height="18"/>
									</a>
								</td>
                <td>
									<a href="index.php?page=usuarios&action=deletar&id=<?php echo $key['id_usuario']; ?>" onclick="return confirm('Tem certeza que deseja excluir o usuario: \'<?php echo $key['usuario'];?>\'?')" title="Apagar <?php echo $key['usuario'];?>">
										<img src="src/template/Includes/icone-apagar.png"  width="18" height="18"/>
									</a>
								</td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
    <div class="content">
    	<h1>Estatisticas</h1>
        <p>Comuns: <?php echo $CountUsuarios[0]['quantidade']; ?></p>
        <p>Vendedores: <?php echo $CountVendors[0]['quantidade']; ?></p>
        <p>Administradores: <?php echo $CountAdmins[0]['quantidade']; ?></p><br/>
    </div>
</div>
