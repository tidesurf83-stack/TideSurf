<?php
session_start();
// Conexión a la base de datos
$servername = "localhost";
$username   = "root";       // cambia si tu usuario es distinto
$password   = "";           // cambia si tu contraseña es distinta
$dbname     = "tidesurf";   // tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="es">
<?php include("head.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería - TIDE SURF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=perfil-icono">
    <link rel="stylesheet" href="css/galeria.css">
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body class="has-site-navbar">

<!-- ================= NAVBAR ================= -->
<header class="ts-navbar">
    <div class="ts-logo">
        <a href="index.php"><img src="img/logo-tidesurf-navbar.png" alt="TideSurf"></a>
    </div>
    <nav class="ts-menu">
        <a href="index.php">Inicio</a>
        <a href="noticias.php">Noticias</a>
        <a href="competencias.php">Competencias</a>
        <a href="playas.php">Playas</a>
        <a href="escuelas.php">Escuelas</a>
        <a href="tiendas.php">Tiendas</a>
        <a href="galeria.php">Galería</a>
        <a href="sobre_nosotros.html">Sobre Nosotros</a>
    </nav>
    <div class="ts-user">
        <?php if(isset($_SESSION["usuario_id"])) { ?>
            <a href="perfil.php" class="perfil-icono" title="Mi perfil"><i class="bi bi-person-circle"></i></a>
        <?php } else { ?>
            <a href="inicio_sesion.php" class="btn-login">Iniciar sesión</a>
        <?php } ?>
    </div>
    <button class="ts-toggle" id="tsToggle">☰</button>
</header>

<!-- ================= GALERÍA DE IMÁGENES ================= -->
<section class="grid-gallery-section container mt-5 mb-5">
    <div class="section-title">
        <h2>Galería de Tidesurf</h2>
    </div>
    <div class="gallery-grid">
        <?php
        $sql = "SELECT * FROM galerias";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="gallery-item">';
                echo '<img src="'.$row["imagen_url"].'" alt="'.$row["descripcion"].'">';
                echo '</div>';
            }
        } else {
            echo "No hay fotos en la galería.";
        }
        ?>
    </div>
</section>

<!-- ================= CARRUSEL DE VIDEOS ================= -->
<?php
$sql = "SELECT * FROM videos";
$result = $conn->query($sql);
if($result->num_rows > 0){
?>
<div id="carouselTidesurf" class="carousel slide galeria-bootstrap-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $active = true;
        while($video = $result->fetch_assoc()){
        ?>
            <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                <video class="video-carrusel" controls autoplay muted loop>
                    <source src="<?php echo $video['video_url']; ?>" type="video/mp4">
                    Tu navegador no soporta el video.
                </video>
            </div>
        <?php
            $active = false;
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTidesurf" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselTidesurf" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<?php
}
?>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/navbar.js?v=login-si-no"></script>
</body>
</html>
<?php
$conn->close();
?>
