<?php
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

<!-- NAVBAR -->
<div class="site-navbar-shell">
    <div class="site-navbar">
        <a class="site-navbar-brand" href="index.php" aria-label="TideSurf Inicio">
            <img src="logo-tidesurf-navbar.png" alt="TideSurf">
        </a>
        <nav class="site-navbar-menu" aria-label="Navegacion principal">
            <a href="index.php">Inicio</a>
            <a href="noticias.php">Noticias</a>
            <a href="competencias.html">Competencias</a>
            <a href="playas.php">Playas</a>
            <a href="escuelas.php">Escuelas de Surf</a>
            <a href="tiendas.php">Tiendas</a>
            <a href="galeria.html">Galeria</a>
            <a href="sobre_nosotros.html">Sobre Nosotros</a>
        </nav>
        <a href="perfil.php" class="site-profile-avatar" aria-label="Mi Perfil">
            <span class="site-avatar-icon"></span>
        </a>
    </div>
</div>
<!-- HERO -->

<section class="hero-tiendas">

    <div class="hero-overlay">

        <h1>
            DESCUBRE LAS MEJORES
            <span>TIENDAS DE SURF</span>
        </h1>

        <p>
            Encuentra tablas, accesorios y equipamiento para vivir la experiencia del surf.
        </p>

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
const menuToggle = document.querySelector('.menu-toggle');
const navbarNav = document.querySelector('.navbar-nav');

menuToggle.addEventListener('click', () => {

    navbarNav.classList.toggle('active');

    console.log(navbarNav);

    console.log(
        navbarNav.classList.contains('active')
            ? 'MENU ACTIVO'
            : 'MENU CERRADO'
    );
});
</script>
</body>
</html>