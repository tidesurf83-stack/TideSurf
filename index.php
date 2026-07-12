<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIDE SURF - Inicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css?v=perfil-icono">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
</head>


<div class="site-navbar-shell">
    <div class="site-navbar">
        <a class="site-navbar-brand" href="index.php" aria-label="TideSurf Inicio">
            <img src="logo-tidesurf-navbar.png" alt="TideSurf">
        </a>
        <nav class="site-navbar-menu" aria-label="Navegacion principal">
            <a href="index.php">Inicio</a>
            <a href="noticias.php">Noticias</a>
            <a href="competencias.php">Competencias</a>
            <a href="playas.php">Playas</a>
            <a href="escuelas.html">Escuelas de Surf</a>
            <a href="tiendas.php">Tiendas</a>
            <a href="galeria.html">Galeria</a>
            <a href="sobre_nosotros.html">Sobre Nosotros</a>
        </nav>
        <a href="perfil.php" class="site-profile-avatar" aria-label="Mi Perfil">
            <span class="site-avatar-icon"></span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.html">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="noticias.php">Noticias</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="competencias.php">Competencias</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="playas.php">Playas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="escuelas.php">Escuelas de Surf</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tiendas.html">Tiendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="galeria.php">Galería</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="sobre_nosotros.html">Sobre Nosotros</a>
                </li>

            </ul>
    </div>
</div>

            <div class="nav-buttons">

                <?php if (isset($_SESSION['usuario_id'])): ?>

                <a href="php/logout.php" class="btn-login">
                    Cerrar sesión
                </a>

                <?php else: ?>

                    

                <?php endif; ?>

            </div>

        </div>

     </div>
</div>

<section class="hero">
    

    <div class="hero-overlay"></div>

    <div class="container hero-content">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h1>
                    VIVE EL
                    <span>SURF</span>
                </h1>

                <p>
                    Conecta con el océano, desafía tus límites y siente la libertad sobre las olas.
                </p>

                <div class="hero-buttons">


                </div>

            </div>

        </div>

    </div>

</section>

<section class="features-section">

    <div class="container">

        <div class="row text-center g-4">

            <div class="col-lg-3 col-md-6">

                <div class="feature-card">


                    <h4>Olas todo el año</h4>

                    <p>
                        Disfruta de las mejores condiciones para surfear durante cualquier temporada.
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">
                        
                    </div>

                    <h4>Clima tropical</h4>

                    <p>
                        Temperaturas agradables para disfrutar del mar durante todo el año.
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">
                        
                    </div>

                    <h4>Fácil acceso</h4>

                    <p>
                        Las mejores playas están a pocas horas de distancia.
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">
                        
                    </div>

                    <h4>Surf para todos</h4>

                    <p>
                        Opciones ideales para principiantes y surfistas avanzados.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="stats-section">

    <div class="container">

        <div class="row text-center">

            <div class="col-lg-3 col-md-6">

                <div class="stat-box">

                    <h2 class="counter" data-target="15">0</h2>

                    <p>Playas para surfear</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stat-box">

                    <h2 class="counter" data-target="5000">0</h2>

                    <p>Surfistas cada año</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stat-box">

                    <h2 class="counter" data-target="100">0</h2>

                    <p>Eventos realizados</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stat-box">

                    <h2 class="counter" data-target="365">0</h2>

                    <p>Días de olas</p>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="featured-events">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-8">

                <div class="featured-beach">

                    <img src="img/homepage/el tunco.webp" alt="El Tunco">

                    <div class="featured-overlay">

                        <span class="badge-featured">
                            Playa del Mes
                        </span>

                        <h2>El Tunco</h2>

                        <p>
                            Uno de los destinos más populares para surfear
                            en El Salvador. Ideal para principiantes e
                            intermedios.
                        </p>

                        <div class="beach-info">

                            <div>
                                 Intermedio
                            </div>

                            <div>
                                 La Libertad
                            </div>

                            <div>
                                 Todo el año
                            </div>

                        </div>

                        <a href="playas.php" class="btn-beach">
                            Explorar Playas
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="events-card">

                    <h3>
                        Próximos Eventos
                    </h3>

                    <div class="event-item">

                        <span>15 JUL</span>

                        <div>
                            <h5>Surf Fest 2026</h5>
                            <p>El Tunco</p>
                        </div>

                    </div>

                    <div class="event-item">

                        <span>28 JUL</span>

                        <div>
                            <h5>Campeonato Nacional</h5>
                            <p>Punta Roca</p>
                        </div>

                    </div>

                    <div class="event-item">

                        <span>10 AGO</span>

                        <div>
                            <h5>Junior Surf Open</h5>
                            <p>El Zonte</p>
                        </div>

                    </div>

                    <a href="noticias.php" class="btn-events">
                        Ver Todos
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="beaches-section">

    <div class="container">

        <div class="section-title">

            <span>DESTINOS</span>

            <h2>Explora Nuestras Playas</h2>

            <p>
                Descubre los mejores lugares para surfear en El Salvador.
            </p>

        </div>

        <div class="swiper beachesSwiper">

            <div class="swiper-wrapper">

                <div class="swiper-slide">

                    <div class="beach-card">

                        <img src="img/homepage/tunco 1.jpg">

                        <div class="beach-content">

                            <h4>El Tunco</h4>

                            <p>La Libertad</p>

                            <div class="level">
                                Intermedio
                            </div>

                            <a href="#">
                                Explorar
                            </a>

                        </div>

                    </div>

                </div>


                <div class="swiper-slide">

                    <div class="beach-card">

                        <img src="img/homepage/principiantes-surf-camp.jpg">

                        <div class="beach-content">

                            <h4>El Zonte</h4>

                            <p>La Libertad</p>

                            <div class="level">
                                Principiante
                            </div>

                            <a href="#">
                                Explorar
                            </a>

                        </div>

                    </div>

                </div>

                <div class="swiper-slide">

                    <div class="beach-card">

                        <img src="img/homepage/El_Salvador_Punta_Roca.jpeg">

                        <div class="beach-content">

                            <h4>Punta Roca</h4>

                            <p>La Libertad</p>

                            <div class="level">
                                Avanzado
                            </div>

                            <a href="playas.php">
                                Explorar
                            </a>

                        </div>

                    </div>

                </div>

                <div class="swiper-slide">

                    <div class="beach-card">

                        <img src="img/homepage/el salvador pro.jpg">

                        <div class="beach-content">

                            <h4>Mizata</h4>

                            <p>Sonsonate</p>

                            <div class="level">
                                Intermedio
                            </div>

                            <a href="playas.php">
                                Explorar
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </div>

</section>


<section class="info-section">

    <div class="container">

        <div class="section-title">

            <span>DESCUBRE MÁS</span>

            <h2>El Surf Más Allá de las Olas</h2>

            <p>
                Conoce los beneficios, el impacto económico y los surfistas que representan a El Salvador.
            </p>

        </div>

        <div class="row g-4">


            <div class="col-lg-4">

                <div class="info-card benefit-card">

                    <div class="card-icon">
                        
                    </div>

                    <h3>Beneficios del Surf</h3>

                    <ul>

                        <li>Mejora el equilibrio</li>

                        <li>Fortalece músculos</li>

                        <li>Reduce el estrés</li>

                        <li>Conecta con la naturaleza</li>

                    </ul>

                    <a href="#">
                        
                    </a>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="info-card impact-card">

                    <div class="card-icon">
                        
                    </div>

                    <h3>Impacto Económico</h3>

                    <ul>

                        <li>Impulsa el turismo</li>

                        <li>Genera empleo local</li>

                        <li>Apoya comercios costeros</li>

                        <li>Atrae inversión internacional</li>

                    </ul>

                    <a href="#">
                       
                    </a>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="info-card surfers-card">

                    <div class="card-icon">
                        
                    </div>

                    <h3>Surfistas Destacados</h3>

                    <ul>

                        <li>Bryan Pérez</li>

                        <li>Amado Alvarado</li>

                        <li>Isabella Gómez</li>

                        <li>Nuevas promesas juveniles</li>

                    </ul>

                    <a href="#">
                        
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="dynamic-section">

    <div class="container">

        <div class="section-title">

            <h2>EXPLORA MÁS</h2>

            <p>
                Descubre consejos, playas recomendadas y eventos destacados.
            </p>

        </div>

        <div class="row g-4">


            <div class="col-lg-4">

                <div class="dynamic-card">

                    <div class="dynamic-icon">
                        
                    </div>

                    <h3>Tip del Día</h3>

                    <p id="surfTip">
                        Mantén la mirada al frente para mejorar tu equilibrio.
                    </p>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="dynamic-card">

                    <div class="dynamic-icon">
                        
                    </div>

                    <h3>Playa Recomendada</h3>

                    <div id="recommendedBeach">

                        <h5>El Zonte</h5>

                        <p>
                            Ideal para surfistas intermedios.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="dynamic-card">

                    <div class="dynamic-icon">
                        
                    </div>

                    <h3>Próximo Evento</h3>

                    <div id="eventInfo">

                        <h5>Surf Fest 2026</h5>

                        <p>
                            15 de Julio · El Tunco
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="event-section">

    <div class="event-wrapper">


        <div class="event-image">

            <img src="img/homepage/punta roca evento.jpg" alt="Punta Roca">

            <div class="image-badge">
                 EVENTO DEL MOMENTO
            </div>

        </div>


        <div class="featured-event">

            <div class="event-background-circle circle-1"></div>
            <div class="event-background-circle circle-2"></div>

            <h2>Surf City El Salvador Pro</h2>

            <p class="event-description">

                Punta Roca vuelve a convertirse en el centro del surf mundial,
                reuniendo a algunos de los mejores surfistas profesionales
                en una de las olas más reconocidas de Centroamérica.

            </p>

            <div class="event-details">

                <div class="detail-box"> Punta Roca</div>

                <div class="detail-box"> Evento Internacional</div>

                <div class="detail-box"> Surf Profesional</div>

            </div>

            <div class="event-stats">

                <div class="stat-item">
                    <h4>+120</h4>
                    <span>Atletas</span>
                </div>

                <div class="stat-item">
                    <h4>+30</h4>
                    <span>Países</span>
                </div>

                <div class="stat-item">
                    <h4>50K+</h4>
                    <span>Espectadores</span>
                </div>

            </div>

<div class="beach-info">

    <h5>Información de la Playa</h5>

    <div class="beach-info-grid">

        <div class="info-card">
            <span class="info-icon"></span>
            <div>
                <strong>Ubicación</strong>
                <p>La Libertad</p>
            </div>
        </div>

        <div class="info-card">
            <span class="info-icon"></span>
            <div>
                <strong>Tipo de Ola</strong>
                <p>Derecha</p>
            </div>
        </div>

        <div class="info-card">
            <span class="info-icon"></span>
            <div>
                <strong>Mejor Temporada</strong>
                <p>Marzo - Octubre</p>
            </div>
        </div>

        <div class="info-card">
            <span class="info-icon"></span>
            <div>
                <strong>Nivel</strong>
                <p>Intermedio - Avanzado</p>
            </div>
        </div>

    </div>

</div>


        </div>

    </div>

</section>

<section class="explore-banner">

    <div class="banner-overlay">

        <span class="banner-tag">
             TIDESURF
        </span>

        <h2>
            Descubre las mejores playas
            para surfear en El Salvador
        </h2>

        <p>

            Explora destinos increíbles,
            encuentra academias y conoce
            todo sobre el surf salvadoreño.

        </p>

        <div class="banner-buttons">

            <a href="#" class="btn-banner-primary">
                Explorar Playas
            </a>

            <a href="escuelas.php" class="btn-banner-secondary">
                Ver Academias
            </a>

        </div>

    </div>

</section>

<section class="news-section">

    <div class="container">

        <div class="section-title">
            <span></span>
            <h2>Últimas Noticias</h2>
            <p>
                Mantente informado sobre los eventos, competiciones
                y novedades más importantes del surf en El Salvador.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="news-card">

                    <div class="news-image">
                        <img src="img/homepage/surf3.webp" alt="">
                    </div>

                    <div class="news-content">

                        <span class="news-tag">
                            Competencia
                        </span>

                        <h4>
                            Surf City El Salvador Pro reúne a los mejores surfistas del mundo
                        </h4>

                        <p>
                            Punta Roca vuelve a ser el escenario de una de las competencias más importantes del circuito internacional.
                        </p>

                        <a href="competencias.php">
                            
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="news-card">

                    <div class="news-image">
                        <img src="img/homepage/surf1.webp" alt="">
                    </div>

                    <div class="news-content">

                        <span class="news-tag">
                            Turismo
                        </span>

                        <h4>
                            El surf impulsa el turismo en las costas salvadoreñas
                        </h4>

                        <p>
                            Miles de visitantes llegan cada año para disfrutar de las olas y las playas del país.
                        </p>

                        <a href="#">
                            
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="news-card">

                    <div class="news-image">
                        <img src="img/homepage/surf2.webp" alt="">
                    </div>

                    <div class="news-content">

                        <span class="news-tag">
                            Educación
                        </span>

                        <h4>
                            Nuevas academias de surf abren oportunidades para principiantes
                        </h4>

                        <p>
                            Cada vez más personas se interesan en aprender este deporte y vivir la experiencia del océano.
                        </p>

                        <a href="#">
                             
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="text-center mt-5">

            <a href="#" class="btn-all-news">
                Ver todas las noticias
            </a>

        </div>

    </div>

</section>


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
</div>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/navbar.js?v=login-si-no"></script>
</body>
</html>
