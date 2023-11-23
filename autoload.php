<?php

function autocargar($nombreClase)
{
    try {
        include "controllers/$nombreClase.php";
    } catch (\Throwable $th) {
        echo("error: ".$th->getMessage());
    }
    
}
spl_autoload_register("autocargar");
