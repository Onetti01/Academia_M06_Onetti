<?php
if (isset($_SESSION['administrador'])) :
?>
    <aside>
        <h3>Añadir cursos</h3>
        <ul type="lista">
            <li><a class="boton-admin" href="index.php?controller=teacher&action=teacherManage">Gestión Professor</a></li>
            <li><a class="boton-admin" href="index.php?controller=course&action=courseManage">Gestión Cursos</a></li>
            <li><a class="boton-admin" href="index.php?controller=student&action=importStudents">Importar Alumnos</a></li>
            <li><a href="index.php?controller=admin&action=logOut">Cerrar session</a></li>
        </ul>
    </aside>


    <body class="container-gestion">
        <script>
            document.title = 'Nuevo Profesor'
        </script>
        <div class="menu-gestion">
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <section class="tabla">
            <div class="contenedor-login">
                <h2 class="login-header">Añadir profesor</h2>
                <form action="index.php?controller=teacher&action=addTeacher" class="login" method="POST" action="upload.php" enctype="multipart/form-data">
                    DNI: <input type="mail" required="required" name="DNI" />
                    Password: <input type="password" required="required" name="password" />
                    Nombre: <input type="name" required="required" name="nombre" />
                    Apellidos <input type="name" required="required" name="apellidos" />
                    Titulo Academico: <input type="text" required="required" name="titulo" />
                    Añade una foto:<input type="file" name="foto" />
                    <button class="btn" type="submit">Aceptar</button>
                    </a>
                </form>
        </section>
    </body>
<?php endif ?>