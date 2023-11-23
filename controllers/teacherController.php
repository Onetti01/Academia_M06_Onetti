<?php
require_once("models/Teacher.php");
class teacherController
{
    public function teacherManage()
    {
        $aux = new Teacher;
        try {
            if (isset($_GET['dni']) && isset($_GET['actiu'])) {
                $aux->updateTeacher($_GET['actiu'], $_GET['dni']);
            }

            if (isset($_POST['busqueda']) && $_POST['busqueda'] != '') {
                $res = $aux->searhTeachers($_POST['busqueda']);
            } else {
                $res = $aux->allTeachers();
            }
            require_once("views/Admin/teacherManage.php");
        } catch (\Throwable $th) {
            echo ("error: " . $th->getMessage());
        }
    }

    public function addTeacher()
    {
        if ($_POST) {
            $aux = new Teacher;
            $ruta_imagen = "";
            try {
                if (($_FILES['foto']['name'] != "")) {
                    $target_dir = "img/";
                    $file = str_replace("png", "jpg", $_FILES['foto']['name']);
                    $path = pathinfo($file);
                    $filename = $_POST['DNI']; # Esta linia pone el nombre final al archivo
                    $ext = $path['extension'];
                    $temp_name = $_FILES['foto']['tmp_name'];
                    $ruta_imagen = $target_dir . $filename . "." . $ext;
                    if (file_exists("assets/img/" . $ruta_imagen)) {
                        echo "<script>alert('esa foto ya existe');</script>";
                    } else {
                        move_uploaded_file($temp_name, "assets/img/" . $ruta_imagen);
                        echo "<script>alert('foto subida correctamente');</script>";
                    }
                    header("Refresh:0; url=index.php?controller=teacher&action=teacherManage");
                }
                $aux->addTeacher($_POST['DNI'], $_POST['password'], $_POST['nombre'], $_POST['apellidos'], $_POST['titulo'], $ruta_imagen);
            } catch (\Throwable $th) {
                echo ("error: " . $th->getMessage());
            }
        } else {
            require_once("views/Admin/addTeacherForm.php");
        }
    }
    public function login()
    {
        $aux = new Teacher;
        try {
            $count = $aux->login($_POST['dni'], md5($_POST['password']));
        } catch (\Throwable $th) {
            echo ("error: " . $th->getMessage());
        }

        if ($count == 1) {
            //Variable de sessión
            $_SESSION['profesores'] = $_POST['dni'];
            header("Refresh:0; url=index.php?controller=course&action=getCourses");
        } else {
            //Control del login
            echo "El usuario o la password no se han introducido correctamente";
            header("Refresh:1; url=index.php");
        }
    }
    public function showLogin()
    {
        require_once("views/Teacher/loginTeacher.php");
    }

    public function showNoteSection(){
        if (isset($_SESSION['profesores'])) {
            $aux = new Teacher;
            //Añadimos/editamos nota (nos aseguramos que estan declaradas)
            if (isset($_POST['nota']) && isset($_POST['codigo-aux']) && isset($_POST['email-aux'])) {
                $aux->changeNote($_POST['nota'],$_POST['email-aux'],$_POST['codigo-aux']);
            }
            //Busqueda de cursos por su nombre
            if (isset($_POST['busqueda']) && $_POST['busqueda'] != '') {
                $res=$aux->searchStudent($_POST['busqueda'],intval($_GET['codigo']));
            }
            require_once("views/Teacher/noteSection.php");
        }else{
            header("Refresh:1; url=index.php");
        }
    }
}
