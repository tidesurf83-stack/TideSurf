<?php
session_start();
// Conexión a la base de datos
$servername = "localhost";
$username   = "root";       // cambia si tu usuario es distinto
$password   = "";           // cambia si tu contraseña es distinta
$dbname     = "tidesurf";   // tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería - TIDE SURF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=perfil-icono">
    <link rel="stylesheet" href="css/galeria.css">
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
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

<section class="grid-gallery-section container mt-5 mb-5">
    <div class="section-title">
        <h2>Galería de Tidesurr</h2>
    </div>
    <div class="gallery-grid">
        <?php
        // Consultar la tabla galerias
        $sql = "SELECT * FROM galerias";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="gallery-item">';
                echo '<img src="'.$row["imagen_url"].'" alt="'.$row["descripcion"].'">';
                echo '<div class="gallery-overlay"><i class="fas fa-expand"></i></div>';
                echo '</div>';
            }
        } else {
            echo "No hay fotos en la galería.";
        }
        ?>
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
            <a href="#">Instagram</a>
            
            
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
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
<?php
$conn->close();
?>
