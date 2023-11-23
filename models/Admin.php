<?php
require_once("Database.php");
class Admin
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function Login($usuario, $password)
    {
        $sql = "SELECT * FROM administrador WHERE usuario = '$usuario' AND password = '$password'";
        $result = mysqli_query($this->pdo, $sql);
        return mysqli_num_rows($result);
    }
}
