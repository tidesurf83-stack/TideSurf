<?php

include("conexion.php");

$mensajeGenerico = "Si el correo existe en TideSurf, se generó un enlace para restablecer la contraseña.";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../recuperar_contra.html");
    exit();
}

$correo = trim($_POST['correo'] ?? '');

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../recuperar_contra.html?estado=correo_invalido");
    exit();
}

$stmt = $conn->prepare("SELECT ID_register FROM register WHERE correo = ? LIMIT 1");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    $usuarioId = (int) $usuario['ID_register'];
    $token = bin2hex(random_bytes(32));
    $tokenHash = hash('sha256', $token);
    $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $limpiar = $conn->prepare("DELETE FROM password_resets WHERE usuario_id = ? OR expira_en < NOW()");
    $limpiar->bind_param("i", $usuarioId);
    $limpiar->execute();
    $limpiar->close();

    $insertar = $conn->prepare("INSERT INTO password_resets (usuario_id, correo, token_hash, expira_en) VALUES (?, ?, ?, ?)");
    $insertar->bind_param("isss", $usuarioId, $correo, $tokenHash, $expira);
    $insertar->execute();
    $insertar->close();

    $enlace = "restablecer_contra.php?token=" . urlencode($token);
    header("Location: ../recuperar_contra.html?estado=enlace_generado&demo=" . urlencode($enlace));
    exit();
}

$stmt->close();
$conn->close();

header("Location: ../recuperar_contra.html?estado=enviado");
exit();
