<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

if (!isset($_SESSION["usuario_id"])) {
    echo json_encode(["foto" => ""]);
    exit;
}

include("conexion.php");

$fotoPerfil = "";
$usuarioId = (int) $_SESSION["usuario_id"];
$stmt = $conn->prepare("SELECT foto_perfil FROM register WHERE ID_register = ? LIMIT 1");

if ($stmt) {
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();
    $fotoPerfil = trim((string) ($usuario["foto_perfil"] ?? ""));
    $stmt->close();
}

$conn->close();

echo json_encode(["foto" => $fotoPerfil]);
