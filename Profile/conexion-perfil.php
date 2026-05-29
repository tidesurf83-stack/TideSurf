<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "tidesurf"
);

if(!$conexion){
    die("Error de conexión");
}

?>