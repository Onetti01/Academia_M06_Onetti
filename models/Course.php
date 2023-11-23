<?php
require_once("Database.php");
class Course
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function updateCourse($ACTIU, $codigo)
    {
        $query = "UPDATE cursos SET actiu = $ACTIU WHERE codigo = '$codigo'";
        return mysqli_query($this->pdo, $query);
    }
    public function searhCourses($busqueda)
    {
        $query = "SELECT * FROM cursos WHERE nombre LIKE '%"  . $busqueda . "%'";
        return mysqli_query($this->pdo, $query);
    }

    public function allCourses()
    {
        $query = "SELECT * FROM cursos";
        return mysqli_query($this->pdo, $query);
    }

    public function editCourse($nombre, $descripcion, $hora_total, $fecha_inicio, $fecha_final, $dni_profesor, $codigo)
    {
        $sql = "UPDATE cursos SET nombre='$nombre', descripcion='$descripcion', hora_total='$hora_total', fecha_inicio='$fecha_inicio', fecha_final='$fecha_final', dni_profesor='$dni_profesor' WHERE codigo LIKE '$codigo'";
        return mysqli_query($this->pdo, $sql);
    }

    public function searhCourseById($codigo)
    {
        $sql = "SELECT * FROM cursos WHERE codigo LIKE '$codigo'";
        return mysqli_query($this->pdo, $sql);
    }
    
    public function addCourse($codigo, $nombre, $descripcion, $hora_total, $fecha_inicio, $fecha_final, $DNI_profesor)
    {
        $sql = "INSERT INTO cursos VALUES ($codigo, '$nombre', '$descripcion', $hora_total, '$fecha_inicio', '$fecha_final', '$DNI_profesor', 1)";
        mysqli_query($this->pdo, $sql);
    }

    public function getCoursesTeacher($auxprofesor){
        $query = "SELECT * FROM cursos WHERE DNI_profesor = '$auxprofesor'";
        return mysqli_query($this->pdo, $query);
    }

    
    public function getCoursesTeacherSearch($auxprofesor,$search){
        $query = "SELECT * FROM cursos WHERE DNI_profesor = '$auxprofesor' and nombre LIKE '%"  . $search . "%'";
        return mysqli_query($this->pdo, $query);
    }
}
