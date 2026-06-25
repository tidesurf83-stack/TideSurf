<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../recuperar_contra.html");
    exit();
}

$token = $_POST['token'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if ($password !== $confirmPassword || strlen($password) < 8 || empty($token)) {
    die("La información enviada no es válida. Verifica el enlace y que las contraseñas coincidan.");
}

$tokenHash = hash('sha256', $token);

$stmt = $conn->prepare("SELECT id, usuario_id FROM password_resets WHERE token_hash = ? AND usado = 0 AND expira_en >= NOW() LIMIT 1");
$stmt->bind_param("s", $tokenHash);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows !== 1) {
    die("El enlace para restablecer la contraseña no es válido o ya expiró.");
}

$reset = $resultado->fetch_assoc();
$usuarioId = (int) $reset['usuario_id'];
$resetId = (int) $reset['id'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$actualizar = $conn->prepare("UPDATE register SET password = ? WHERE ID_register = ?");
$actualizar->bind_param("si", $passwordHash, $usuarioId);
$actualizar->execute();
$actualizar->close();

$marcar = $conn->prepare("UPDATE password_resets SET usado = 1, usado_en = NOW() WHERE id = ?");
$marcar->bind_param("i", $resetId);
$marcar->execute();
$marcar->close();

$stmt->close();
$conn->close();

header("Location: ../inicio_sesion.html?estado=password_actualizada");
exit();
