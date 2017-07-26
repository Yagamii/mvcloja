<div class="content-fluid">
	<div class="col-sm-4 well" >
    		<h2 align="center">Adicionar Administrador</h2>
        <form name="addadmin" class="form-horizontal" action="index.php?page=usuarios" method="post">

					<div class="form-group">
							<label class="control-label col-sm-4" for="nome">Nome:</label>
							<div class="col-sm-6">
								<input type="text" name="nome" class="form-control" id="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" placeholder="Nome"/>
							</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" for="sobrenome">Sobrenome:</label>
						<div class="col-sm-6">
							<input type="text" name="sobrenome" class="form-control" id="sobrenome" value="<?php if(isset($_POST['sobrenome'])) echo $_POST['sobrenome']; ?>" placeholder="Sobrenome"/>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" for="usuario">Usuario:</label>
						<div class="col-sm-6">
							<input type="text" name="usuario" class="form-control" id="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" placeholder="Usuario" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" for="email">Email:</label>
						<div class="col-sm-6">
							<input type="text" name="email" class="form-control" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" for="senha">Senha:</label>
						<div class="col-sm-6">
							<input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<input type="hidden" name="cadastrar" value="TRUE" />
							<button type="submit" class="btn btn-default" name="cadastro">Registrar</button>
						</div>
					</div>

        </form>
    </div>
    <div class="col-sm-8 table-responsive well">
    	<h1 align="center">Usuarios</h1>
        <table class="table table-hover" style="margin: 0 auto; width: 100%">
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
    <div class="col-sm-5 well">
    	<h1 align="center">Estatisticas</h1>
        <p>Comuns: <?php echo $CountUsuarios[0]['quantidade']; ?></p>
        <p>Vendedores: <?php echo $CountVendors[0]['quantidade']; ?></p>
        <p>Administradores: <?php echo $CountAdmins[0]['quantidade']; ?></p><br/>
    </div>
</div>
