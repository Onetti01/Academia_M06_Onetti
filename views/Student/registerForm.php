<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrate</title>
</head>

<body>
    <div class="center-contenedor-login">
        <div class="contenedor-login">
            <h2 class="login-header">Registrate en nuestra academia INFO BDN</h2>
            <form action="index.php?controller=student&action=registerStudent" class="login" method="POST" enctype="multipart/form-data">
                <input type="text" required="required" name="email" placeholder="Cuenta Mail" />
                <input type="password" required="required" name="password" placeholder="Password" />
                <input type="text" required="required" name="nombre" placeholder="Nombre" />
                <input type="text" required="required" name="apellidos" placeholder="Apellidos" />
                <input type="text" required="required" name="dni" placeholder="DNI" />
                <input type="text" required="required" name="edad" placeholder="Edad" />
                Añade una foto:<input type="file" name="foto" />
                <button type="submit" class="btn">Aceptar</button>
                <a href="index.php" class="btn">volver al login</a>
                </a>
            </form>
        </div>
    </div>
    </div>
</body>

</html>