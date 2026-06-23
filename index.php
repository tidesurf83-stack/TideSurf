<?php
$html = file_get_contents(__DIR__ . "/index.html");

if ($html === false) {
    die("No se pudo cargar la pagina de inicio.");
}

echo $html;
