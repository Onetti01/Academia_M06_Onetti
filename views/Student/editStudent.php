<?php
if (isset($_SESSION['alumnos'])) :
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>editar alumno</title>
    </head>

    <body>
        <div class="center-contenedor-login">
            <div class="contenedor-login">
                <h2 class="login-header">Editar alumno</h2>
                <form action="index.php?controller=student&action=editStudent" class="login" method="POST">
                    Email: <input readonly type="text" required="required" name="email" value="<?php echo $alum['email'] ?>" /><br></br>
                    Nombre: <input type="text" required="required" name="nombre" value="<?php echo $alum['nombre'] ?>" /><br></br>
                    Apellidos: <input type="text" required="required" name="apellidos" value="<?php echo $alum['apellidos'] ?>" /><br></br>
                    <p><button type='submit'>Modificar</button></p>
                    </a>
                </form>
            </div>
        </div>
        </div>
    </body>

    </html>
<?php
endif
?>