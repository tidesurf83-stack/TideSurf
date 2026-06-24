document.addEventListener("DOMContentLoaded", async () => {
    const avatars = document.querySelectorAll(".site-profile-avatar");

    if (!avatars.length) {
        return;
    }

    try {
        const respuesta = await fetch("php/navbar_usuario.php", {
            credentials: "same-origin",
            cache: "no-store"
        });

        if (!respuesta.ok) {
            return;
        }

        const datos = await respuesta.json();

        if (!datos.sesion) {
            avatars.forEach((avatar) => {
                avatar.classList.remove("site-profile-avatar");
                avatar.classList.add("site-login-button");
                avatar.href = "inicio_sesion.php";
                avatar.setAttribute("aria-label", "Iniciar sesion");
                avatar.textContent = "Iniciar sesion";
            });
            return;
        }

        if (!datos.foto) {
            return;
        }

        avatars.forEach((avatar) => {
            avatar.innerHTML = "";
            const imagen = document.createElement("img");
            imagen.src = datos.foto;
            imagen.alt = "Mi Perfil";
            avatar.appendChild(imagen);
        });
    } catch (error) {
        // Si no hay sesion o falla la consulta, queda el icono por defecto.
    }
});
