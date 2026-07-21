<?php
session_start();
include __DIR__ . "/php/conexion.php";

$sql = "SELECT * FROM surf_facts";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error: " . $conn->error);
}
?>
<head>
    <?php include("head.php"); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="TideSurf" />
    <meta property="og:description" content="TideSurf es una plataforma donde puede empezar tu gusto hacia el Surf o seguir con la pasión hacia el deporte" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://tidesurf.infinityfreeapp.com/?i=1" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="TideSurf" />


    <title>Tide Surf</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <link rel="stylesheet" href="css/playas.css?v=perfil-icono">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">

    <link rel="stylesheet" href="css/footer.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
</head>

<body>

    
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


<section class="hero-playas">

    <div class="hero-content-playas">

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
    <div class="top-divider"></div>

    <h2>
        Top 3 Playas de <span id="monthName"></span>
    </h2>


    <p class="month-subtitle">
        Las playas recomendadas para este mes.
    </p>



    <div class="top-grid">
        


        <!-- TOP 1 -->

        <div class="top-card gold" 
        id="top1-card"
        onclick="openTopModal(0)">


            <span class="medal">
                
            </span>


            <img id="top1-img" src="" alt="">


            <h3 id="top1-name"></h3>


            <p id="top1-location"></p>


        </div>




        <!-- TOP 2 -->

        <div class="top-card silver" 
        id="top2-card"
        onclick="openTopModal(1)">


            <span class="medal">
                
            </span>


            <img id="top2-img" src="" alt="">


            <h3 id="top2-name"></h3>


            <p id="top2-location"></p>


        </div>




        <!-- TOP 3 -->

        <div class="top-card bronze" 
        id="top3-card"
        onclick="openTopModal(2)">


            <span class="medal">
                
            </span>


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

                <a href="escuelas.php">Ver escuelas →</a>

            </div>

        </div>

        <div class="more-card">

            <img src="img/playas/tiendas.webp" alt="">

            <div class="more-content">

                <h3>Tiendas</h3>

                <p>
                    Encuentra tablas, ropa y accesorios especializados.
                </p>

                <a href="tiendas.php">Ver tiendas →</a>

            </div>

        </div>

        <div class="more-card">

            <img src="img/playas/competencias.webp" alt="">

            <div class="more-content">

                <h3>Competencias</h3>

                <p>
                    No te pierdas los torneos y eventos de surf nacionales.
                </p>

                <a href="competencias.php">Ver competencias →</a>

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

                <h3>Actividades</h3>

                <ul id="activitiesList"></ul>

            </div>

        </div>

    </div>

</div>




<div class="top-modal" id="topModal">


    <div class="top-modal-content">


        <span class="close-top-modal">
            &times;
        </span>



        <img id="topModalImage" src="" alt="">



        <h2 id="topModalName"></h2>



        <div class="top-info-grid">


    <div>

        <i class="bi bi-trophy-fill"></i>

        <br>

        Ranking

        <br>

        <span id="topModalRank"></span>

    </div>



    <div>

        <i class="bi bi-geo-alt-fill"></i>

        <br>

        Ubicación

        <br>

        <span id="topModalLocation"></span>

    </div>



    <div class="wave-animation">

        <i class="bi bi-water"></i>

        <br>

        Oleaje

        <br>

        <span id="topModalWave"></span>

    </div>




    <div class="wind-animation">

        <i class="bi bi-wind"></i>

        <br>

        Temperatura

        <br>

        <span id="topModalWater"></span>

    </div>




    <div>

        <i class="bi bi-person-fill"></i>

        <br>

        Nivel

        <br>

        <span id="topModalLevel"></span>

    </div>




    <div>

        <i class="bi bi-star-fill"></i>

        <br>

        Puntuación

        <br>

        <span id="topModalScore"></span>

    </div>


</div>




        <h3>
            ¿Por qué está en el Top 3?
        </h3>


        <p id="topModalDescription"></p>



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


<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script src="js/mapa.js"></script>

<script src="ride_the_wave.js"></script>

    <script src="js/navbar.js?v=login-si-no"></script>

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
