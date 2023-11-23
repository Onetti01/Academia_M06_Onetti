<head>
    <title>Dispo Cursos</title>
</head>
<nav class="navbar">
    <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
</nav>

<body>
    <div class="footer"><a class="boton-personalizado" href="index.php?controller=student&action=getCourses">Mis cursos</a></div>
    <div class="centrar-tabla">
        <tbody>
            <form class="d-flex" action="index.php?controller=student&action=getAvailableCourses" method="POST">
                <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda" />
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
                        <td>Añadir curso</td>
                    </tr>
                </thead>
                <?php
                if ($res) :
                    while ($row = $res->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo ($row["codigo"]) ?></td>
                            <td><?php echo ($row["nombre"]) ?></td>
                            <td><?php echo ($row["descripcion"]) ?></td>
                            <td><?php echo ($row["hora_total"]) ?></td>
                            <td><?php echo ($row["fecha_inicio"]) ?></td>
                            <td><?php echo ($row["fecha_final"]) ?></td>
                            <td>
                                <a class="añadir_curso" href=<?php echo ("index.php?controller=student&action=getAvailableCourses&codigo=" . $row["codigo"]) ?>>Añadir</a>
                            </td>
                        </tr>
        </tbody>
    <?php endwhile ?>
<?php endif ?>
</table>
    </div>

</body>