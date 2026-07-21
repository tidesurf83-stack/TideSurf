<?php
session_start();
// Conexión a la base de datos

require_once __DIR__ . "/php/conexion.php";

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

    <?php if(!empty($_SESSION["foto_perfil"])) { ?>

        <img src="<?= $_SESSION['foto_perfil']; ?>" alt="Foto de perfil">

    <?php } else { ?>

        <i class="bi bi-person-circle"></i>

    <?php } ?>

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

 <a href="perfil.php" class="perfil-icono" title="Mi perfil">

    <?php if(!empty($_SESSION["foto_perfil"])) { ?>

        <img src="<?= $_SESSION['foto_perfil']; ?>" alt="Foto de perfil">

    <?php } else { ?>

        <i class="bi bi-person-circle"></i>

    <?php } ?>

</a>

<?php } else { ?>

    <a href="inicio_sesion.php" class="btn-login mobile-login">
        Iniciar sesión
    </a>

<?php } ?>


</nav>

<div class="ts-overlay" id="tsOverlay"></div>

<!-- ================= GALERÍA ================= -->
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
                ?>
                <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#modalImagen<?php echo $row['id']; ?>">
                    <img src="<?php echo $row['imagen_url']; ?>" alt="<?php echo $row['descripcion']; ?>">
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalImagen<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" style="margin:100px auto; max-width:90%;">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="<?php echo $row['imagen_url']; ?>" class="img-fluid" alt="<?php echo $row['descripcion']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <?php
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
<div id="carouselVideos" class="carousel slide galeria-bootstrap-carousel" data-bs-ride="carousel">
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselVideos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselVideos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<?php
}
?>

<!-- ================= FOOTER ================= -->
<footer class="footer-tidesurf">
    <div class="footer-container">
        <div class="footer-left">
            <h2>TideSurf</h2>
            <p>Explora El Salvador a través de TideSurf y sumérgete en las olas.</p>
            <div class="social-icons">
                <a href="//www.instagram.com/tidesurf_06?igsh=MTB3dnd0ZG5iNWJkbw=="><i class="fab fa-instagram"></i></a>
                <a href="https://chat.whatsapp.com/JwgjqdCgNBq9hLrAbfWoY"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:tidesurf83@gmail.com?subject=Consulta&body=Hola, quisiera más información."><i class="far fa-envelope"></i></a>
            </div>
        </div>
    </div>
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
