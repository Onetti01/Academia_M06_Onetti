<?php
if (isset($_SESSION['administrador'])) :
?>
    <aside>
        <h3>Gestión cursos</h3>
        <ul type="lista">
            <li><a class="boton-admin" href="index.php?controller=teacher&action=teacherManage">Gestión Professor</a></li>
            <li><a class="boton-admin" href="index.php?controller=course&action=courseManage">Gestión Cursos</a></li>
            <li><a class="boton-admin" href="index.php?controller=student&action=importStudents">Importar Alumnos</a></li>
            <li><a href="index.php?controller=admin&action=logOut">Cerrar session</a></li>
        </ul>
    </aside>

    <body class="container-gestion">
        <script>
            document.title = 'Gestión cursos'
        </script>
        <div class="menu-gestion">
            <a class="boton-personalizado" href="index.php?controller=course&action=addCourse">Añadir curso</a>
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <section class="tabla">
            <form class="d-flex" action="index.php?controller=course&action=courseManage" method="post">
                <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda">
            </form>
            <table class="content-table">
                <thead>
                    <tr>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Hora Total</td>
                        <td>Fecha Inicio</td>
                        <td>Fecha Final</td>
                        <td>DNI profesor</td>
                        <td>Editar</td>
                        <td>Actividad</td>
                    </tr>
                </thead>
                <?php if ($res) :
                    while ($row = $res->fetch_assoc()) :  ?>
                        <tr>
                            <td><?php echo ($row["codigo"]); ?></td>
                            <td><?php echo ($row["nombre"]); ?></td>
                            <td><?php echo ($row["descripcion"]); ?></td>
                            <td><?php echo ($row["hora_total"]); ?></td>
                            <td><?php echo ($row["fecha_inicio"]); ?></td>
                            <td><?php echo ($row["fecha_final"]); ?></td>
                            <td><?php echo ($row["DNI_profesor"]); ?></td>
                            <td><a href=<?php echo ("index.php?controller=admin&action=editCourse&codigo=" . $row['codigo']); ?>><img src="assets/img/img_iconos/libreta_icono.svg" alt="editar"></a></td>
                            <?php if ($row['actiu'] == 1) : ?>
                                <td><a href=<?php echo ("index.php?controller=course&action=courseManage&codigo=" . $row['codigo'] . "&actiu=0"); ?>><img src="assets/img/img_iconos/tick.svg" alt="habilitar"></a></td>
                        </tr>
                    <?php else : ?>
                        <td><a href=<?php echo ("index.php?controller=course&action=courseManage&codigo=" . $row['codigo'] . "&actiu=1"); ?>><img src="assets/img/img_iconos/x.svg" alt="deshabilitar"></a></td>
                        </tr>
                    <?php endif ?>
                    </tr>
                <?php endwhile ?>
                </tbody>
            </table>
        </section>
    <?php endif ?>
    </body>
<?php endif ?>