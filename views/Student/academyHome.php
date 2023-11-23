<?php
if (isset($_SESSION['alumnos'])) :
?>

    <head>
        <title>Academia</title>
    </head>
    <nav class="navbar">
        <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
    </nav>

    <body>
        <div id="concurso"></div>
        <h3>Academia virtual, aquí podras encontrar tus cursos disponible</h3>
        <a class="boton-personalizado" href="index.php?controller=student&action=getAvailableCourses">Ver cursos disponibles</a>
        <a class="boton-personalizado" href="index.php?controller=student&action=editStudent">Editar mis datos</a>
        <div class="centrar-tabla">

            <form class="d-flex" action="index.php?controller=student&action=getCourses" method="POST">
                <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda" />
            </form>
            <table class="content-table">
                <thead>
                    <tr>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Nota</td>
                        <td>Hora Total</td>
                        <td>Fecha Inicio</td>
                        <td>Fecha Final</td>
                        <td>Darse de baja</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res) :
                        while ($row = $res->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?php echo ($row["codigo"]) ?></td>
                                <td><?php echo ($row["nombre"]) ?></td>
                                <td><?php echo ($row["descripcion"]) ?></td>
                                <td><?php echo ($row["nota"]) ?></td>
                                <td><?php echo ($row["hora_total"]) ?></td>
                                <td><?php echo ($row["fecha_inicio"]) ?></td>
                                <td><?php echo ($row["fecha_final"]) ?></td>
                                <td>
                                    <a class="añadir_curso" href=<?php echo ("index.php?controller=student&action=getCourses&codigo=" . $row["codigo"]) ?>>Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>




        </div>
    <?php endif ?>

    </body>