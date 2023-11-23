<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="shortcut icon" href="assets/img/img_iconos/logo1.svg" type="image/gif" />
    <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <img class="logo" src="assets/img/img_iconos/logo1.svg" />
        <ul class="nav-links">
            <div class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/">Sobre nosotros</a></li>
                <li class="services">
                    <a href="/">Servicios</a>
                </li>
            </div>
        </ul>
    </nav>

    <?php

    try {
        session_start();
        require_once "autoload.php";
        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $nameController = $_GET['controller'] . "Controller";
            $controler = new $nameController();
            $action = $_GET['action'];
            $controler->$action();
        } else {
            throw new Exception();
        }
    } catch (\Throwable $th) {
        if (isset($_GET['controller']) || isset($_GET['action'])) {
            echo ($th->getMessage());
            echo "<script>alert('No se pudo cargar esa direccion');</script>";
        }
        (new adminController)->start();
    }
    ?>
</body>

</html>