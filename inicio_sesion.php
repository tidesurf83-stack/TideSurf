<?php
session_start();

include __DIR__ . "/php/conexion.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    $sql = "SELECT ID_register, nombre, correo, password FROM register WHERE correo = ? LIMIT 1";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        $error = "No se pudo preparar la consulta.";
    } else {
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario && password_verify($password, $usuario["password"])) {
            $_SESSION["usuario_id"] = $usuario["ID_register"];
            $_SESSION["usuario_nombre"] = $usuario["nombre"];

            header("Location: index.php");
            exit;
        } else {
            $error = "Correo o contraseña incorrectos.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - TideSurf</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/inicio_sesion.css">
</head>
<body>
    <div class="interfaz-navegador">
 
        <h1 class="titulo-login-principal">Inicio de sesión</h1>
 
        <div class="tarjeta-login-contenedor">
 
            <div class="panel-izquierdo-visual">
                <div class="capa-degradado-oceano"></div>
                <div class="branding-inferior">
                    <div class="logo-tidesurf">
                      </i> <span>TideSurf</span>
                    </div>
                </div>
            </div>
 
            <div class="panel-derecho-formulario">
                <h2 class="titulo-formulario">Bienvenido a TideSurf</h2>
                <p class="subtitulo-formulario">Ingresa tus credenciales para continuar</p>
                
                <?php if (!empty($error)): ?>
                    <p class="mensaje-error"><?= htmlspecialchars($error) 
                ?></p><?php endif; ?>
 
                <form class="formulario-login" action="inicio_sesion.php" method="POST">
 
                    <div class="contenedor-input-icono">
                        <i class='bx bx-envelope input-icon'></i>
                        <input type="email" name="email" placeholder="Correo Electrónico" required>
                    </div>
 
                    <div class="contenedor-input-icono">
                        <i class='bx bx-lock-alt input-icon'></i>
                        <input type="password" id="passwordInput" name="password" placeholder="Contraseña" required>
                        <i class='bx bx-hide eye-icon' id="togglePassword"></i>
                    </div>
 
                    <div class="helper-text-links">
                        <a href="recuperar_contra.html" class="link-olvido">¿Olvidé mi contraseña?</a>
                    </div>
 
                    <div class="enlace-registro-redireccion">
                        ¿No tienes cuenta? <a href="registro.html">Regístrate</a>
                    </div>
                    <button type="submit" class="boton-iniciar-tide">
                        <i class='bx bx-log-in-circle'></i> Iniciar Sesión
                    </button>
                </form>
            </div>
 
        </div>
 
    </div>
 
    <script src="js/inicio_sesion.js"></script>
</body>
</html>
 
