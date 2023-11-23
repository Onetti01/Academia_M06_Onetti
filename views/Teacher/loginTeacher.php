<!DOCTYPE html>
<html lang="en">

<head><title>Login Profesores</title></head>
<body>
    <div class="center-contenedor-login">
        <div class="contenedor-login-img">
        </div>
        <div class="contenedor-login">
            <img class="login_logo" src="assets/img/img_iconos/usuario_logo.svg" />
            <form class="login" action="index.php?controller=teacher&action=login" method="POST">
                <input type="text" title="dni" required="required" name="dni" placeholder="dni" />
                <input type="password" title="password" required="required" name="password" placeholder="password" />
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

    </div>
    </div>
</body>
<footer>
</footer>

</html>