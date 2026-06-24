<?php
require_once __DIR__ . "/php/conexion.php";

$conn->set_charset("utf8mb4");

$sql = "SELECT 

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
</head>
<body>

  <!-- NAVBAR -->

  <nav class="navbar">
    <div class="container">

        <a class="navbar-brand" href="#" style="margin-left:-40px;" >
            <img src="ride_the_weve/img/logof-removebg-preview.png" alt="logo" class="logo">
        </a>

        <div class="menu">
            <a href="noticias.html">News</a>
            <a href="competicions">competition</a>
            <a href="ride-the-wave.html">Ride the wave</a>
            <a href="grearzone.html">Grear Zone Board</a>
            <a href="academias.html">Wave Academy</a>
            <a href="profile.html">My profile</a>
        </div>   
    </div>
</nav>

 <section class="hero">

    <div class="overlay">

      <h1>NEWS</h1>

      <p>Mantente al dia con el mundo del Surf</p>

      <div class="search-box">
      <input id="busqueda-noticias" type="text" placeholder="Buscar...">
      <button id="btn-buscar" type="button">Buscar</button>
      </div>

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
      </div>

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
          $imagen = "img/noticias/" . $noticia["imagen"];
          ?>

       <article class="<?php echo $claseCard; ?>"
       data-titulo="<?php echo htmlspecialchars($noticia["titulo"], ENT_QUOTES, "UTF-8"); ?>"
       data-resumen="<?php echo htmlspecialchars($noticia["resumen"], ENT_QUOTES, "UTF-8"); ?>"
       data-categoria="<?php echo htmlspecialchars($noticia["categoria"], ENT_QUOTES, "UTF-8"); ?>"
         data-destacada="<?php echo (int) $noticia["destacada"]; ?>"
>

        <img src="<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($noticia["titulo"]); ?>">

        <div class="content">

          <span class="tag">
            <?php echo htmlspecialchars($noticia["categoria"]); ?>
          </span>

          <h3>
            <?php echo htmlspecialchars($noticia["titulo"]); ?>
          </h3>

          <p>
            <?php echo htmlspecialchars($noticia["resumen"]); ?>
          </p>

         <button class="btn-leer-mas"
         data-titulo="<?php echo htmlspecialchars($noticia["titulo"], ENT_QUOTES, "UTF-8"); ?>"
         data-contenido="<?php echo htmlspecialchars($noticia["contenido"], ENT_QUOTES, "UTF-8"); ?>">
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

    <h2 id="modal-titulo"></h2>
    <p id="modal-texto"></p>
  </div>
 </div>

<script src="js/noticias.js"></script>
</body>
</html> 