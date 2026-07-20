<?php

session_start();
include("conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM register WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    echo "ENTRÉ AL LOGIN";
exit();
    

    if (password_verify($password, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['ID_register'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['foto_perfil'] = $usuario['foto_perfil'] ?? "";

        header("Location: ../index.php");
        exit();
    }
}

echo "Correo o contraseña incorrectos";

?>
