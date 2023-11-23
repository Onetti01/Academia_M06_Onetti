<?php
if (isset($_SESSION['profesores'])) :
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Cursos</title>
    </head>

    <body>
        <div class="menu-gestion">
            <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
        </div>
        <div class="centrar-tabla">
            <form class="d-flex" action="index.php?controller=course&action=getCourses" method="post">
                <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda"> <br>
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
                        <td>Alumnos</td>
                    </tr>
                </thead>
                <?php
                if ($res) :
                    while ($row = $res->fetch_assoc()) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo ($row["codigo"]); ?></td>
                                <td><?php echo ($row["nombre"]); ?></td>
                                <td><?php echo ($row["descripcion"]); ?></td>
                                <td><?php echo ($row["hora_total"]); ?></td>
                                <td><?php echo ($row["fecha_inicio"]); ?></td>
                                <td><?php echo ($row["fecha_final"]); ?></td>
                                <td>
                                    <form methpd="get">
                                        <a href=<?php echo ("index.php?controller=teacher&action=showNoteSection&codigo=" . $row["codigo"]); ?>><img src="assets/img/img_iconos/libreta_icono.svg" alt="editar"></a>
                                    </form>
                                </td>
                        </tbody>
                        </tr>
                    <?php endwhile ?>
                    </tbody>
            </table>
        </div>
    <?php endif ?>
    </body>
<?php endif ?>

    </html>