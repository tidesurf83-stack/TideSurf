<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = new mysqli("localhost", "root", "", "tidesurf");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if(isset($_POST['registrar'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $pais = $_POST['pais'];
    $genero = $_POST['genero'];
    $competencia = $_POST['competencia'];
    $categoria = $_POST['categoria'];
    $experiencia = $_POST['experiencia'];

    $sql = "INSERT INTO registros_competencia
    (nombre,apellido,correo,telefono,edad,pais,genero,competencia,categoria,experiencia)
    VALUES
    ('$nombre','$apellido','$correo','$telefono','$edad','$pais','$genero','$competencia','$categoria','$experiencia')";

    if($conexion->query($sql)){
        header("Location: competencias.php?registro=ok");
        exit;
    }else{
        echo "Error: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
 <?php include("head.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surf City</title>
    <link rel="stylesheet" href="css/competencias.css?v=perfil-icono">
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  
</head>

<body class="has-site-navbar">

<!-- ================= NAVBAR ================= -->

<header class="ts-navbar">


    <!-- LOGO -->
    <div class="ts-logo">

        <a href="index.php">
            <img src="img/logo-tidesurf-navbar.png" alt="TideSurf">
        </a>

    </div>


    <!-- MENÚ ESCRITORIO -->
    <nav class="ts-menu">

        <a href="index.php">Inicio</a>
        <a href="noticias.php">Noticias</a>
        <a href="competencias.php">Competencias</a>
        <a href="playas.php">Playas</a>
        <a href="escuelas.php">Escuelas</a>
        <a href="tiendas.php">Tiendas</a>
        <a href="galeria.php">Galería</a>
        <a href="sobre_nosotros.php">Sobre Nosotros</a>

    </nav>



    <!-- USUARIO ESCRITORIO -->

    <div class="ts-user">


        <?php if(isset($_SESSION["usuario_id"])) { ?>


            <a href="perfil.php" class="perfil-icono" title="Mi perfil">

                <i class="bi bi-person-circle"></i>

            </a>


        <?php } else { ?>


            <a href="inicio_sesion.php" class="btn-login">

                Iniciar sesión

            </a>


        <?php } ?>


    </div>



    <!-- BOTÓN HAMBURGUESA -->

    <button class="ts-toggle" id="tsToggle">

        ☰

    </button>


</header>



<!-- ================= MENU MOVIL ================= -->


<nav class="ts-mobile" id="tsMobile">


    <a href="index.php">Inicio</a>
    <a href="noticias.php">Noticias</a>
    <a href="competencias.php">Competencias</a>
    <a href="playas.php">Playas</a>
    <a href="escuelas.php">Escuelas</a>
    <a href="tiendas.php">Tiendas</a>
    <a href="galeria.php">Galería</a>
    <a href="sobre_nosotros.php">Sobre Nosotros</a>


    <hr>


    <?php if(isset($_SESSION["usuario_id"])) { ?>


        <a href="perfil.php" class="mobile-login">

            <i class="bi bi-person-circle"></i>

            Perfil

        </a>


    <?php } else { ?>


        <a href="inicio_sesion.php" class="mobile-login">

            Iniciar sesión

        </a>


    <?php } ?>


</nav>

<div class="ts-overlay" id="tsOverlay"></div>

<section class="hero-comp">
    <div class="hero-content">
        <h1>Competencias de Surf</h1>
        <p>Descubre los próximos eventos y los mejores campeonatos de surf en El Salvador.</p>

        <div class="hero-stats">
            <div class="stat-card">
                <div class="stat-number">25+</div>
                <div class="stat-text">Competencias</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-text">Surfistas</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">15</div>
                <div class="stat-text">Playas</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">10</div>
                <div class="stat-text">Años de Historia</div>
            </div>
        </div>
    </div>
</section>

   <!-- EVENTS -->
<section class="events">

    <div class="section-title">
        <h2>Próximos Eventos
            <span class="wave">〰️</span>
        </h2>
    </div>

    <div class="carousel-wrapper">

        <button class="carousel-btn prev">&#10094;</button>

        <div class="carousel" id="carousel">

            <?php

            $sql = "SELECT * FROM proximos_eventos";
            $resultado = $conexion->query($sql);

            if (!$resultado) {
                die("Error en la consulta: " . $conexion->error);
            }

            while($fila = $resultado->fetch_assoc()){
            ?>

                <div class="card">

                    <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['titulo']; ?>">

                    <div class="card-content">

                        <h3><?php echo $fila['titulo']; ?></h3>

                        <p><?php echo $fila['lugar']; ?></p>

                        <p><?php echo date("M d - Y", strtotime($fila['fecha'])); ?></p>


                        <button
    class="btn-detalles"
    data-titulo="<?php echo htmlspecialchars($fila['titulo']); ?>"
    data-lugar="<?php echo htmlspecialchars($fila['lugar']); ?>"
    data-fecha="<?php echo date('d/m/Y', strtotime($fila['fecha'])); ?>"
    data-imagen="<?php echo htmlspecialchars($fila['imagen']); ?>"
    data-descripcion="<?php echo htmlspecialchars($fila['descripcion']); ?>">
    VER DETALLES →
</button>


                    </div>

                </div>

            <?php
            }
            ?>

        </div>

        <button class="carousel-btn next">&#10095;</button>

    </div>

</section>




<!-- CATEGORY -->
<section class="levels">

    <h2>Regístrate aquí.
        <span class="wave">〰️</span>
    </h2>


</section>

<div class="featured-container">

<?php

$sql = "SELECT * FROM featured_events";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

while ($fila = $resultado->fetch_assoc()) {
?>

    <div class="featured-card">

        <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['titulo']; ?>">

        <div class="featured-content">

            <span>FEATURED EVENT</span>

            <h3><?php echo $fila['titulo']; ?></h3>

            <p><?php echo $fila['ubicacion']; ?></p>

            <button
class="abrirRegistro"
data-competencia="<?php echo htmlspecialchars($fila['titulo']); ?>">
<?php echo $fila['boton']; ?>
</button>

        </div>

    </div>

<?php
}
?>

</div>




<section class="rankings">

    <div class="section-title">
        <h2>Top Surf Rankings</h2>
        <a href="#">Ver todo</a>
    </div>

    <div class="ranking-table">

        <div class="ranking-header">
            <span>Rank</span>
            <span>Surfista</span>
            <span>País</span>
            <span>Puntos</span>
        </div>

        <?php

        $sql = "SELECT * FROM ranking_surfistas ORDER BY posicion ASC";
        $resultado = $conexion->query($sql);

        if (!$resultado) {
            die("Error en la consulta: " . $conexion->error);
        }

        while ($fila = $resultado->fetch_assoc()) {

            if ($fila['posicion'] == 1) {
                $puesto = "🥇";
            } elseif ($fila['posicion'] == 2) {
                $puesto = "🥈";
            } elseif ($fila['posicion'] == 3) {
                $puesto = "🥉";
            } else {
                $puesto = "#" . $fila['posicion'];
            }

        ?>

        <div class="ranking-row">

            <span class="rank"><?php echo $puesto; ?></span>

            <div class="surfer-info">
                <img src="<?php echo $fila['foto']; ?>" alt="<?php echo $fila['nombre']; ?>">
                <span><?php echo $fila['nombre']; ?></span>
            </div>

            <span><?php echo $fila['codigo_pais']; ?> <?php echo $fila['pais']; ?></span>

            <span class="points"><?php echo number_format($fila['puntos']); ?></span>

        </div>

        <?php
        }
        ?>

    </div>

</section>

<!-- =========================
        MODAL DEL EVENTO
========================= -->

<div id="registroModal" class="modal">

    <div class="modal-registro">

        <span class="cerrarRegistro">&times;</span>

        <!-- HEADER -->
        <div class="modal-header">

            <div class="header-overlay"></div>

            <div class="header-info">

                <h2>🏄 Registro a Competencia</h2>

                <p>Únete a los mejores surfistas de El Salvador</p>

               
            </div>

        </div>

        <!-- CONTENIDO -->
        <div class="contenido-modal">

            <!-- FORMULARIO -->
            <div class="formulario">

                <form method="POST">

                    <div class="fila">

                        <div class="campo">

                            <label>👤 Nombre</label>

                            <input
                                type="text"
                                name="nombre"
                                placeholder="Michelle"
                                required>

                        </div>

                        <div class="campo">

                            <label>👥 Apellido</label>

                            <input
                                type="text"
                                name="apellido"
                                placeholder="Méndez"
                                required>

                        </div>

                    </div>

                    <div class="fila">

                        <div class="campo">

                            <label>📧 Correo</label>

                            <input
                                type="email"
                                name="correo"
                                placeholder="example@gmail.com"
                                required>

                        </div>

                        <div class="campo">

                            <label>📱 Teléfono</label>

                            <input
                                type="text"
                                name="telefono"
                                placeholder="7123-4567"
                                required>

                        </div>

                    </div>

                    <div class="fila">

                        <div class="campo">

                            <label>🎂 Edad</label>

                            <input
                                type="number"
                                name="edad"
                                placeholder="18"
                                required>

                        </div>

                        <div class="campo">

                            <label>🌎 País</label>

                            <input
                                type="text"
                                name="pais"
                                placeholder="El Salvador"
                                required>

                        </div>

                    </div>

                    <div class="fila">

                        <div class="campo">

                            <label>🚻 Género</label>

                            <select name="genero" required>

                                <option value="" selected disabled>- Seleccione -</option>

                                <option value="Masculino">Masculino</option>

                                <option value="Femenino">Femenino</option>

                            </select>

                        </div>

                        <div class="campo">

                            <label>🏅 Categoría</label>

                            <select name="categoria">

                                <option>Principiante</option>

                                <option>Intermedio</option>

                                <option>Avanzado</option>

                                <option>Profesional</option>

                            </select>

                        </div>

                    </div>

                    <div class="campo">

                        <label>🏄 Competencia</label>

                        <input
                            type="text"
                            id="nombreCompetencia"
                            name="competencia"
                            readonly>

                    </div>

                    <div class="campo">

                        <label>⭐ Experiencia</label>

                        <select name="experiencia">

                            <option>Menos de 1 año</option>

                            <option>1 a 3 años</option>

                            <option>4 a 6 años</option>

                            <option>Más de 6 años</option>

                        </select>

                    </div>

                    <button
                        type="submit"
                        name="registrar"
                        class="btnEnviar">

                        🌊 Registrarme Ahora

                    </button>

                </form>

            </div>

 
        </div>

    </div>

</div>

<footer class="footer-tidesurf">
    <div class="footer-container">
        <!-- Columna izquierda -->
        <div class="footer-left">
            <h2>TideSurf</h2>
            <p>
                Explora El Salvador a través de TideSurf y sumérgete en las olas.
            </p>
            <div class="social-icons">
                <a href="//www.instagram.com/tidesurf_06?igsh=MTB3dnd0ZG5iNWJkbw=="><i class="fab fa-instagram"></i></a>
                <a href="https://chat.whatsapp.com/JwgjqdCgNBq9hLrAbfWoY"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:tidesurf83@gmail.com?subject=Consulta&body=Hola, quisiera más información."><i class="far fa-envelope"></i></a>
            </div>
        </div>
    </div>
 
    <!-- Parte inferior -->
    <div class="footer-bottom">
        <p>© 2026 TideSurf. Todos los derechos reservados.</p>
        <p><a href="#">Política de Privacidad</a> | <a href="#">Términos y Condiciones</a></p>
    </div>
</footer>

<script src="js/competencias.js"></script>

<script>

const boton=document.getElementById("tsToggle");
const menu=document.getElementById("tsMobile");
const fondo=document.getElementById("tsOverlay");

boton.onclick=function(){

    menu.classList.toggle("active");
    fondo.classList.toggle("active");

    if(menu.classList.contains("active")){

        boton.innerHTML="✕";

    }else{

        boton.innerHTML="☰";

    }

}

fondo.onclick=function(){

    menu.classList.remove("active");
    fondo.classList.remove("active");

    boton.innerHTML="☰";

}

</script>
</body>

</html>
