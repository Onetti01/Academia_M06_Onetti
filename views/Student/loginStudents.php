<!DOCTYPE html>
<html lang="en">
<head><title>Inicio sesion</title></head>
<body>
    <div class="center-contenedor-login">
        <div class="contenedor-login-img">
        </div>
        <div class="contenedor-login">
            <img class="login_logo" src="assets/img/img_iconos/usuario_logo.svg" />
            <form class="login" action="index.php?controller=student&action=login" method="POST">
                <input type="text" title="mail" required="required" name="email" placeholder="email" />
                <input type="password" title="username" required="required" name="password" placeholder="password" />
                <button onclick="window.location.href='index.php?controller=teacher&action=showLogin'" class="btn">Profesor</button>
                <button type="submit" class="btn">Login</button>
                <button onclick="window.location.href='index.php?controller=student&action=registerStudent'" class="btn">Registrarse</button>
            </form>
        </div>
    </div>
    </div>
</body>
<footer>
    <p><a href="index.php?controller=admin&action=showLogin">administrador</a></p>
</footer>

</html>