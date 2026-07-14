<?php
session_start();
include __DIR__ . "/php/conexion.php";

$sql = "SELECT * FROM escuelas_surf";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error: " . $conn->error);
}
?>
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <a href="competencias.html">Competencias</a>
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

<section class="hero-escuelas">

    <img
        src="img/escuelas/heroescuelas.jpg"
        alt="Surfista practicando"
        class="hero-escuelas__img"
    >

    <div class="hero-escuelas__overlay">

        <h1 class="hero-escuelas__title">
            Practica y mejora tu técnica
        </h1>

    </div>

</section>

<section class="usuarios">

    <div class="usuarios-contenedor">

        <div class="usuarios-imagen">
            <img src="img/escuelas/surf-4.jpeg" alt="Personas practicando surf">
        </div>

        <div class="usuarios-info">

            <h2>¿Que encuentras en esta seccion?</h2>

            <div class="usuario-item">
                <div class="icono">
                    <i class='bx bxs-school'></i>
                </div>

                <div class="texto">
                    <h3>Escuelas</h3>
                    <p>Programas y herramientas para instituciones educativas interesadas en promover el surf.</p>
                </div>
            </div>

            <div class="usuario-item">
                <div class="icono">
                    <i class='bx bxs-graduation'></i>
                </div>

                <div class="texto">
                    <h3>Instructores</h3>
                    <p>Recursos, certificaciones e información para profesionales y entrenadores de surf.</p>
                </div>
            </div>

            <div class="usuario-item">
                <div class="icono">
                    <i class='bx bx-user'></i>
                </div>

                <div class="texto">
                    <h3>Estudiantes</h3>
                    <p>Cursos, playas recomendadas y experiencias para aprender desde cero o mejorar habilidades.</p>
                </div>
            </div>

            <div class="usuario-item">
                <div class="icono">
                    <i class='bx bx-group'></i>
                </div>

                <div class="texto">
                    <h3>Comunidad</h3>
                    <p>Eventos, competencias y actividades para conectar con otros amantes del surf.</p>
                </div>
            </div>

        </div>

    </div>

</section>


<section class="schools">
    <div class="cards-grid">

    <?php while($escuela = $resultado->fetch_assoc()) { ?>

        <div class="card">

            <div class="card__img-wrapper">
                <img src="<?= $escuela['imagen']; ?>" class="card__img" alt="<?= $escuela['nombre']; ?>">
            </div>

            <div class="card__body">

                <h3 class="card__name"><?= $escuela['nombre']; ?></h3>

                <p class="card__location"><?= $escuela['ubicacion']; ?></p>

                <div class="card__rating">
                    <span class="card__stars">
                        <?= str_repeat("⭐", round($escuela['estrellas'])); ?>
                    </span>

                    <span class="card__reviews">
                        <?= $escuela['estrellas']; ?>
                        (<?= $escuela['total_reseñas']; ?> reseñas)
                    </span>
                </div>

                <button
                    class="card__btn"
                    onclick="openModal(
                        '<?= $escuela['imagen']; ?>',
                        '<?= htmlspecialchars(addslashes($escuela['nombre'])); ?>',
                        '<?= htmlspecialchars(addslashes($escuela['ubicacion'])); ?>',
                        '<?= $escuela['estrellas']; ?>',
                        '<?= $escuela['total_reseñas']; ?>',
                        '<?= htmlspecialchars(addslashes($escuela['descripcion'])); ?>',
                        '<?= $escuela['telefono']; ?>',
                        '<?= $escuela['email']; ?>'
                    )">
                    Ver más
                </button>

            </div>

        </div>

    <?php } ?>

    </div>
</section>
<div class="academy-modal" id="academyModal">

    <div class="academy-modal-content">

        <span class="close-modal" onclick="closeModal()">&times;</span>

        <img id="modalImagen" class="modal-banner">

        <div class="modal-info">

            <h2 id="modalNombre"></h2>

            <p id="modalUbicacion"></p>

            <div class="modal-rating" id="modalRating"></div>

            <p id="modalDescripcion"></p>

            <div class="modal-contact">

                <p id="modalTelefono"></p>

                <p id="modalEmail"></p>

            </div>

            <button class="modal-register-btn">
                Inscribirme
            </button>

        </div>

    </div>

</div>

<section class="faq">

    <div class="faq-container">

        <h2>Preguntas frecuentes</h2>
        <p class="faq-subtitle">
            Resuelve tus dudas sobre las escuelas de surf y cómo empezar tu experiencia.
        </p>


        <div class="faq-item">

            <button class="faq-question">
                ¿Necesito experiencia para aprender surf?
                <span>+</span>
            </button>

            <div class="faq-answer">
                <p>
                    No. Las escuelas cuentan con programas para principiantes donde
                    aprenderás desde lo básico hasta mejorar tus habilidades.
                </p>
            </div>

        </div>


        <div class="faq-item">

            <button class="faq-question">
                ¿Qué necesito para tomar una clase de surf?
                <span>+</span>
            </button>

            <div class="faq-answer">
                <p>
                    Solo necesitas ganas de aprender. Las escuelas normalmente
                    proporcionan tabla, equipo de seguridad e instructores capacitados.
                </p>
            </div>

        </div>


        <div class="faq-item">

            <button class="faq-question">
                ¿Cuánto dura una clase de surf?
                <span>+</span>
            </button>

            <div class="faq-answer">
                <p>
                    La duración depende de cada escuela, pero generalmente las clases
                    duran entre una y dos horas.
                </p>
            </div>

        </div>


        <div class="faq-item">

            <button class="faq-question">
                ¿Qué playas son recomendadas para aprender?
                <span>+</span>
            </button>

            <div class="faq-answer">
                <p>
                    Playas como El Tunco, El Sunzal y otras zonas de La Libertad
                    cuentan con escuelas ideales para diferentes niveles.
                </p>
            </div>

        </div>


    </div>

</section>

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

    <script>
        const preguntas = document.querySelectorAll(".faq-question");

        preguntas.forEach(pregunta => {

            pregunta.addEventListener("click", () => {

                const item = pregunta.parentElement;

                item.classList.toggle("active");

    });

});
</script>

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
