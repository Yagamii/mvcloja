<h1 align="center"> Login </h1>
<form action="index.php?page=login" name="login" method="post">
	<div class="login-form">
    	<p>Login: <input type="text" name="user" /></p>
        <p>Senha: <input type="password" name="pass" /></p>
        <br/>
        <input type="hidden" name="logando" value="TRUE" />
        <input class="botao-enviar" type="submit" name="login" value="Login" />
    </div>
</form>
