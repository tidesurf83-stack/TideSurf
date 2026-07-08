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
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News</title>
  <link rel="stylesheet" href="css/noticias.css">
  <link rel="stylesheet" href="css/navbar.css?v=login-espacio">

</head>
<body>

  <!-- NAVBAR -->

<div class="site-navbar-shell">
    <div class="site-navbar">

        <a class="site-navbar-brand" href="index.php" aria-label="TideSurf Inicio">
            <img src="logo-tidesurf-navbar.png" alt="TideSurf">
        </a>

        <!--
        <button class="menu-toggle">
            ☰
        </button>
        -->

        <nav class="site-navbar-menu" aria-label="Navegacion principal">

            <a href="index.php">Inicio</a>

            <div class="dropdown-noticias">

                <button
                    type="button"
                    id="btn-noticias"
                    class="dropdown-toggle-noticias">

                    Noticias
                    <span class="flecha-dropdown">▼</span>

                </button>

                <div class="dropdown-menu-noticias">

                    <button
                        class="dropdown-item-noticia active"
                        data-filtro="todas">
                        Todas
                    </button>

                    <button
                        class="dropdown-item-noticia"
                        data-filtro="destacadas">
                        Noticias destacadas
                    </button>

                    <?php foreach ($categorias as $categoria): ?>

                        <button
                            class="dropdown-item-noticia"
                            data-filtro="<?php echo htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8'); ?>">

                            <?php echo htmlspecialchars($categoria); ?>

                        </button>

                    <?php endforeach; ?>

                </div>

            </div>

            <a href="competencias.html">Competencias</a>
            <a href="playas.html">Playas</a>
            <a href="escuelas.php">Escuelas de Surf</a>
            <a href="tiendas.php">Tiendas</a>
            <a href="galeria.html">Galería</a>
            <a href="sobre_nosotros.html">Sobre Nosotros</a>

        </nav>

        <a
            href="perfil.php"
            class="site-profile-avatar"
            aria-label="Mi Perfil">

            <span class="site-avatar-icon"></span>

        </a>

    </div>
</div>


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

<script src="js/noticias.js"></script>
</body>
</html> 