<?php

include(__DIR__ . "/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $nacionalidad = $_POST['pais'] ?? '';
    $nivel_surf = $_POST['nivel'] ?? '';

    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO register (nombre, correo, nacionalidad, nivel_surf, password)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la consulta: " . $conn->error);
    }

    $stmt->bind_param(
        "sssss",
        $nombre,
        $correo,
        $nacionalidad,
        $nivel_surf,
        $passwordHash
    );

    if ($stmt->execute()) {
        header("Location: ../inicio_sesion.php");
        exit();
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>