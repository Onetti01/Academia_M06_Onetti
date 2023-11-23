<?php
require_once("Database.php");
class Student
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM alumnos WHERE email = '$email' AND password = '$password'";
        return mysqli_query($this->pdo, $sql);
    }

    public function getCourses($auxAlumno)
    {
        $query = "SELECT c.*, m.nota
        FROM cursos as c INNER JOIN matricula as m ON c.codigo = m.codigo_curso
        WHERE m.email_alumno = '$auxAlumno'";
        return mysqli_query($this->pdo, $query);
    }

    public function getAllCourses()
    {
        $query = "SELECT * FROM cursos";
        return mysqli_query($this->pdo, $query);
    }

    public function getSearchedCourses($auxAlumno, $busqueda)
    {

        $query = "SELECT c.*, m.nota
            FROM cursos as c INNER JOIN matricula as m ON c.codigo = m.codigo_curso
            WHERE m.email_alumno = '$auxAlumno'" . " and c.nombre LIKE '%"  . $busqueda . "%'";
        return mysqli_query($this->pdo, $query);
    }

    public function deleteCourse($auxAlumno, $codigo_curso)
    {

        $sql = "DELETE FROM matricula WHERE email_alumno = '$auxAlumno' AND codigo_curso = $codigo_curso";
        return mysqli_query($this->pdo, $sql);
    }

    public function addStudent($email, $password, $nombre, $apellidos, $edad, $dni, $ruta_imagen)
    {
        $sql = "INSERT INTO alumnos (email, password, nombre, apellidos, edad, dni,fotografia)
        VALUES ('$email','$password','$nombre','$apellidos', $edad,'$dni','$ruta_imagen')";
        return mysqli_query($this->pdo, $sql);
    }

    public function getAvailableCouses($auxAlumno)
    {
        $query = "SELECT * FROM cursos WHERE codigo NOT IN (
                      SELECT codigo_curso
                      FROM matricula
                      WHERE email_alumno = '$auxAlumno')";
        return mysqli_query($this->pdo, $query);
    }

    public function getAvailableCousesSearched($auxAlumno, $busqueda)
    {
        $query = "SELECT *
                  FROM cursos
                  WHERE codigo NOT IN (
                      SELECT codigo_curso
                      FROM matricula
                      WHERE email_alumno = '$auxAlumno') and nombre LIKE '%"  . $busqueda . "%'";
        return mysqli_query($this->pdo, $query);
    }

    public function addToCourse($tempEmail, $codigo_curso)
    {
        $sql = "INSERT INTO matricula VALUES ('$tempEmail', $codigo_curso,'/')";
        return mysqli_query($this->pdo, $sql);
    }

    public function editStudent($nombre, $apellidos, $email)
    {
        $sql = "UPDATE alumnos SET nombre='$nombre', apellidos='$apellidos' WHERE email LIKE '$email'";
        return mysqli_query($this->pdo, $sql);
    }

    public function getStudent($email)
    {
        $sql = "SELECT * FROM alumnos WHERE email LIKE '$email'";
        return mysqli_query($this->pdo, $sql);
    }

    public function updateHasLogged($email)
    {
        $sql = "SELECT * FROM alumnos WHERE email LIKE '$email'";
        $res = mysqli_query($this->pdo, $sql);

        while ($row = $res->fetch_assoc()) {
            $primerInicio = ($row["has_logged"]);
        }
        if ($primerInicio == 0) {
            mysqli_query($this->pdo, "UPDATE `alumnos` SET `has_logged`=1 WHERE email = '$email'");
        }
        return;
    }

    // public function giveCourse($email)  {
    //     $sql = "";



    // }
}
