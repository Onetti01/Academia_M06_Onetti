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
            document.title = 'Nuevo Curso'
        </script>
        <div class="menu-gestion">
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <section class="tabla">
            <div class="contenedor-login">
                <h2 class="login-header">Añadir cursos</h2>
                <form action="index.php?controller=course&action=addCourse" class="login" method="POST">
                    Codigo: <input type="text" required="required" name="codigo" />
                    Nombre: <input type="text" required="required" name="nombre" />
                    Descripción: <input type="name" required="required" name="descripcion" />
                    Horas Totales: <input type="name" required="required" name="hora_total" />
                    Fecha inicio:<input type="date" name="fecha_inicio" id="fecha" required min=<?php $hoy = date("Y-m-d");
                                                                                                echo $hoy; ?> />
                    Fecha final:<input type="date" name="fecha_final" id="fecha" required min=<?php $hoy = date("Y-m-d");
                                                                                                echo $hoy; ?> />
                    DNI Profesor: <input type="text" required="required" name="DNI_profesor" />
                    <button class="btn" type="submit">Aceptar</button>
                    </a>
                </form>
            </div>
        </section>
    </body>
<?php endif ?>