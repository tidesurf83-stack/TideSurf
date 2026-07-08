<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



$conexion = new mysqli("localhost", "root", "", "competencia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = new mysqli("localhost", "root", "", "competencia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if(isset($_POST['registrar'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $pais = $_POST['pais'];
    $genero = $_POST['genero'];
    $competencia = $_POST['competencia'];
    $categoria = $_POST['categoria'];
    $experiencia = $_POST['experiencia'];

    $sql = "INSERT INTO registros_competencia
    (nombre,apellido,correo,telefono,edad,pais,genero,competencia,categoria,experiencia)

    VALUES

    ('$nombre','$apellido','$correo','$telefono','$edad','$pais','$genero','$competencia','$categoria','$experiencia')";

    if($conexion->query($sql)){

    header("Location: competencias.php?registro=ok");
    exit;

}else{

    echo "Error: " . $conexion->error;

}

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
    <a href="noticias.php">Noticias</a>
    <a href="competencias.php">competencias</a>
    <a href="playas.html">Playas</a>
    <a href="#">Tiendas</a>
    <a href="academias.html">Escuelas de Surf</a>
    <a href="Profile/perfil.php">Mi perfil</a>
</nav>

    <div class="menu-btn" onclick="toggleMenu()">☰</div>

    </header>
<section class="hero-comp">
    <div class="hero-content">
        <h1>Competencias de Surf</h1>
        <p>Descubre los próximos eventos y los mejores campeonatos de surf en El Salvador.</p>

        <div class="hero-stats">
            <div class="stat-card">
                <div class="stat-number">25+</div>
                <div class="stat-text">Competencias</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-text">Surfistas</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">15</div>
                <div class="stat-text">Playas</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">10</div>
                <div class="stat-text">Años de Historia</div>
            </div>
        </div>
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

            $sql = "SELECT * FROM proximos_eventos";
            $resultado = $conexion->query($sql);

            if (!$resultado) {
                die("Error en la consulta: " . $conexion->error);
            }

            while($fila = $resultado->fetch_assoc()){
            ?>

                <div class="card">

                    <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['titulo']; ?>">

                    <div class="card-content">

                        <h3><?php echo $fila['titulo']; ?></h3>

                        <p><?php echo $fila['lugar']; ?></p>

                        <p><?php echo date("M d - Y", strtotime($fila['fecha'])); ?></p>


                        <button
    class="btn-detalles"
    data-titulo="<?php echo htmlspecialchars($fila['titulo']); ?>"
    data-lugar="<?php echo htmlspecialchars($fila['lugar']); ?>"
    data-fecha="<?php echo date('d/m/Y', strtotime($fila['fecha'])); ?>"
    data-imagen="<?php echo htmlspecialchars($fila['imagen']); ?>"
    data-descripcion="<?php echo htmlspecialchars($fila['descripcion']); ?>">
    VER DETALLES →
</button>


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

    <h2>Regístrate aquí.
        <span class="wave">〰️</span>
    </h2>


</section>

<div class="featured-container">

<?php

$sql = "SELECT * FROM featured_events";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

while ($fila = $resultado->fetch_assoc()) {
?>

    <div class="featured-card">

        <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['titulo']; ?>">

        <div class="featured-content">

            <span>FEATURED EVENT</span>

            <h3><?php echo $fila['titulo']; ?></h3>

            <p><?php echo $fila['ubicacion']; ?></p>

            <button
class="abrirRegistro"
data-competencia="<?php echo htmlspecialchars($fila['titulo']); ?>">
<?php echo $fila['boton']; ?>
</button>

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

        if (!$resultado) {
            die("Error en la consulta: " . $conexion->error);
        }

        while ($fila = $resultado->fetch_assoc()) {

            if ($fila['posicion'] == 1) {
                $puesto = "🥇";
            } elseif ($fila['posicion'] == 2) {
                $puesto = "🥈";
            } elseif ($fila['posicion'] == 3) {
                $puesto = "🥉";
            } else {
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

<!-- =========================
        MODAL DEL EVENTO
========================= -->

<div id="eventoModal" class="modal">

    <div class="modal-box">

        <span class="cerrar">&times;</span>

        <img id="modalImagen" src="" alt="">

        <div class="modal-info">

            <h2 id="modalTitulo"></h2>

            <div class="datos">
                <p><strong>📍 Lugar:</strong> <span id="modalLugar"></span></p>
                <p><strong>📅 Fecha:</strong> <span id="modalFecha"></span></p>
            </div>

            <p id="modalDescripcion"></p>

        </div>

    </div>

</div>


<div id="registroModal" class="modal">

    <div class="modal-registro">

        <span class="cerrarRegistro">&times;</span>

        <h2>Registro a Competencia</h2>

        <form method="POST">

            <div class="fila">

                <div class="campo">
                    <label>Nombre</label>
                    <input type="text" name="nombre" required>
                </div>

                <div class="campo">
                    <label>Apellido</label>
                    <input type="text" name="apellido" required>
                </div>

            </div>

            <div class="fila">

                <div class="campo">
                    <label>Correo</label>
                    <input type="email" name="correo" required>
                </div>

                <div class="campo">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" required>
                </div>

            </div>

            <div class="fila">

                <div class="campo">
                    <label>Edad</label>
                    <input type="number" name="edad" required>
                </div>

                <div class="campo">
                    <label>País</label>
                    <input type="text" name="pais" required>
                </div>

            </div>

            <div class="fila">

                <div class="campo">

                    <label>Género</label>

                    <select name="genero">

                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Otro</option>

                    </select>

                </div>

                <div class="campo">

                    <label>Categoría</label>

                    <select name="categoria">

                        <option>Principiante</option>
                        <option>Intermedio</option>
                        <option>Avanzado</option>
                        <option>Profesional</option>

                    </select>

                </div>

            </div>

            <div class="campo">

                <label>Competencia</label>

                <input
                type="text"
                id="nombreCompetencia"
                name="competencia"
                readonly>

            </div>

            <div class="campo">

                <label>Experiencia</label>

                <select name="experiencia">

                    <option>Menos de 1 año</option>
                    <option>1 a 3 años</option>
                    <option>4 a 6 años</option>
                    <option>Más de 6 años</option>

                </select>

            </div>

            <button
            type="submit"
            name="registrar"
            class="btnEnviar">

            Registrarme

            </button>

        </form>

    </div>

</div>

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
            <a href="#">Facebook</a>
            <a href="#">TikTok</a>
            <a href="#">YouTube</a>
        </div>
    </div>
</footer>

<script src="js/competencias.js"></script>
</body>

</html>
