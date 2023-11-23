<?php
//verificamos que la sesion sea de administracion
if (isset($_SESSION['administrador'])) :
?>
    <aside>
        <h3>Importar Alumnos</h3>
        <ul type="lista">
            <li><a class="boton-admin" href="index.php?controller=teacher&action=teacherManage">Gestión Professor</a></li>
            <li><a class="boton-admin" href="index.php?controller=course&action=courseManage">Gestión Cursos</a></li>
            <li><a class="boton-admin" href="index.php?controller=student&action=importStudents">Importar Alumnos</a></li>
            <li><a href="index.php?controller=admin&action=logOut">Cerrar session</a></li>
        </ul>
    </aside>

    <body class="container-gestion">
        <script src="assets/scripts/importStudents.js"></script>
        <script>
            document.title = "Importar Alumnos"
        </script>
        <div class="menu-gestion" id="menu-gestion-btns">
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <section class="tabla">

            <div class="contenedor-login" id="form-import-students">
                <h2 class="login-header">Importar Alumnos</h2>
                <!-- mostramos el formulario que pide el archivo csv -->
                <form class="login">
                    <label for="file">
                        Selecciona un archivo que contenga estudiantes (CSV):
                    </label>
                    <input type="file" name="file" id="file" onchange="importStudents(event)">
                </form>
            </div>
        </section>
    </body>
<?php endif ?>