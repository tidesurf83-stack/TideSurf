<?php
 
require "conexion.php";
 
// Validar que lleguen todos los datos esperados
$campos = ["usuario_id", "p1", "p2", "p3", "p4", "p5", "p6"];
 
foreach ($campos as $campo) {
    if (!isset($_POST[$campo])) {
        http_response_code(400);
        exit("Falta el campo: " . $campo);
    }
}
 
$usuario_id = (int) $_POST["usuario_id"];
$p1 = (int) $_POST["p1"];
$p2 = (int) $_POST["p2"];
$p3 = (int) $_POST["p3"];
$p4 = (int) $_POST["p4"];
$p5 = (int) $_POST["p5"];
$p6 = (int) $_POST["p6"];
 
$puntos_totales = $p1 + $p2 + $p3 + $p4 + $p5 + $p6;
 
if ($puntos_totales <= 9) {
    $nivel = "principiante";
} elseif ($puntos_totales <= 14) {
    $nivel = "intermedio";
} else {
    $nivel = "avanzado";
}
 
$sql = "INSERT INTO trivia_respuestas
    (usuario_id, p1, p2, p3, p4, p5, p6, puntos_totales, nivel)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
$stmt = $conn->prepare($sql);
 
if (!$stmt) {
    http_response_code(500);
    exit("Error al preparar la consulta: " . $conn->error);
}
 
$stmt->bind_param(
    "iiiiiiiis",
    $usuario_id,
    $p1,
    $p2,
    $p3,
    $p4,
    $p5,
    $p6,
    $puntos_totales,
    $nivel
);
 
if ($stmt->execute()) {
    echo "ok";
} else {
    http_response_code(500);
    echo "Error al guardar: " . $stmt->error;
}
 
$stmt->close();
$conn->close();