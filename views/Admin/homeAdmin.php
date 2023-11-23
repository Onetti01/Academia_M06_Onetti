<!DOCTYPE html>
<html lang="en">


<aside>
    <h3>Panel administratrivo</h3>
    <ul type="lista">
        <li><a class="boton-admin" href="index.php?controller=teacher&action=teacherManage">Gestión Professor</a></li>
        <li><a class="boton-admin" href="index.php?controller=course&action=courseManage">Gestión Cursos</a></li>
        <li><a class="boton-admin" href="index.php?controller=student&action=importStudents">Importar Alumnos</a></li>
        <li><a href="index.php?controller=admin&action=logOut">Cerrar session</a></li>
    </ul>
</aside>

<body>
    <script>
        document.title = 'Inicio Administrador'
    </script>
    <div class="menu-gestion">
        <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar session</a>;
    </div>
</body>