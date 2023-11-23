<?php
require_once("Database.php");
class Teacher
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function updateTeacher($ACTIU, $DNI)
    {
        $query = "UPDATE profesores SET actiu = $ACTIU WHERE DNI = '$DNI'";
        return mysqli_query($this->pdo, $query);
    }

    public function searhTeachers($busqueda)
    {
        $query = "SELECT * FROM profesores WHERE nombre LIKE '%"  . $busqueda . "%'";
        return mysqli_query($this->pdo, $query);
    }

    public function allTeachers()
    {
        $query = "SELECT * FROM profesores";
        return mysqli_query($this->pdo, $query);
    }

    public function editTeacher($nombre, $apellidos, $titulo, $dni)
    {
        $sql = "UPDATE profesores SET nombre='$nombre', apellidos='$apellidos', titulo='$titulo' WHERE DNI LIKE '$dni'";
        return mysqli_query($this->pdo, $sql);
    }

    public function searhTeacherByDni($dni)
    {
        $sql = "SELECT * FROM profesores WHERE DNI LIKE '$dni'";
        return mysqli_query($this->pdo, $sql);
    }

    public function addTeacher($DNI, $password, $nombre, $apellidos, $titulo, $ruta_imagen)
    {
        $sql = "INSERT INTO profesores VALUES ('$DNI','$password','$nombre','$apellidos','$titulo','$ruta_imagen', 1)";
        mysqli_query($this->pdo, $sql);
    }
    public function Login($dni, $password)
    {
        $sql = "SELECT * FROM profesores WHERE dni = '$dni' AND password = '$password'";
        $result = mysqli_query($this->pdo, $sql);
        return mysqli_num_rows($result);
    }
    public function changeNote($tmpNota, $tmpEmail, $tmpCodigo)
    {
        $sql = "UPDATE matricula SET nota=$tmpNota WHERE email_alumno = '$tmpEmail' and codigo_curso = $tmpCodigo";
        return mysqli_query($this->pdo, $sql);
    }

    public function getStudent($auxalumnos)
    {
        $query = "SELECT a.email, a.nombre, a.apellidos, a.fotografia, m.nota 
                    FROM alumnos as a INNER JOIN matricula as m ON a.email = m.email_alumno
                    WHERE m.codigo_curso = $auxalumnos";
        return mysqli_query($this->pdo, $query);
    }

    public function searchStudent($busqueda,$auxalumnos){
        $query = "SELECT a.email, a.nombre, a.apellidos, a.fotografia, m.nota 
        FROM alumnos as a INNER JOIN matricula as m ON a.email = m.email_alumno 
        WHERE m.codigo_curso = $auxalumnos AND nombre LIKE '%"  . $busqueda . "%'";
        return mysqli_query($this->pdo, $query);
    }
    
}
