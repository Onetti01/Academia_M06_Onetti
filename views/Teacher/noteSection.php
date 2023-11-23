<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seccion de Notas</title>
</head>
<div class="footer"><a class="boton-personalizado" href="index.php?controller=course&action=getCourses">Mis cursos</a></div>

<body>
    <div class="menu-gestion">
        <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
    </div>
    <div class="centrar-tabla">
        <form class="d-flex" action=<?php echo ("index.php?controller=teacher&action=showNoteSection&codigo=" . intval($_GET['codigo'])); ?> method="post">
            <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda"> <br>
        </form>
        <table class="content-table">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Nota</td>
                </tr>
            </thead>
            <div class="container-fluid">
                <?php
                if ($res) :
                    while ($row = $res->fetch_assoc()) :
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo ($row["nombre"]); ?></td>
                                <td><?php echo ($row["apellidos"]); ?></td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="email-aux" value=<?php echo ($row["email"]); ?> />
                                        <input type="hidden" name="codigo-aux" value=<?php echo (intval($_GET['codigo'])); ?> />
                                        <input type="text" required="required" name="nota" value=<?php echo ($row["nota"]); ?> />
                                    </form>
                                </td>
                        </tbody>
                        </tr>
                        </tbody>
                    <?php endwhile ?>
                <?php endif ?>
        </table>
    </div>
</body>

</html>