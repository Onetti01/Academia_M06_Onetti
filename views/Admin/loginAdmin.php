<body>
    <script>
        document.title = "Login Administrador"
    </script>
    <div class="center-contenedor-login">
        <div class="contenedor-login">
            <img class="login_logo" src="assets/img/img_iconos/usuario_logo.svg" />
            <form action="index.php?controller=admin&action=login" class="login" method="POST">
                <input type="text" title="text" required="required" name="usuario" placeholder="usuario" />
                <input type="password" title="password" required="required" name="password" placeholder="password" />
                <button type="submit" class="btn">Login</button>
                </a>
            </form>
        </div>
    </div>
</body>