<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<?php include("head.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="TideSurf" />
    <meta property="og:description" content="TideSurf es una plataforma donde puede empezar tu gusto hacia el Surf o seguir con la pasión hacia el deporte" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://tidesurf.infinityfreeapp.com/?i=1" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="TideSurf" />

    <title>Registro - TideSurf</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="interfaz-navegador">
        
        
 
        <div class="tarjeta-registro-contenedor">
            
            <div class="panel-izquierdo-visual">
                <div class="capa-degradado-oceano"></div>
                <div class="branding-inferior">
                    <div class="logo-tidesurf">
                        </i> <span>TideSurf</span>
                    </div>
                </div>
            </div>
 
            <div class="panel-derecho-formulario">
                <h2 class="titulo-formulario">Únete a TideSurf</h2>
                <p class="subtitulo-formulario">y conecta con el océano</p>
 
                <form class="formulario-registro" method="POST" action="php/registro.php">
                    
                    <div class="contenedor-input-icono">
                        <i class='bx bx-user input-icon'></i>
                        <input type="text"placeholder="Tu nombre completo" required name="nombre">
                    </div>
 
                    <div class="contenedor-input-icono">
                        <i class='bx bx-envelope input-icon'></i>
                        <input type="email" placeholder="Tu correo electrónico" required name="correo">
                    </div>
 
                    <div class="contenedor-input-icono campo-desplegable">
                        <i class='bx bx-flag input-icon'></i>
                        <select name="pais" required>
                        <option value="" disabled selected>Selecciona tu país</option>
                        <option value="Afganistán">Afganistán</option>
                        <option value="Albania">Albania</option>
                        <option value="Alemania">Alemania</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Australia">Australia</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Canadá">Canadá</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Corea del Sur">Corea del Sur</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="España">España</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Francia">Francia</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Honduras">Honduras</option>
                        <option value="India">India</option>
                        <option value="Italia">Italia</option>
                        <option value="Japón">Japón</option>
                        <option value="México">México</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Reino Unido">Reino Unido</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                        </select>
                    </div>
 
                    <div class="contenedor-input-icono campo-desplegable">
                        <i class='bx bx-list-ul input-icon'></i>
                        <select name="nivel" required>
                            <option value="" disabled selected>Selecciona tu nivel</option>
                            <option value="principiante"> Principiante</option>
                            <option value="intermedio"> Intermedio</option>
                            <option value="avanzado"> Avanzado / Experto</option>
                            <option value="avanzado"> surf lover </option>
                        </select>
                    </div>
 
                    <div class="contenedor-input-icono">
                        <i class='bx bx-lock-alt input-icon'></i>
                        <input type="password" placeholder="Nueva contraseña" required  name="password">
                    </div>
 
                    <div class="contenedor-input-icono">
                        <i class='bx bx-lock-open-alt input-icon'></i>
                        <input type="password" placeholder="Confirma tu contraseña" required name="confirm_password" >
                    </div>
 
                    <div class="enlace-login-redireccion">
                        ¿Tienes cuenta? <a href="inicio_sesion.php">Iniciar sesión</a>
                    </div>
 
                    <button type="submit" class="boton-registrarse-tide">
                        <i class='bx bx-run'></i> Registrarse
                    </button>
                </form>
            </div>
 
        </div>
 

    </div>
 <script src="js/registro.js"></script>
</body>
</html>
