<?php
require_once("models/Student.php");
class studentController
{
    public function login()
    {
        if ($_POST) {
            $aux = new Student;
            $res = $aux->login($_POST['email'], md5($_POST['password']));
            echo "<script>console.log('" . mysqli_num_rows($res) . "');</script>";
            if (mysqli_num_rows($res) == 1) {
                //Variable de sessión
                $_SESSION['alumnos'] = $_POST['email'];
                $rowResult = mysqli_fetch_row($res);
                $_SESSION['nombre'] = $rowResult[2];
                $_SESSION['apellidos'] = $rowResult[3];

                header("Refresh:0; url=index.php?controller=student&action=getCourses");
            } else {
                echo "<script>alert('El email o la password no se han introducido correctamente');</script>";
                header("Refresh:0; url=index.php");
            }
        }
    }
    public function showHome()
    {
        require_once("views/Student/academyHome.php");
    }

    public function getCourses()
    {
        if (isset($_SESSION['alumnos'])) {
            $aux = new Student;
            $res = $aux->getCourses($_SESSION['alumnos']);

            $student = $aux->getStudent($_SESSION['alumnos']);
            while ($row = $student->fetch_assoc()) {
                $primerInicio = ($row["has_logged"]);
            }


            $todosLosCursos = $aux->getAllCourses();
            $cursosstr = "";
            while ($row = $todosLosCursos->fetch_assoc()) {
                $cursosstr = $cursosstr . "-" . $row["nombre"];
            }


            setcookie("cursos", $cursosstr, time() + (1000), "/");


            if ($primerInicio == 0) {
                echo ('<script src="assets/scripts/index.js"></script>');
                $aux->updateHasLogged($_SESSION['alumnos']);
            } else {
                echo '<script>alert("Benvenido/da:' . $_SESSION["nombre"] . " " . $_SESSION["apellidos"] . '.);</script>';
            }

            //Busqueda de cursos por su nombre
            if (isset($_POST['busqueda']) && $_POST['busqueda'] != '') {
                $res = $aux->getSearchedCourses($_SESSION['alumnos'], $_POST['busqueda']);
            }
            if (isset($_GET['codigo'])) {
                $aux->deleteCourse($_SESSION['alumnos'], intval($_GET['codigo']));
                $res = $aux->getCourses($_SESSION['alumnos']);
                echo "<script>alert('Has eliminado el curso correctamente');</script>";
            }
            require_once("views/Student/academyHome.php");
        }
    }

    public function registerStudent()
    {
        if ($_POST) {
            $aux = new Student;
            $ruta_imagen = "";
            if (($_FILES['foto']['name'] != "")) {
                $target_dir = "img_alumnos/";
                $file = str_replace("png", "jpg", $_FILES['foto']['name']);
                $path = pathinfo($file);
                $filename = $_REQUEST['email']; # Esta linia pone el nombre final al archivo
                $ext = $path['extension'];
                $temp_name = $_FILES['foto']['tmp_name'];
                $ruta_imagen = $target_dir . $filename . "." . $ext;
                if (file_exists("assets/img/" . $ruta_imagen)) {
                    echo "<script>alert('esa foto ya existe');</script>";
                } else {
                    move_uploaded_file($temp_name, "assets/img/" . $ruta_imagen);
                }
            }
            //Insertamos los datos
            $aux->addStudent($_REQUEST['email'], md5($_REQUEST['password']), $_REQUEST['nombre'], $_REQUEST['apellidos'], intval($_REQUEST['edad']), $_REQUEST['dni'], $ruta_imagen);
            echo "<script>alert('Registrado correctamente');</script>";
            header("Refresh:0; url=index.php");
        } else {
            require_once("views/Student/registerForm.php");
        }
    }

    public function getAvailableCourses()
    {
        if (isset($_SESSION['alumnos'])) {
            $aux = new Student;
            $res = $aux->getAvailableCouses($_SESSION['alumnos']);
            //Busqueda de cursos por su nombre
            if (isset($_POST['busqueda']) && $_POST['busqueda'] != '') {
                $res = $aux->getAvailableCousesSearched($_SESSION['alumnos'], $_POST['busqueda']);
                require_once("views/Student/availableCourses.php");
            }
            //Añade el curso al usuario
            if (isset($_GET['codigo'])) {
                $result = $aux->addToCourse($_SESSION['alumnos'], intval($_GET['codigo']));
                $res = $aux->getAvailableCouses($_SESSION['alumnos']);
                print("<script>alert('Añadido el curso correctamente');</script>");
            }
            require_once("views/Student/availableCourses.php");
        } else {
            header("Refresh:0; url=index.php");
        }
    }

    public function editStudent()
    {
        if (isset($_SESSION["alumnos"])) {
            $aux = new Student;
            if ($_POST) {
                //Declaramos las variables
                $res = $aux->editStudent($_POST['nombre'], $_POST['email'], $_POST['apellidos']);
                if ($res) {
                    echo "<script>alert('Alumno editado correctamente');</script>";
                    header("Refresh:0; url=index.php?controller=student&action=getCourses");
                }
            } else {
                $email = $_SESSION['alumnos'];
                $res = $aux->getStudent($_SESSION['alumnos']);
                if ($res) {
                    $alum = mysqli_fetch_assoc($res);
                    require_once("views/Student/editStudent.php");
                }
            }
        }
    }

    // public function giveCourse()  {

    //     if (isset($_SESSION['alumnos'])) {
    //         $aux = new Student;

    //         $res = $aux->giveCourse($_SESSION['alumnos']);


    //     }

    // }

    public function addImportedStudent()
    {
        // Creamos los modelos para que nos permita comunicarnos con la base de datos
        $aux = new Student;

        // Recuperamos los datos de la URL y los decodificamos
        $studentList = json_decode(urldecode($_GET['studentList']), true);

        // Recorremos la lista que habíamos dejado en cache
        foreach ($studentList as $row) {
            // Por cada fila, añadimos los valores a la tabla de alumnos
            $aux->addStudent($row['email'], md5($row['password']), $row['nombre'], $row['apellidos'], intval($row['edad']), $row['dni'], $row['fotografia']);
            // Separamos los cursos que hay eliminando los caracteres de retorno de carro y de 
            // alimentación de línea al principio y al final de la cadena.

            $cursos = explode("-", trim($row["cursos"]));
            foreach ($cursos as $curso) {
                // Y por cada curso, matriculamos al alumno en el
                $aux->addToCourse($row['email'], $curso);
            }
        }

        // Refrescamos la página y nos vamos a la gestión de cursos
        echo "<script>alert('Alumnos Importados correctamente');</script>";
        header("Refresh:0; url=index.php?controller=course&action=courseManage");
    }
    public function importStudents()
    {
        //abrimos la vista para seleccionar el archivo
        require_once("views/Admin/importStudentsForm.php");
    }
}
