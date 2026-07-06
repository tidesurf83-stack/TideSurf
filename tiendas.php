<?php
include __DIR__ . "/conexion.php";

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
</head>

<body>

<!-- NAVBAR -->

<nav class="custom-navbar">

    <div class="container">

        <a class="navbar-brand" href="index.html">
            <img src="img/logof-removebg-preview.png" alt="TideSurf Logo">
        </a>

                <button class="menu-toggle">
                   ☰
                </button>

        <ul class="navbar-nav" id="menu">

            <li class="nav-item">
                <a class="nav-link" href="noticias.html">Noticias</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="competencias.html">Competencias</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="playas.html">Playas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="academias.html">Escuelas de Surf</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="tiendas.php">Tiendas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Sobre Nosotros</a>
            </li>

        </ul>

    </div>

</nav>
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
                        echo "⭐";
                    }
                ?>
                <span><?= $row['calificacion']; ?></span>
             </div>

                <p>
                    📍 <?= $row['distancia']; ?> km
                </p>

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
                echo "⭐";
            }
            ?>

            (<?= $row['calificacion']; ?>)

         </p>

        <p>📍 <?= $row['direccion']; ?></p>

        <p>📏 <?= $row['distancia']; ?> km</p>

        <p>🕒 <?= $row['horario']; ?></p>

        <p>📞 <?= $row['telefono']; ?></p>

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