<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: inicio_sesion.php");
    exit;
}

include("php/conexion.php");

$usuarioId = (int) $_SESSION["usuario_id"];
$mensaje = "";
$errorPerfil = "";

function h($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}

function datoPerfil($valor, $defecto) {
    $valor = trim((string) ($valor ?? ""));
    return $valor === "" ? $defecto : $valor;
}

function actualizarFotoPerfil($conn, $usuarioId, $rutaPublica) {
    $stmtFoto = $conn->prepare("UPDATE register SET foto_perfil = ? WHERE ID_register = ?");

    if (!$stmtFoto) {
        return false;
    }

    $stmtFoto->bind_param("si", $rutaPublica, $usuarioId);
    $resultado = $stmtFoto->execute();
    $stmtFoto->close();

    return $resultado;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accion = $_POST["accion"] ?? "";

    if ($accion === "actualizar_perfil") {
        $ubicacion = trim($_POST["ubicacion"] ?? "");
        $edadTexto = trim($_POST["edad"] ?? "");
        $nivelSurf = trim($_POST["nivel_surf"] ?? "");
        $playasFavoritas = trim($_POST["playas_favoritas"] ?? "");
        $sobreMi = trim($_POST["sobre_mi"] ?? "");
        $edad = $edadTexto === "" ? null : (int) $edadTexto;

        $sqlActualizar = "UPDATE register
            SET ubicacion = ?, edad = ?, nivel_surf = ?, playas_favoritas = ?, sobre_mi = ?
            WHERE ID_register = ?";
        $stmtActualizar = $conn->prepare($sqlActualizar);

        if ($stmtActualizar) {
            $stmtActualizar->bind_param(
                "sisssi",
                $ubicacion,
                $edad,
                $nivelSurf,
                $playasFavoritas,
                $sobreMi,
                $usuarioId
            );

            if ($stmtActualizar->execute()) {
                $mensaje = "Perfil actualizado correctamente.";
            } else {
                $errorPerfil = "No se pudo actualizar el perfil.";
            }

            $stmtActualizar->close();
        } else {
            $errorPerfil = "No se pudo preparar la actualizacion.";
        }
    }

      if ($accion === "actualizar_foto") {

        $foto = $_FILES["foto_perfil"] ?? null;
        $fotoCapturada = trim($_POST["foto_capturada"] ?? "");

        if ($fotoCapturada !== "") {

            if (!preg_match('/^data:image\/(png|jpeg|webp);base64,/', $fotoCapturada, $coincidencias)) {

                $errorPerfil = "La foto tomada no tiene un formato valido.";

            } else {

                $extension = $coincidencias[1] === "jpeg" ? "jpg" : $coincidencias[1];
                $datosBase64 = substr($fotoCapturada, strpos($fotoCapturada, ",") + 1);
                $datosImagen = base64_decode($datosBase64, true);

                $carpetaDestino = __DIR__ . "/uploads/perfiles";

                if (!is_dir($carpetaDestino)) {
                    mkdir($carpetaDestino, 0775, true);
                }

                $nombreArchivo = "perfil_" . $usuarioId . "_" . time() . "." . $extension;
                $rutaDestino = $carpetaDestino . "/" . $nombreArchivo;
                $rutaPublica = "uploads/perfiles/" . $nombreArchivo;


                if (file_put_contents($rutaDestino, $datosImagen) !== false && actualizarFotoPerfil($conn, $usuarioId, $rutaPublica)) {

                    $_SESSION['foto_perfil'] = $rutaPublica;
                    $mensaje = "Foto de perfil actualizada.";

                } else {

                    $errorPerfil = "No se pudo guardar la foto.";

                }

            }


        } elseif ($foto && $foto["error"] === UPLOAD_ERR_OK) {


            $extension = strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
            $extensionesValidas = ["jpg", "jpeg", "png", "webp"];


            if (!in_array($extension, $extensionesValidas, true)) {

                $errorPerfil = "La foto debe ser JPG, PNG o WEBP.";

            } else {

                $carpetaDestino = __DIR__ . "/uploads/perfiles";

                if (!is_dir($carpetaDestino)) {
                    mkdir($carpetaDestino, 0775, true);
                }


                $nombreArchivo = "perfil_" . $usuarioId . "_" . time() . "." . $extension;
                $rutaDestino = $carpetaDestino . "/" . $nombreArchivo;
                $rutaPublica = "uploads/perfiles/" . $nombreArchivo;


                if (move_uploaded_file($foto["tmp_name"], $rutaDestino)) {

                    if (actualizarFotoPerfil($conn, $usuarioId, $rutaPublica)) {

                        $_SESSION['foto_perfil'] = $rutaPublica;
                        $mensaje = "Foto de perfil actualizada.";

                    }

                }

            }

            } else {

        $errorPerfil = "Selecciona una foto.";

    }

} // cierra if ($accion === "actualizar_foto")

} // cierra if ($_SERVER["REQUEST_METHOD"] === "POST")
$sql = "SELECT * FROM register WHERE ID_register = ? LIMIT 1";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("No se pudo cargar el perfil.");
}

$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();
$conn->close();

if (!$usuario) {
    session_destroy();
    header("Location: inicio_sesion.php");
    exit;
}

$ubicacion = datoPerfil($usuario["ubicacion"] ?? "", "No registrado");
$edad = datoPerfil($usuario["edad"] ?? "", "No registrado");
$nivelSurf = datoPerfil($usuario["nivel_surf"] ?? "", "No registrado");
$playasFavoritas = datoPerfil($usuario["playas_favoritas"] ?? "", "No registrado");
$sobreMi = datoPerfil($usuario["sobre_mi"] ?? "", "No registrado");
$fotoPerfil = trim((string) ($usuario["foto_perfil"] ?? ""));
?>
<!DOCTYPE html>
<html lang="es">
<?php include("head.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - TideSurf</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/perfil.css?v=cerrar-sesion-ola">
    <link rel="stylesheet" href="css/navbar.css?v=login-espacio">
</head>
<body class="has-site-navbar">

<a href="javascript:history.back()" class="btn-back">
    <i class='bx bx-arrow-back'></i>
    Back
</a>

<main class="pagina-perfil">
<h1>Mi perfil</h1>

        <?php if ($mensaje !== ""): ?>
            <p class="mensaje-exito"><?= h($mensaje) ?></p>
        <?php endif; ?>

        <?php if ($errorPerfil !== ""): ?>
            <p class="mensaje-error"><?= h($errorPerfil) ?></p>
        <?php endif; ?>

        <section class="tarjeta-perfil">
            <div class="encabezado-tarjeta">
                <div>
                    <h2>Informacion del surfista</h2>
                    <span></span>
                </div>
                <button class="boton-editar" type="button" data-modal-target="modalEditarPerfil">
                    <i class='bx bx-edit-alt'></i>
                    Editar perfil
                </button>
            </div>

            <div class="contenido-perfil">
                <section class="bloque-avatar" aria-label="Foto de perfil">
                    <div class="avatar-perfil">
                        <?php if ($fotoPerfil !== ""): ?>
                            <img src="<?= h($fotoPerfil) ?>" alt="Foto de perfil">
                        <?php else: ?>
                            <i class='bx bxs-user'></i>
                        <?php endif; ?>
                        <button class="boton-camara" type="button" data-modal-target="modalFotoPerfil" aria-label="Cambiar foto de perfil">
                            <i class='bx bxs-camera'></i>
                        </button>
                    </div>
                </section>

                <section class="datos-perfil">
                    <p>
                        <strong>Ubicacion:</strong>
                        <span><?= h($ubicacion) ?></span>
                    </p>
                    <p>
                        <strong>Edad:</strong>
                        <span><?= h($edad) ?></span>
                    </p>
                    <p>
                        <strong>Nivel de Surf:</strong>
                        <span><?= h($nivelSurf) ?></span>
                    </p>
                    <p>
                        <strong>Playas Favoritas:</strong>
                        <span><?= h($playasFavoritas) ?></span>
                    </p>
                </section>
            </div>

            <section class="sobre-mi">
                <h3>Sobre mi</h3>
                <p><?= nl2br(h($sobreMi)) ?></p>
            </section>
        </section>

        <button class="boton-cerrar-sesion" type="button" data-modal-target="modalCerrarSesion">
            <i class='bx bx-log-out'></i>
            Cerrar sesion
        </button>
    </main>

    <dialog class="modal-perfil" id="modalEditarPerfil">
        <form method="POST" class="formulario-modal">
            <input type="hidden" name="accion" value="actualizar_perfil">

            <div class="modal-encabezado">
                <h2><i class='bx bxs-user-detail'></i> Editar perfil</h2>
                <button type="button" class="boton-cerrar-modal" data-modal-close aria-label="Cerrar ventana">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <div class="campos-modal">
                <label>
                    <span>Ubicacion</span>
                    <input type="text" name="ubicacion" value="<?= h($ubicacion === "No registrado" ? "" : $ubicacion) ?>">
                </label>

                <label>
                    <span>Edad</span>
                    <input type="number" name="edad" min="1" value="<?= h($edad === "No registrado" ? "" : $edad) ?>">
                </label>

                <label>
                    <span>Nivel de Surf</span>
                    <input type="text" name="nivel_surf" value="<?= h($nivelSurf === "No registrado" ? "" : $nivelSurf) ?>">
                </label>

                <label>
                    <span>Playas Favoritas</span>
                    <input type="text" name="playas_favoritas" value="<?= h($playasFavoritas === "No registrado" ? "" : $playasFavoritas) ?>">
                </label>

                <label class="campo-completo">
                    <span>Sobre mi</span>
                    <textarea name="sobre_mi" rows="5"><?= h($sobreMi === "No registrado" ? "" : $sobreMi) ?></textarea>
                </label>
            </div>

            <div class="modal-acciones">
                <button type="button" class="boton-secundario" data-modal-close>Cancelar</button>
                <button type="submit" class="boton-guardar">Guardar cambios</button>
            </div>
        </form>
    </dialog>

    <dialog class="modal-perfil modal-foto" id="modalFotoPerfil">
        <div class="formulario-modal">
            <div class="modal-encabezado">
                <h2>Cambiar foto de perfil</h2>
                <button type="button" class="boton-cerrar-modal" data-modal-close aria-label="Cerrar ventana">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <div class="opciones-foto">
                <form method="POST" enctype="multipart/form-data" class="opcion-foto-form">
                    <input type="hidden" name="accion" value="actualizar_foto">
                    <label class="opcion-foto">
                        <i class='bx bx-upload'></i>
                        <span>Subir una foto</span>
                        <input type="file" name="foto_perfil" accept="image/png,image/jpeg,image/webp">
                    </label>
                </form>

                <form method="POST" class="opcion-foto-form" id="formCamaraPerfil">
                    <input type="hidden" name="accion" value="actualizar_foto">
                    <input type="hidden" name="foto_capturada" id="fotoCapturada">
                    <button class="opcion-foto" type="button" id="botonActivarCamara">
                        <i class='bx bxs-camera'></i>
                        <span>Tomar una foto</span>
                    </button>
                </form>
            </div>

            <div class="vista-camara" id="vistaCamara" hidden>
                <video id="videoCamara" autoplay playsinline></video>
                <canvas id="lienzoCamara" hidden></canvas>
                <div class="acciones-camara">
                    <button type="button" class="boton-secundario" id="botonDetenerCamara">Cancelar camara</button>
                    <button type="button" class="boton-guardar" id="botonCapturarFoto">Usar foto</button>
                </div>
            </div>
        </div>
    </dialog>

    <dialog class="modal-perfil modal-cerrar-sesion" id="modalCerrarSesion">
        <div class="formulario-modal">
            <div class="modal-cierre-encabezado">
                <h2>
                    <i class='bx bx-log-out'></i>
                    Cerrar sesion
                </h2>
                <button type="button" class="boton-cerrar-modal boton-cerrar-simple" data-modal-close aria-label="Cerrar ventana">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <p class="texto-confirmacion-cierre">Estas seguro que deseas cerrar tu sesion?</p>

            <div class="iconos-cierre" aria-hidden="true">
                <i class='bx bxs-door-open'></i>
                <i class='bx bxs-user'></i>
            </div>

            <div class="ola-cierre" aria-hidden="true">
                <span></span>
                <span></span>
            </div>

            <div class="modal-acciones acciones-cierre">
                <button type="button" class="boton-secundario" data-modal-close>Cancelar</button>
                <a class="boton-confirmar-cierre" href="php/logout.php">Si, cerrar sesion</a>
            </div>
        </div>
    </dialog>

    <script>
        const modalButtons = document.querySelectorAll("[data-modal-target]");
        const closeButtons = document.querySelectorAll("[data-modal-close]");
        const photoInputs = document.querySelectorAll(".opcion-foto input[type='file']");
        const cameraButton = document.getElementById("botonActivarCamara");
        const cameraPanel = document.getElementById("vistaCamara");
        const cameraVideo = document.getElementById("videoCamara");
        const cameraCanvas = document.getElementById("lienzoCamara");
        const captureButton = document.getElementById("botonCapturarFoto");
        const stopCameraButton = document.getElementById("botonDetenerCamara");
        const capturedPhotoInput = document.getElementById("fotoCapturada");
        const cameraForm = document.getElementById("formCamaraPerfil");
        let cameraStream = null;

        function detenerCamara() {
            if (cameraStream) {
                cameraStream.getTracks().forEach((track) => track.stop());
                cameraStream = null;
            }

            if (cameraVideo) {
                cameraVideo.srcObject = null;
            }

            if (cameraPanel) {
                cameraPanel.hidden = true;
            }
        }

        modalButtons.forEach((button) => {
            button.addEventListener("click", () => {
                const modal = document.getElementById(button.dataset.modalTarget);
                if (modal) {
                    modal.showModal();
                }
            });
        });

        closeButtons.forEach((button) => {
            button.addEventListener("click", () => {
                if (button.closest("dialog").id === "modalFotoPerfil") {
                    detenerCamara();
                }

                button.closest("dialog").close();
            });
        });

        document.querySelectorAll("dialog").forEach((modal) => {
            modal.addEventListener("click", (event) => {
                if (event.target === modal) {
                    if (modal.id === "modalFotoPerfil") {
                        detenerCamara();
                    }

                    modal.close();
                }
            });
        });

        photoInputs.forEach((input) => {
            input.addEventListener("change", () => {
                if (input.files.length > 0) {
                    input.closest("form").submit();
                }
            });
        });

        if (cameraButton) {
            cameraButton.addEventListener("click", async () => {
                if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                    alert("Tu navegador no permite abrir la camara desde esta pagina.");
                    return;
                }

                try {
                    detenerCamara();
                    cameraStream = await navigator.mediaDevices.getUserMedia({
                        video: { facingMode: "user" },
                        audio: false
                    });
                    cameraVideo.srcObject = cameraStream;
                    cameraPanel.hidden = false;
                } catch (error) {
                    alert("No se pudo acceder a la camara. Revisa el permiso del navegador.");
                }
            });
        }

        if (stopCameraButton) {
            stopCameraButton.addEventListener("click", detenerCamara);
        }

        if (captureButton) {
            captureButton.addEventListener("click", () => {
                if (!cameraStream || !cameraVideo.videoWidth) {
                    alert("Primero activa la camara.");
                    return;
                }

                cameraCanvas.width = cameraVideo.videoWidth;
                cameraCanvas.height = cameraVideo.videoHeight;
                cameraCanvas.getContext("2d").drawImage(cameraVideo, 0, 0);
                capturedPhotoInput.value = cameraCanvas.toDataURL("image/png");
                detenerCamara();
                cameraForm.submit();
            });
        }
    </script>
    <script src="js/navbar.js?v=login-si-no"></script>
</body>
</html>
