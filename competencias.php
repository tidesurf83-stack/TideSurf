<?php

$conexion = new mysqli("localhost", "root", "", "competencia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?><?php

$conexion = new mysqli("localhost", "root", "", "competencia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surf City</title>
    <link rel="stylesheet" href="css/competencias.css?v=perfil-icono">
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="logo">
            <img src="img/logof-removebg-preview.png" alt="">
        </div>

         
        <nav id="menu">
    <a href="noticias.html">Noticias</a>
    <a href="competencias.html">Competencias</a>
    <a href="playas.html">Playas</a>
    <a href="#">Tiendas</a>
    <a href="academias.html">Escuelas de Surf</a>
    <a href="Profile/perfil.php">Mi perfil</a>
</nav>

    <div class="menu-btn" onclick="toggleMenu()">☰</div>

    </header>

    <!-- HERO -->
    <section class="hero">
         
        <div class="hero-text">
            <span>VENCE TUS LIMITES
                
            </span>


            <h1>SIGUIENTE COMPETENCIA</h1>

            <h2>Surf City Challenge</h2>
            <p>
            Bodyboard masculino
            </p>


            <button>Explore Events →</button>
        </div>

        <div class="hero-image">
            <img src="img/image.png" alt="hero-image">
        </div>

    
    </section>

    <!-- EVENTS -->
<section class="events">

    <div class="section-title">
        <h2>Próximos Eventos
            <span class="wave">〰️</span>
        </h2>
    </div>

    <div class="carousel-wrapper">

        <button class="carousel-btn prev">&#10094;</button>

        <div class="carousel" id="carousel">

            <?php
            include("conexion.php");

            $sql = "SELECT * FROM proximos_eventos";
            $resultado = $conexion->query($sql);

            while($fila = $resultado->fetch_assoc()){
            ?>

            <div class="card">

                <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['titulo']; ?>">

                <div class="card-content">

                    <h3><?php echo $fila['titulo']; ?></h3>

                    <p><?php echo $fila['lugar']; ?></p>

                    <p><?php echo date("M d - Y", strtotime($fila['fecha'])); ?></p>

                    <button>VER DETALLES →</button>

                </div>

            </div>

            <?php
            }
            ?>

        </div>

        <button class="carousel-btn next">&#10095;</button>

    </div>

</section>


 <!-- CATEGORY -->
    <section class="levels">

        <h2>Browse by level
             <span class="wave">〰️</span>
        </h2>

        <div class="filters">
            <button class="active">All Events</button>
            <button>Beginner</button>
            <button>Intermediate</button>
            <button>Advanced</button>
            <button>Pro</button>
        </div>

    </section>

    <div class="featured-container">

<?php

$sql = "SELECT * FROM featured_events";
$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_assoc()){

?>

    <div class="featured-card">

        <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['titulo']; ?>">

        <div class="featured-content">

            <span>FEATURED EVENT</span>

            <h3><?php echo $fila['titulo']; ?></h3>

            <p><?php echo $fila['ubicacion']; ?></p>

            <button><?php echo $fila['boton']; ?></button>

        </div>

    </div>

<?php

}

?>

</div>



<section class="rankings">

    <div class="section-title">
        <h2>Top Surf Rankings</h2>
        <a href="#">Ver todo</a>
    </div>

    <div class="ranking-table">

        <div class="ranking-header">
            <span>Rank</span>
            <span>Surfista</span>
            <span>País</span>
            <span>Puntos</span>
        </div>

        <?php

        $sql = "SELECT * FROM ranking_surfistas ORDER BY posicion ASC";
        $resultado = $conexion->query($sql);

        while($fila = $resultado->fetch_assoc()){

            if($fila['posicion'] == 1){
                $puesto = "🥇";
            }elseif($fila['posicion'] == 2){
                $puesto = "🥈";
            }elseif($fila['posicion'] == 3){
                $puesto = "🥉";
            }else{
                $puesto = "#" . $fila['posicion'];
            }

        ?>

        <div class="ranking-row">

            <span class="rank"><?php echo $puesto; ?></span>

            <div class="surfer-info">
                <img src="<?php echo $fila['foto']; ?>" alt="<?php echo $fila['nombre']; ?>">
                <span><?php echo $fila['nombre']; ?></span>
            </div>

            <span><?php echo $fila['codigo_pais']; ?> <?php echo $fila['pais']; ?></span>

            <span class="points"><?php echo number_format($fila['puntos']); ?></span>

        </div>

        <?php
        }
        ?>

    </div>

</section>

<script src="js/competencias.js"></script>
</body>

</html>
