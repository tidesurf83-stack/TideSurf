<?php

session_start();
include("conexion-perfil.php");

/*
    USUARIO LOGUEADO
    (Temporalmente id = 1)
*/

$id = 1;

$query = "SELECT * FROM usuarios WHERE id='$id'";
$resultado = mysqli_query($conexion, $query);

$usuario = mysqli_fetch_assoc($resultado);


/*
    GUARDAR INFORMACIÓN
*/

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $edad = $_POST['edad'];
    $nivel = $_POST['nivel'];
    $playas = $_POST['playas'];
    $descripcion = $_POST['descripcion'];


    // FOTO
    if($_FILES['foto']['name']){

        $foto = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($temp, "uploads/".$foto);

        $queryFoto = ", foto='$foto'";

    }else{

        $queryFoto = "";
    }


    // UPDATE
    $update = "UPDATE usuarios SET

    nombre='$nombre',
    ubicacion='$ubicacion',
    edad='$edad',
    nivel='$nivel',
    playas='$playas',
    descripcion='$descripcion'

    $queryFoto

    WHERE id='$id'";

    mysqli_query($conexion, $update);

    header("Location: perfil.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi Perfil</title>

    <link rel="stylesheet" href="perfil.css">

</head>

<body>

<div class="perfil-container">

    <!-- HEADER -->
    <div class="top">

        <img src="assets/logo.png" class="logo">

        <h1 class="titulo">Mi Perfil</h1>

        <!-- FOTO -->
        <div class="foto-container">

            <div class="foto">

                <?php if($usuario['foto']){ ?>

                    <img 
                        src="uploads/<?php echo $usuario['foto']; ?>"
                    >

                <?php } ?>

            </div>

        </div>

    </div>


    <!-- CONTENIDO -->
    <div class="contenido">

        <form method="POST" enctype="multipart/form-data">

            <!-- NOMBRE -->
            <input
                type="text"
                name="nombre"
                class="input-nombre"
                value="<?php echo $usuario['nombre']; ?>"
            >


            <!-- UBICACION -->
            <div class="info">

                <strong>Ubicación:</strong>

                <input
                    type="text"
                    name="ubicacion"
                    value="<?php echo $usuario['ubicacion']; ?>"
                >

            </div>


            <!-- EDAD -->
            <div class="info">

                <strong>Edad:</strong>

                <input
                    type="number"
                    name="edad"
                    value="<?php echo $usuario['edad']; ?>"
                >

            </div>


            <!-- NIVEL -->
            <div class="info">

                <strong>Nivel Surf:</strong>

                <input
                    type="text"
                    name="nivel"
                    value="<?php echo $usuario['nivel']; ?>"
                >

            </div>


            <!-- PLAYAS -->
            <div class="info">

                <strong>Playas Favoritas:</strong>

                <input
                    type="text"
                    name="playas"
                    value="<?php echo $usuario['playas']; ?>"
                >

            </div>


            <!-- BOTON -->
            <button type="button" class="btn-sobre">
                Sobre mí...
            </button>


            <!-- DESCRIPCION -->
            <div class="descripcion-fondo">

                <textarea
                    name="descripcion"
                    class="descripcion"
                ><?php echo $usuario['descripcion']; ?></textarea>

            </div>


            <!-- FOTO -->
            <div class="subir-foto">

                <input type="file" name="foto" id="foto">

            </div>


            <!-- BOTON -->
            <button
                type="submit"
                name="guardar"
                class="btn-editar"
            >
                Guardar Perfil
            </button>

        </form>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>