<?php
session_start();

include __DIR__ . "/php/conexion.php";

$sql = "SELECT * FROM tiendas";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiendas de Surf</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tiendas.css">
    <link rel="stylesheet" href="css/navbar.css">
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
    <a href="competencias.php">Competencias</a>
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

<!-- HERO -->

<section class="hero-tiendas">

    <div class="hero-overlay">

        <h1>
            DESCUBRE LAS MEJORES
            <span>TIENDAS DE SURF</span>
        </h1>

    </div>

</section>

<!-- TIENDAS -->

<section class="tiendas-section">

    <h2 class="titulo-tiendas">
        EXPLORA TIENDAS DE SURF
    </h2>

    <div class="contenedor-tiendas">

        <?php while($row = $resultado->fetch_assoc()) { ?>

            <div class="card-tienda">

                <img
                    src="<?= $row['imagen']; ?>"
                    alt="<?= $row['nombre']; ?>"
                >

                <h3><?= $row['nombre']; ?></h3>

               <div class="rating">
                <?php
                    $estrellas = round($row['calificacion']);

                    for($i = 1; $i <= $estrellas; $i++){
                        echo '<i class="bi bi-star-fill"></i>';
                    }
                ?>
                <span><?= $row['calificacion']; ?></span>
             </div>

                <p><i class="bi bi-geo-alt-fill"></i> <?= $row['direccion']; ?></p>

             <button
            class="btn-ver"
            onclick="abrirModal(<?= $row['id']; ?>)">

            VER TIENDA

            </button>

            </div>

            <div id="modal<?= $row['id']; ?>" class="modal-tienda">

    <div class="modal-contenido">

        <span
            class="cerrar"
            onclick="cerrarModal(<?= $row['id']; ?>)">
            &times;
        </span>

        <img
            src="<?= $row['imagen']; ?>"
            alt="<?= $row['nombre']; ?>"
            class="modal-img">

        <h2><?= $row['nombre']; ?></h2>

         <p class="estrellas">

<?php
$estrellas = round($row['calificacion']);

for($i=1; $i<=$estrellas; $i++){
    echo '<i class="bi bi-star-fill"></i>';
}
?>

(<?= $row['calificacion']; ?>)

</p>

<div class="info-modal">

    <p><i class="bi bi-geo-alt-fill"></i> <?= $row['direccion']; ?></p>

    <p><i class="bi bi-signpost"></i> <?= $row['distancia']; ?> km</p>

    <p><i class="bi bi-clock"></i> <?= $row['horario']; ?></p>

    <p><i class="bi bi-telephone-fill"></i> <?= $row['telefono']; ?></p>

</div>

<div class="descripcion-modal">
    <?= $row['descripcion']; ?>
</div>

    </div>

</div>

        <?php } ?>

    </div>

</section>


    <script>

function abrirModal(id){
    document.getElementById("modal"+id).style.display="flex";
}

function cerrarModal(id){
    document.getElementById("modal"+id).style.display="none";
}

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