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
            document.title = 'Editar Curso'
        </script>
        <div class="menu-gestion">
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <section class="tabla">
            <div class="contenedor-login">
                <h2 class="login-header">Editar cursos</h2>
                <form action="index.php?controller=admin&action=editCourse" class="login" method="POST">
                    Codigo: <input readonly type="text" name="codigo" value="<?php echo $curso['codigo'] ?>" />
                    Nombre: <input type="text" required="required" name="nombre" name="codigo" value="<?php echo $curso['nombre'] ?>" />
                    Descripción: <input type="name" required="required" name="descripcion" name="codigo" value="<?php echo $curso['descripcion'] ?>" />
                    Horas Totales: <input type="name" required="required" name="hora_total" name="codigo" value="<?php echo $curso['hora_total'] ?>" />
                    Fecha Inicio: <input type="date" required="required" name="fecha_inicio" name="codigo" value="<?php echo $curso['fecha_inicio'] ?>" />
                    Fecha Fin: <input type="date" required="required" name="fecha_final" name="codigo" value="<?php echo $curso['fecha_final'] ?>" />
                    DNI Profesor: <input type="text" required="required" name="DNI_profesor" name="codigo" value="<?php echo $curso['DNI_profesor'] ?>" />
                    <p><button type='submit'>Modificar</button></p>
                    </a>
                </form>
            </div>
        </section>
    </body>
<?php endif ?>