<?php
if (isset($_SESSION['administrador'])) :
?>

    <aside>
        <h3>Gestión profesores</h3>
        <ul type="lista">
            <li><a class="boton-admin" href="index.php?controller=teacher&action=teacherManage">Gestión Professor</a></li>
            <li><a class="boton-admin" href="index.php?controller=course&action=courseManage">Gestión Cursos</a></li>
            <li><a class="boton-admin" href="index.php?controller=student&action=importStudents">Importar Alumnos</a></li>
            <li><a href="index.php?controller=admin&action=logOut">Cerrar session</a></li>
        </ul>
    </aside>

    <body class="container-gestion">
        <script>
            document.title = "Gestión Profesores"
        </script>

        <div class="menu-gestion">
            <a class="boton-personalizado" href="index.php?controller=teacher&action=addTeacher">Añadir profesor</a>
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <section class="tabla">
            <form class="d-flex" action="index.php?controller=teacher&action=teacherManage" method="POST">
                <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda" />
            </form>
            <table class="content-table">
                <thead>
                    <tr>
                        <td>DNI</td>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Titulo</td>
                        <td>Foto</td>
                        <td>Editar</td>
                        <td>Actividad</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res) :
                        while ($row = $res->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo ($row["DNI"]); ?></td>
                                <td><?php echo ($row["nombre"]); ?></td>
                                <td><?php echo ($row["apellidos"]); ?></td>
                                <td><?php echo ($row["titulo"]); ?></td>
                                <td><img width="100" class="imagen_tabla" src=<?php echo ("assets/img/" . $row["foto"]); ?>></img></td>
                                <td><a href=<?php echo ("index.php?controller=admin&action=editTeacher&dni=" . $row['DNI']); ?>><img src="assets/img/img_iconos/libreta_icono.svg" alt="editar"></a></td>
                                <?php if ($row['actiu'] == 1) : ?>
                                    <td><a href=<?php echo ("index.php?controller=teacher&action=teacherManage&dni=" . $row['DNI'] . "&actiu=0"); ?>><img src="assets/img/img_iconos/tick.svg" alt="habilitar"></a></td>
                                <?php else : ?>
                                    <td><a href=<?php echo ("index.php?controller=teacher&action=teacherManage&dni=" . $row['DNI'] . "&actiu=1"); ?>><img src="assets/img/img_iconos/x.svg" alt="deshabilitar"></a></td>
                                <?php endif ?>
                            </tr>
                        <?php endwhile ?>
                </tbody>
            </table>
        </section>
    <?php endif ?>

    </body>

<?php endif ?>