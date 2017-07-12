<form name="login" action="index.php?page=login" method="POST">

<div class="container" style="padding-top: 250px">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Login</h4>
            <input type="text" id="userName" name="usuario" class="form-control input-sm chat-input" placeholder="Usuario" />
            </br>
            <input type="password" id="userPassword" name="pass" class="form-control input-sm chat-input" placeholder="Senha" />
            </br>
            <div class="wrapper">
            <span class="group-btn">
							<input type="hidden" name="logarUser" value="TRUE" />
                <button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
            </span>
            </div>
            </div>

        </div>
    </div>
</div>
</form>
