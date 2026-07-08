<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Escuelas de Surf - TIDE SURF</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css?v=perfil-icono" />
  <link rel="stylesheet" href="css/academias.css" />
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
</head>
<body class="has-site-navbar">
<div class="site-navbar-shell">
    <div class="site-navbar">
        <a class="site-navbar-brand" href="index.php" aria-label="TideSurf Inicio">
            <img src="logo-tidesurf-navbar.png" alt="TideSurf">
        </a>
        <nav class="site-navbar-menu" aria-label="Navegacion principal">
            <a href="index.php">Inicio</a>
            <a href="noticias.html">Noticias</a>
            <a href="competencias.php">Competencias</a>
            <a href="playas.html">Playas</a>
            <a href="escuelas.html">Escuelas de Surf</a>
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
    <img
        src="https://images.unsplash.com/photo-1509914398892-963f53e6e2f1?w=1400&auto=format&fit=crop"
        alt="Surfer riding a wave"
        class="hero__img"
    />

    

    <div class="hero__overlay">
        <h1 class="hero__title">Practica y mejora tu técnica</h1>
    </div>
</section>

<section class="usuarios">
    <h2>¿Para quién es?</h2>

    <div class="contenedor-cards">

        <div class="card">
            <div class="icono">🏫</div>
            <h3>Escuelas</h3>
            <p>Programas y herramientas para instituciones educativas.</p>
        </div>

        <div class="card">
            <div class="icono">👨‍🏫</div>
            <h3>Instructores</h3>
            <p>Recursos y certificaciones para profesionales del surf.</p>
        </div>

        <div class="card">
            <div class="icono">👤</div>
            <h3>Estudiantes</h3>
            <p>Cursos y experiencias para todos los niveles.</p>
        </div>

        <div class="card">
            <div class="icono">👥</div>
            <h3>Comunidad</h3>
            <p>Eventos, competencias y actividades para todos.</p>
        </div>

    </div>
</section>

<section class="schools">
    <div class="cards-grid">

        <div class="card">
            <div class="card__img-wrapper">
                <img src="https://images.unsplash.com/photo-1502680390469-be75c86b636f?w=400&auto=format&fit=crop" alt="Tunco Surf School" class="card__img"/>
            </div>
            <div class="card__body">
                <h3 class="card__name">Tunco Surf School</h3>
                <p class="card__location"> Playa El Tunco - El Salvador</p>
                <div class="card__rating">
                    <span class="card__stars">★★★★☆</span>
                    <span class="card__reviews">4.1 (120 reseñas)</span>
                </div>
                <button class="card__btn" onclick="openModal('tuncoModal')">Ver más</button>
            </div>
        </div>

        <div class="card">
            <div class="card__img-wrapper">
                <img src="https://images.unsplash.com/photo-1455729552869-3658a5d39692?w=400&auto=format&fit=crop" alt="Sunzal El Salvador Company" class="card__img"/>
            </div>
            <div class="card__body">
                <h3 class="card__name">Sunzal El Salvador Company</h3>
                <p class="card__location">Playa Sunzal - El Salvador</p>
                <div class="card__rating">
                    <span class="card__stars">★★★★☆</span>
                    <span class="card__reviews">4.1 (120 reseñas)</span>
                </div>
                <button class="card__btn" onclick="openModal('sunzalModal')">Ver más</button>
            </div>
        </div>

        <div class="card">
            <div class="card__img-wrapper">
                <img src="https://images.unsplash.com/photo-1531722569936-825d3dd91b15?w=400&auto=format&fit=crop" alt="Puro Surf Academy" class="card__img"/>
            </div>
            <div class="card__body">
                <h3 class="card__name">Puro Surf Academy</h3>
                <p class="card__location">Playa El Zonte - El Salvador</p>
                <div class="card__rating">
                    <span class="card__stars">★★★★☆</span>
                    <span class="card__reviews">4.1 (120 reseñas)</span>
                </div>
                <button class="card__btn" onclick="openModal('puroModal')">Ver más</button>
            </div>
        </div>

        <div class="card">
            <div class="card__img-wrapper">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&auto=format&fit=crop" alt="Slow Motion Surf School" class="card__img"/>
            </div>
            <div class="card__body">
                <h3 class="card__name">Slow Motion Surf School</h3>
                <p class="card__location"> Playa El Tunco - El Salvador</p>
                <div class="card__rating">
                    <span class="card__stars">★★★★☆</span>
                    <span class="card__reviews">4.1 (120 reseñas)</span>
                </div>
                <button class="card__btn" onclick="openModal('slowModal')">Ver más</button>
            </div>
        </div>

        <div class="card">
            <div class="card__img-wrapper">
                <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&auto=format&fit=crop" alt="Tunco Surf School 2" class="card__img"/>
            </div>
            <div class="card__body">
                <h3 class="card__name">Tunco Surf School Premium</h3>
                <p class="card__location">Playa El Tunco - El Salvador</p>
                <div class="card__rating">
                    <span class="card__stars">★★★★☆</span>
                    <span class="card__reviews">4.1 (120 reseñas)</span>
                </div>
                <button class="card__btn" onclick="openModal('premiumModal')">Ver más</button>
            </div>
        </div>

        <div class="card">
            <div class="card__img-wrapper">
                <img src="https://images.unsplash.com/photo-1476673160081-cf065607f449?w=400&auto=format&fit=crop" alt="Tunco Surf School 3" class="card__img"/>
            </div>
            <div class="card__body">
                <h3 class="card__name">Tunco Surf School Pro</h3>
                <p class="card__location">Playa El Tunco - El Salvador</p>
                <div class="card__rating">
                    <span class="card__stars">★★★★☆</span>
                    <span class="card__reviews">4.1 (120 reseñas)</span>
                </div>
                <button class="card__btn" onclick="openModal('proModal')">Ver más</button>
            </div>
        </div>

    </div>
</section>
<div class="academy-modal" id="tuncoModal">
<div class="academy-modal-content">
<span class="close-modal" onclick="closeModal('tuncoModal')">&times;</span>

<img src="https://images.unsplash.com/photo-1502680390469-be75c86b636f?w=1200" class="modal-banner">

<div class="modal-info">
<h2>Tunco Surf School</h2>
<p> Playa El Tunco, La Libertad</p>
<div class="modal-rating">⭐⭐⭐⭐⭐ 4.9 (243 Reseñas)</div>

<p>
Escuela de surf profesional para principiantes y surfistas avanzados.
Instructores certificados y equipo moderno.
</p>

<div class="modal-contact">
<p> 8923-3333</p>
<p> info@tuncosurf.com</p>
</div>

<button class="modal-register-btn">Inscribirme</button>
</div>
</div>
</div>

<div class="academy-modal" id="sunzalModal">
<div class="academy-modal-content">
<span class="close-modal" onclick="closeModal('sunzalModal')">&times;</span>

<img src="https://images.unsplash.com/photo-1455729552869-3658a5d39692?w=1200" class="modal-banner">

<div class="modal-info">
<h2>Sunzal El Salvador Company</h2>
<p> Playa Sunzal, La Libertad</p>
<div class="modal-rating">⭐⭐⭐⭐⭐ 4.8 (189 Reseñas)</div>

<p>
Enfocados en entrenamiento de longboard y lectura de olas.
Perfecto para surfistas que buscan mejorar su técnica.
</p>

<div class="modal-contact">
<p> 7865-2234</p>
<p> contact@sunzalsurf.com</p>
</div>

<button class="modal-register-btn">Inscribirme</button>
</div>
</div>
</div>

<div class="academy-modal" id="puroModal">
<div class="academy-modal-content">
<span class="close-modal" onclick="closeModal('puroModal')">&times;</span>

<img src="https://images.unsplash.com/photo-1531722569936-825d3dd91b15?w=1200" class="modal-banner">

<div class="modal-info">
<h2>Puro Surf Academy</h2>
<p> Playa El Zonte</p>
<div class="modal-rating">⭐⭐⭐⭐⭐ 5.0 (310 Reseñas)</div>

<p>
Academia internacional de surf con programas intensivos,
entrenamiento profesional y paquetes de alojamiento.
</p>

<div class="modal-contact">
<p> 7456-8812</p>
<p> info@purosurf.com</p>
</div>

<button class="modal-register-btn">Inscribirme</button>
</div>
</div>
</div>


<div class="academy-modal" id="slowModal">
<div class="academy-modal-content">
<span class="close-modal" onclick="closeModal('slowModal')">&times;</span>

<img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200" class="modal-banner">

<div class="modal-info">
<h2>Slow Motion Surf School</h2>
<p> Playa El Tunco</p>
<div class="modal-rating">⭐⭐⭐⭐☆ 4.6 (154 Reseñas)</div>

<p>
Amigable escuela de surf enfocada en principiantes y clases familiares.
Grupos pequeños y atención personalizada.
</p>

<div class="modal-contact">
<p> 7789-1223</p>
<p> hello@slowmotionsurf.com</p>
</div>

<button class="modal-register-btn">Inscribirme</button>
</div>
</div>
</div>


<div class="academy-modal" id="premiumModal">
<div class="academy-modal-content">
<span class="close-modal" onclick="closeModal('premiumModal')">&times;</span>

<img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=1200" class="modal-banner">

<div class="modal-info">
<h2>Tunco Surf School Premium</h2>
<p> Playa El Tunco</p>
<div class="modal-rating">⭐⭐⭐⭐⭐ 4.9 (275 Reseñas)</div>

<p>
Clases premium con instructores privados,
análisis de video y preparación para competiciones.
</p>

<div class="modal-contact">
<p> 7123-4545</p>
<p> premium@tuncosurf.com</p>
</div>

<button class="modal-register-btn">Inscribirme</button>
</div>
</div>
</div>


<div class="academy-modal" id="proModal">
<div class="academy-modal-content">
<span class="close-modal" onclick="closeModal('proModal')">&times;</span>

<img src="https://images.unsplash.com/photo-1476673160081-cf065607f449?w=1200" class="modal-banner">

<div class="modal-info">
<h2>Tunco Surf School Pro</h2>
<p> Playa El Tunco</p>
<div class="modal-rating">⭐⭐⭐⭐⭐ 4.8 (210 Reseñas)</div>

<p>
Entrenamiento avanzado de surf, preparación ISA,
y entrenamiento para competiciones regionales.
</p>

<div class="modal-contact">
<p> 7894-3311</p>
<p> pro@tuncosurf.com</p>
</div>

<button class="modal-register-btn">Inscribirme</button>
</div>
</div>
</div>

<!-- FOOTER -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/academias.js"></script>

    <script src="js/navbar.js?v=login-si-no"></script>
</body>
</html>
