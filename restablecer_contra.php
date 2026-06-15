<?php
$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - TideSurf</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/recuperar_contra.css">
</head>
<body>
    <main class="interfaz-navegador">
        <h1 class="titulo-registro-principal">Nueva contraseña</h1>

        <section class="tarjeta-registro-contenedor" aria-label="Formulario para restablecer contraseña">
            <div class="panel-izquierdo-visual">
                <div class="capa-degradado-oceano"></div>
                <div class="branding-inferior">
                    <div class="logo-tidesurf">
                        <i class='bx bx-water'></i> <span>TideSurf</span>
                    </div>
                </div>
            </div>

            <div class="panel-derecho-formulario">
                <h2 class="titulo-formulario">Crea una contraseña segura</h2>
                <p class="subtitulo-formulario">Debe tener al menos 8 caracteres.</p>

                <form class="formulario-registro" action="php/restablecer_contra.php" method="POST">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">

                    <div class="contenedor-input-icono">
                        <i class='bx bx-lock-alt input-icon'></i>
                        <input type="password" name="password" placeholder="Nueva contraseña" minlength="8" required>
                    </div>

                    <div class="contenedor-input-icono">
                        <i class='bx bx-lock-open-alt input-icon'></i>
                        <input type="password" name="confirm_password" placeholder="Confirmar contraseña" minlength="8" required>
                    </div>

                    <button type="submit" class="boton-registrarse-tide">
                        <i class='bx bx-check-shield'></i> Guardar contraseña
                    </button>
                </form>

                <div class="back">
                    <a href="inicio_sesion.html"><i class='bx bx-arrow-back'></i> Volver al login</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
