<?php
session_start();
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

    <title>TideSurf - Sobre Nosotros</title>
    <link rel="stylesheet" href="css/sobre_nosotros.css?v=perfil-icono">
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  
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

<main>

    <section class="hero">

        <img class="hero-img" src="img/sobre-nosotros/playa4.jpg" alt="Surfistas">

        <div class="hero-content">
            <h2>SOMOS MÁS QUE SURF</h2>
            <h1>SOMOS UN ESTILO DE VIDA.</h1>
        </div>

    </section>

    <section class="quienes-somos">

        <div class="quienes-container">

            <div class="quienes-texto">

                <h2>¿QUIÉNES SOMOS?</h2>

                <p>
                    TideSurf nace del amor por el océano y la pasión por el surf.
                    Somos una comunidad de amantes del mar que creemos en el poder
                    de las olas para transformar vidas.
                </p>

                <p>
                    Nuestro equipo está formado por surfistas, instructores certificados
                    y soñadores que viven para compartir experiencias auténticas,
                    fomentar la conexión con la naturaleza y promover un estilo de vida
                    saludable, consciente y libre.
                </p>




                <div  class="ofrecemos">

                    <article  class="ofrece">
                <img src="https://img.icons8.com/?size=100&id=lFyaayFdhpED&format=png&color=000000" alt="Corazon">

                <h3>pasión</h3>
                    </article>

                     <article  class="ofrece">
                <img src="https://img.icons8.com/?size=100&id=cvl2w1ENS57o&format=png&color=000000" alt="SOSTENIBILIDAD">

                <h3>Sostenibilidad</h3>
                    </article>
                </div>
                    
            </div>

            <div class="quienes-imagen">

                <img src="img/competencias/_DSC7703.jpg" alt="">


    
</div>

<div class="burbuja">


</div>
<p>
        <span class="celeste">El océano nos inspira,</span><br>
        <span class="blanco">la comunidad nos impulsa.</span>
    </p>
            </div>

        </div>

    </section>

    <section class="mision-vision">

        <article class="card">

            <img src="https://img.icons8.com/?size=100&id=37965&format=png&color=000000" alt="Mision">

            <h3>MISIÓN</h3>

            <p>
                Fomentar el amor por el surf y el océano,
                ofreciendo experiencias inolvidables,
                formación de calidad y un entorno seguro,
                inclusivo y sostenible.
            </p>

        </article>
        

        <article class="card">

            <img src="https://img.icons8.com/?size=100&id=pzUgacknIvvX&format=png&color=000000" alt="VISIÓN">

            <h3>VISIÓN</h3>

            <p>
                Ser la comunidad de surf referente en Latinoamérica,
                reconocida por nuestra pasión, valores y compromiso
                con el desarrollo personal y el cuidado del océano.
            </p>

        </article>

    </section>

    <section class="por-que-elegir">

        <h2>¿POR QUÉ ELEGIR TIDESURF?</h2>

        <div class="beneficios-grid">

            <article class="beneficio">

                <img src="https://img.icons8.com/?size=100&id=3734&format=png&color=000000" alt="comunidad">

                <h3>COMUNIDAD</h3>

                <p>
                    Más que clientes, somos amigos.
                    Aquí encuentras tu tribu.
                </p>

            </article>

            <article class="beneficio">

                <img src="https://img.icons8.com/?size=100&id=118881&format=png&color=000000" alt="experiencias">

                <h3>EXPERIENCIAS ÚNICAS</h3>

                <p>
                    Desde clases y surf trips
                    hasta eventos y aventuras individuales.
                </p>

            </article>

            <article class="beneficio">

                <img src="https://img.icons8.com/?size=100&id=101796&format=png&color=000000" alt="medalla">

                <h3>INSTRUCTORES CERTIFICADOS</h3>

                <p>
                    Profesionales apasionados que te guían
                    en cada ola y cada paso.
                </p>

            </article>

            <article class="beneficio">

                <img src="https://img.icons8.com/?size=100&id=48737&format=png&color=000000" alt="leaf">

                <h3>SOSTENIBILIDAD</h3>

                <p>
                    Cuidamos nuestras playas y promovemos
                    un impacto positivo en el planeta.
                </p>

            </article>

            <article class="beneficio">

                <img src="https://img.icons8.com/?size=100&id=G9rmkR0PN36N&format=png&color=000000" alt="wave">

                <h3>EQUIPO DE CALIDAD</h3>

                <p>
                    Contamos con el mejor equipo de surf
                    para que solo te preocupes por disfrutar.
                </p>

            </article>

            <article class="beneficio">

                <img src="https://img.icons8.com/?size=100&id=42394&format=png&color=000000" alt="tag">

                <h3>BENEFICIOS EXCLUSIVOS</h3>

                <p>
                    Acceso a eventos, descuentos en equipos
                    y sorpresas solo para nuestra comunidad.
                </p>

            </article>

        </div>

    </section>
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


   
