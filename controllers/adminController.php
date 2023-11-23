<?php
require_once "models/Admin.php";
class adminController
{
    public function start()
    {
        require_once("views/Student/loginStudents.php");
    }

    public function showLogin()
    {
        require_once("views/Admin/loginAdmin.php");
    }

    public function login()
    {
        $aux = new Admin;
        try {
            $count = $aux->login($_POST['usuario'], $_POST['password']);
        } catch (\Throwable $th) {
            echo ("error: " . $th->getMessage());
        }

        if ($count == 1) {
            //Variable de sessión
            $_SESSION['administrador'] = $_POST['usuario'];
            require_once("views/Admin/homeAdmin.php");
        } else {
            //Control del login
            echo "El usuario o la password no se han introducido correctamente";
            header("Refresh:1; url=index.php");
        }
    }
    public function logOut()
    {
        try {
            session_destroy();
        } catch (\Throwable $th) {
            echo ("error: " . $th->getMessage());
        }
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=index.php'>";
    }
    public function editTeacher()
    {
        require_once "models/Teacher.php";
        $aux = new Teacher;
        try {
            if (isset($_SESSION["administrador"])) {
                if ($_POST) {
                    $consulta = $aux->editTeacher($_POST['nombre'], $_POST['apellidos'], $_POST['titulo'], $_POST['DNI']);
                    if (!$consulta) {
                        echo "<script>alert('Error querry no valida');</script>";
                    } else {
                        echo "<script>alert('Profesor editado correctamente');</script>";
                    }
                    header("Refresh:0; url=index.php?controller=teacher&action=teacherManage");
                } else {
                    $res = $aux->searhTeacherByDni($_GET['dni']);
                    if (!$res) {
                        echo "Error querry no valida ";
                        echo "Redirigint..";
                        header("Refresh:0; url=index.php?controller=teacher&action=teacherManage");
                    } else {
                        $profe = mysqli_fetch_assoc($res);
                        require_once("views/Admin/editTeacherForm.php");
                    }
                }
            } else {
                echo "<script>alert('La sesion esta perdida, vuelve a iniciar sesion');</script>";
                header("Refresh:0; url=index.php?controller=admin&action=logOut");
            }
        } catch (\Throwable $th) {
            echo ("error: " . $th->getMessage());
        }
    }

    public function editCourse()
    {
        require_once "models/Course.php";
        $aux = new Course;
        try {
            if (isset($_SESSION["administrador"])) {
                if ($_POST) {
                    $consulta = $aux->editCourse($_POST['nombre'], $_POST['descripcion'], $_POST['hora_total'], $_POST['fecha_inicio'], $_POST['fecha_final'], $_POST['DNI_profesor'], $_POST['codigo']);
                    if (!$consulta) {
                        echo "<script>alert('Error querry no valida');</script>";
                    } else {
                        echo "<script>alert('Curso editado correctamente');</script>";
                    }
                    header("Refresh:0; url=index.php?controller=course&action=courseManage");
                } else {
                    $res = $aux->searhCourseById($_GET['codigo']);
                    if (!$res) {
                        echo "Error querry no valida ";
                        echo "Redirigint..";
                        header("Refresh:0; url=index.php?controller=course&action=courseManage");
                    } else {
                        $curso = mysqli_fetch_assoc($res);
                        require_once("views/Admin/editCourseForm.php");
                    }
                }
            } else {
                echo "<script>alert('La sesion esta perdida, vuelve a iniciar sesion');</script>";
                header("Refresh:0; url=index.php?controller=admin&action=logOut");
            }
        } catch (\Throwable $th) {
            echo ("error: " . $th->getMessage());
        }
    }
}
