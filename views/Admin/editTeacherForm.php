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
            document.title = 'Editar Profesor'
        </script>
        <div class="menu-gestion">
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <section class="tabla">
            <div class="contenedor-login">
                <h2 class="login-header">Editar profesor</h2>
                <form action="index.php?controller=admin&action=editTeacher" class="login" method="POST">
                    DNI: <input readonly type="text" name="DNI" value="<?php echo $profe['DNI'] ?>" />
                    Nombre: <input type="text" required="required" name="nombre" value="<?php echo $profe['nombre'] ?>" />
                    Titulo Academico: <input type="text" required="required" name="titulo" value="<?php echo $profe['titulo'] ?>" />
                    Fotografía: <input type="text" required="required" name="foto" value="<?php echo $profe['foto'] ?>" />
                    <p><button type='submit'>Modificar</button></p>
                    </a>
                </form>
            </div>
            </div>
        </section>
    </body>
<?php endif ?>