<?php
require_once("models/Course.php");
class courseController
{
    public function courseManage()
    {
        $aux = new Course;
        try {
            if (isset($_GET['codigo']) && isset($_GET['actiu'])) {
                $aux->updateCourse($_GET['actiu'], $_GET['codigo']);
            }

            //Busqueda 
            if (isset($_POST['busqueda']) && $_POST['busqueda'] != '') {
                $res = $aux->searhCourses($_POST['busqueda']);
            } else {
                $res = $aux->allCourses();
            }
            require_once("views/Admin/courseManage.php");
        } catch (\Throwable $th) {
            echo ("error: " . $th->getMessage());
        }
    }

    public function addCourse()
    {
        if ($_POST) {
            $aux = new Course;
            try {
                $aux->addCourse(intval($_POST['codigo']), $_POST['nombre'], $_POST['descripcion'], intval($_POST['hora_total']), $_POST['fecha_inicio'], $_POST['fecha_final'], $_POST['DNI_profesor']);
            } catch (\Throwable $th) {
                echo ("error: " . $th->getMessage());
            }
            echo "<script>alert('curso guardado');</script>";
            header("Refresh:0; url=index.php?controller=course&action=courseManage");
        } else {
            require_once("views/Admin/addCourseForm.php");
        }
    }

    public function getCourses()
    {
        if (isset($_SESSION['profesores'])) {
            $auxprofesor = $_SESSION['profesores'];
            $aux = new Course;
            $res = $aux->getCoursesTeacher($_SESSION['profesores']);
            if (isset($_POST['busqueda']) && $_POST['busqueda'] != '') {
                $res = $aux->getCoursesTeacherSearch($_SESSION['profesores'], $_POST['busqueda']);
            }
            require_once("views/Teacher/courses.php");
        } else {
            return "xd";
        }
    }
}
