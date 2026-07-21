<?php
require_once __DIR__ . "/php/conexion.php";

$conn->set_charset("utf8mb4");

$sql = "SELECT 
          ID_noticias,
          titulo,
          categoria,
          imagen,
          destacada,
          estado,
          fecha_publicacion,
          resumen,
          contenido
        FROM noticias
        WHERE estado = 'publicada'
        ORDER BY destacada DESC, fecha_publicacion DESC";

$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error al obtener las noticias: " . $conn->error);
}

$noticias = $resultado->fetch_all(MYSQLI_ASSOC);

$sqlImagenes = "SELECT ID_noticias, imagen 
                FROM noticia_imagenes 
                ORDER BY ID_noticias, orden ASC";

$resultadoImagenes = $conn->query($sqlImagenes);

$imagenesPorNoticia = [];

if ($resultadoImagenes) {
    while ($filaImagen = $resultadoImagenes->fetch_assoc()) {
        $imagenesPorNoticia[$filaImagen["ID_noticias"]][] = "img/noticias/" . $filaImagen["imagen"];
    }
}

$categorias = array_unique(array_column($noticias, "categoria"));
sort($categorias);
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

 
  <title>News</title>
  <link rel="stylesheet" href="css/noticias.css">
  <link rel="stylesheet" href="css/navbar.css">
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

 <section class="hero">

    <div class="overlay">

      <h1>NEWS</h1>

      <p>Mantente al dia con el mundo del Surf</p>

      <div class="search-box">
      <input id="busqueda-noticias" type="text" placeholder="Buscar...">
      <button id="btn-buscar" type="button">Buscar</button>
      </div>

     <!-- FILTROOOOSS 

      <div class="filters">
       <button type="button" class="btn-filtro active" data-filtro="todas">Todas</button>
       <button type="button" class="btn-filtro" data-filtro="destacadas">Noticias destacadas</button>

       <?php foreach ($categorias as $categoria): ?>
        <button
         type="button"
         class="btn-filtro"
          data-filtro="<?php echo htmlspecialchars($categoria, ENT_QUOTES, "UTF-8"); ?>"
          >
         <?php echo htmlspecialchars($categoria); ?>
        </button>
        <?php endforeach; ?>
      </div>        -->

    </div>


  </section>

 <!--NOTICIAS-->

 <main class="container">

    <h2>Noticias destacadas</h2>

    <section class="news-grid">

       <?php if (empty($noticias)): ?>

        <p>No hay noticias publicadas por el momento.</p>

         <?php else: ?>

         <?php foreach ($noticias as $index => $noticia): ?>

         <?php
         $claseCard = $index === 0 ? "news-card featured" : "news-card";

          $idNoticia = $noticia["ID_noticias"];
          $imagen = "img/noticias/" . $noticia["imagen"];

          $imagenesModal = $imagenesPorNoticia[$idNoticia] ?? [];

          if (empty($imagenesModal)) {
              $imagenesModal = [$imagen];
          }

          $imagenesModalJson = htmlspecialchars(
              json_encode($imagenesModal, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
              ENT_QUOTES,
              "UTF-8"
          );
          ?>

       <article class="<?php echo $claseCard; ?>"
       data-titulo="<?php echo htmlspecialchars($noticia["titulo"], ENT_QUOTES, "UTF-8"); ?>"
       data-resumen="<?php echo htmlspecialchars($noticia["resumen"], ENT_QUOTES, "UTF-8"); ?>"
       data-categoria="<?php echo htmlspecialchars($noticia["categoria"], ENT_QUOTES, "UTF-8"); ?>"
         data-destacada="<?php echo (int) $noticia["destacada"]; ?>"
>

        <img src="<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($noticia["titulo"]); ?>">

        <div class="news-content">

          <span class="news-category">
            <?php echo htmlspecialchars($noticia["categoria"]); ?>
          </span>

          <h3 class="news-title">
            <?php echo htmlspecialchars($noticia["titulo"]); ?>
          </h3>

          <p class="news-summary">
            <?php echo htmlspecialchars($noticia["resumen"]); ?>
          </p>

          <button class="btn-leer-mas news-button"
          data-titulo="<?php echo htmlspecialchars($noticia["titulo"], ENT_QUOTES, "UTF-8"); ?>"
          data-contenido="<?php echo htmlspecialchars($noticia["contenido"], ENT_QUOTES, "UTF-8"); ?>"
          data-imagenes="<?php echo $imagenesModalJson; ?>">
          Leer más
          </button>

        </div>

      </article>

    <?php endforeach; ?>

  <?php endif; ?>

</section>

  <p id="mensaje-sin-resultados" class="mensaje-sin-resultados">
    No se encontraron noticias.
  </p>

 </main>


 <div class="modal" id="modal">
  <div class="modal-content">
    <span class="cerrar">&times;</span>

    <div class="modal-carousel">
      <button type="button" class="carousel-btn carousel-prev">&#10094;</button>

      <img id="modal-imagen" src="" alt="Imagen de la noticia">

      <button type="button" class="carousel-btn carousel-next">&#10095;</button>

      <div class="carousel-counter" id="carousel-counter"></div>
    </div>

    <h2 id="modal-titulo"></h2>
    <p id="modal-texto"></p>
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

<script src="js/navbar.js" ></script>
<script src="js/main.js"></script>
<script src="js/noticias.js"></script>
</body>
</html> 