<?php
include __DIR__ . "/php/conexion.php";

$sql = "SELECT * FROM surf_facts";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error: " . $conn->error);
}
?>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tide Surf</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <link rel="stylesheet" href="css/playas.css?v=perfil-icono">

    <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
</head>

<body>

    
<header>

<div class="site-navbar-shell">
    <div class="site-navbar">
        <a class="site-navbar-brand" href="index.php" aria-label="TideSurf Inicio">
            <img src="logo-tidesurf-navbar.png" alt="TideSurf">
        </a>
        <nav class="site-navbar-menu" aria-label="Navegacion principal">
            <a href="index.php">Inicio</a>
            <a href="noticias.html">Noticias</a>
            <a href="competencias.php">competencias</a>
            <a href="playas.html">Playas</a>
            <a href="escuelas.php">Escuelas de Surf</a>
            <a href="tiendas.html">Tiendas</a>
            <a href="galeria.html">Galeria</a>
            <a href="sobre_nosotros.html">Sobre Nosotros</a>
        </nav>
        <a href="perfil.php" class="site-profile-avatar" aria-label="Mi Perfil">
            <span class="site-avatar-icon"></span>
        </a>
    </div>
</div>


<section class="hero">

    <div class="hero-content">

        <h1>Encuentra Tu Playa</h1>

        <p>
            Descubre las mejores playas para surfear
            en El Salvador.
        </p>

    </div>

</section>


<section class="our-beaches">

    <div class="container-beaches">

        <h2>Nuestras Playas</h2>

        <p class="beach-description">

            El Salvador es uno de los mejores destinos de surf en Centroamérica.
            Sus playas ofrecen olas increíbles, atardeceres espectaculares y
            experiencias inolvidables para surfistas de todos los niveles.

            Explora las playas más famosas y descubre tu próxima aventura.

        </p>

        <div class="features">

            <div class="feature">

                <div class="icon"></div>
                <div class="icon">
                 <i class="bi bi-water"></i>
                </div>

                <h4>Olas todo el año</h4>

                <p>Surf siempre que quieras</p>

            </div>

            <div class="feature">

                <div class="icon"></div>
                <div class="icon">
                    <i class="bi bi-brightness-high"></i>
                </div>

                <h4>Clima tropical</h4>

                <p>Temperaturas perfectas</p>

            </div>

            <div class="feature">

                <div class="icon"></div>
                <div class="icon">
                    <i class="bi bi-geo-alt"></i>
                </div>

                <h4>Playas para todos</h4>

                <p>Desde principiantes hasta expertos</p>

            </div>

            <div class="feature">

                <div class="icon"></div>
                <div class="icon">
                    <i class="bi bi-heart"></i>
                </div>

                <h4>Cultura surf</h4>

                <p>Comunidad local increíble</p>

            </div>

        </div>

    </div>

</section>

<section class="top-month">

    <h2>
     Top 3 Playas de <span id="monthName"></span>
    </h2>

    <p class="month-subtitle">
        Las playas recomendadas para este mes.
    </p>

    <div class="top-grid">

        <div class="top-card gold" id="top1-card">
            <span class="medal"></span>
            <img id="top1-img" src="" alt="">
            <h3 id="top1-name"></h3>
            <p id="top1-location"></p>
        </div>

        <div class="top-card silver" id="top2-card">
            <span class="medal"></span>
            <img id="top2-img" src="" alt="">
            <h3 id="top2-name"></h3>
            <p id="top2-location"></p>
        </div>

        <div class="top-card bronze" id="top3-card">
            <span class="medal"></span>
            <img id="top3-img" src="" alt="">
            <h3 id="top3-name"></h3>
            <p id="top3-location"></p>
        </div>

    </div>

</section>

<div class="facts-title">
    <h2>Características de nuestras playas</h2>
    <p>
        Descubre algunas de las condiciones que hacen de El Salvador un destino reconocido para el surf.
    </p>
</div>
<section class="surf-facts">

<?php
while($fact = $resultado->fetch_assoc()){
?>

    <div class="fact-card">

        <div class="fact-icon">
            <i class="bi <?php echo $fact['icono']; ?>"></i>
        </div>

        <h3><?php echo $fact['titulo']; ?></h3>

        <p><?php echo $fact['descripcion']; ?></p>

    </div>

<?php
}
?>

</section>

<section class="beaches">
      <h2>Las Mejores Playas</h2>


    <div class="cards">

        <div class="card">

            <img src="img/playas/zonte.webp" alt="Playa El Zonte">

            <div class="card-content">

                <h3>Playa El Zonte</h3>

                <p>Costa de La Libertad</p>

                <button onclick="openBeach('zonte')">
                    Ver más...
                </button>

            </div>

        </div>

        <div class="card">

            <img src="img/playas/las flores.webp" alt="Playa Las Flores">

            <div class="card-content">

                <h3>Playa Las Flores</h3>

                <p>Oriente del país</p>

                <button onclick="openBeach('flores')">
                    Ver más...
                </button>

            </div>

        </div>

        <div class="card">

            <img src="img/playas/mizata.webp" alt="Playa Mizata">

            <div class="card-content">

                <h3>Playa Mizata</h3>

                <p>Zona Occidental</p>

                <button onclick="openBeach('mizata')">
                    Ver más...
                </button>

            </div>

        </div>

        <div class="card">
            <img src="../TideSurf/img/playas/tunco1.webp" alt="Playa El Tunco">

            <div class="card-content">

                <h3>Playa El Tunco</h3>

                <p>Departamento de La Libertad</p>

                <button onclick="openBeach('tunco')">
                    Ver más...
                </button>

            </div>

        </div>

        <div class="card">
            <img src="../TideSurf/img/playas/el sunzal.jpg" alt="Playa El Sunzal">

            <div class="card-content">

                <h3>Playa El Sunzal</h3>

                <p>Junto a El Tunco</p>

                <button onclick="openBeach('sunzal')">
                    Ver más...
                </button>

            </div>

        </div>

        <div class="card">
            <img src="../TideSurf/img/playas/punta roca.jpg" alt="Punta Roca">

            <div class="card-content">

                <h3>Punta Roca</h3>

                <p>Puerto de La Libertad</p>

                <button onclick="openBeach('puntaRoca')">
                    Ver más...
                </button>

            </div>

        </div>

    </div>

</section>
<section class="featured-beaches">

    <div class="section-title">
        <h2>Playas destacadas</h2>
        <p>Descubre otros destinos increíbles para surfear en El Salvador.</p>
    </div>

    <div class="featured-grid">

        <div class="featured-card">
            <img src="img/playas/costa del sol.webp" alt="">
            <div class="overlay">
                <h4>Costa del Sol</h4>
                <span>Ideal para relajarse</span>
            </div>
        </div>

        <div class="featured-card">
            <img src="img/playas/puntamango.webp" alt="">
            <div class="overlay">
                <h4>Punta Mango</h4>
                <span>Olas potentes</span>
            </div>
        </div>

        <div class="featured-card">
            <img src="img/playas/labocana.webp" alt="">
            <div class="overlay">
                <h4>La Bocana</h4>
                <span>Surf de nivel mundial</span>
            </div>
        </div>

        <div class="featured-card">
            <img src="img/playas/metalio.webp" alt="">
            <div class="overlay">
                <h4>Metalío</h4>
                <span>Ambiente tranquilo</span>
            </div>
        </div>

        <div class="featured-card">
            <img src="img/playas/sandiego.jpg" alt="">
            <div class="overlay">
                <h4>San Diego</h4>
                <span>Perfecta para aprender</span>
            </div>
        </div>

    </div>

</section>

<section class="map-section">

    <h2>Explore the Map</h2>

    <div class="map-card">

        <div id="map"></div>

    </div>

</section>

 <div class="section-title">

        <h2>Más que playas</h2>

        <p>
            Todo lo que necesitas para vivir la experiencia completa del surf.
        </p>

    </div>


    <div class="more-grid">

        <div class="more-card">

            <img src="img/playas/escuelasurf.webp" alt="">

            <div class="more-content">

                <h3>Escuelas de surf</h3>

                <p>
                    Aprende con instructores certificados y mejora tu técnica.
                </p>

                <a href="academias.html">Ver escuelas →</a>

            </div>

        </div>

        <div class="more-card">

            <img src="img/playas/tiendas.webp" alt="">

            <div class="more-content">

                <h3>Tiendas</h3>

                <p>
                    Encuentra tablas, ropa y accesorios especializados.
                </p>

                <a href="">Ver tiendas →</a>

            </div>

        </div>

        <div class="more-card">

            <img src="img/playas/competencias.webp" alt="">

            <div class="more-content">

                <h3>Competencias</h3>

                <p>
                    No te pierdas los torneos y eventos de surf nacionales.
                </p>

                <a href="competencias.html">Ver competencias →</a>

            </div>

        </div>


        </div>

    </div>

<div class="beach-modal" id="beachModal">

    <div class="modal-container">

        <span class="close-modal">&times;</span>

        <div class="modal-carousel">

            <button class="carousel-arrow left-arrow">
                &#10094;
            </button>

            <img id="modalImage" src="" alt="Beach">

            <button class="carousel-arrow right-arrow">
                &#10095;
            </button>

        </div>

        <div class="modal-info">

            <h2 id="modalTitle"></h2>

            <div class="modal-details">

                <div class="detail-card">
                    <span id="modalLocation"></span>
                </div>

                <div class="detail-card">
                    <span id="modalWave"></span>
                </div>

                <div class="detail-card">
                    <span id="modalLevel"></span>
                </div>

                <div class="detail-card">
                    <span id="modalSeason"></span>
                </div>

            </div>

            <p id="modalDescription"></p>

            <div class="activities">

                <h3>Activities</h3>

                <ul id="activitiesList"></ul>

            </div>

        </div>

    </div>

</div>

<footer class="footer">

    <div class="container">

        <h3>Nuestro Objetivo</h3>

        <p class="footer-objective">

            Nuestro objetivo es ayudar a las personas a conocer más sobre el surf,
            descubrir las mejores playas de El Salvador, promover el turismo y
            fomentar el aprendizaje de este deporte a través de información útil,
            academias y eventos destacados.

        </p>

        <div class="footer-social">

            <a href="https://www.instagram.com/tidesurf_06?igsh=MTB3dnd0ZG5iNWJkbw==">Instagram</a>

            <a href=" https://chat.whatsapp.com/JwgjqdCgNBq9hLrAbfWoY">WhatsApp</a>

        <a href="mailto:tidesurf83@gmail.com?subject=Consulta&body=Hola, quisiera más información.">Gmail</a>

</a>


        </div>

    </div>

</footer>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script src="js/mapa.js"></script>

<script src="ride_the_wave.js"></script>

    <script src="js/navbar.js?v=login-si-no"></script>
</body>
</html>
