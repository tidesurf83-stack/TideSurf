window.onload = function () {

    const carousel = document.getElementById("carousel");
    const nextBtn = document.querySelector(".next");
    const prevBtn = document.querySelector(".prev");

    nextBtn.onclick = function () {
        carousel.scrollBy({
            left: 400,
            behavior: "smooth"
        });
    };

    prevBtn.onclick = function () {
        carousel.scrollBy({
            left: -400,
            behavior: "smooth"
        });
    };
};


function toggleMenu() {
    document.querySelector("nav").classList.toggle("active");
}



// ==============================
// MODAL REGISTRO
// ==============================

document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("registroModal");
    const botones = document.querySelectorAll(".abrirRegistro");
    const cerrar = document.querySelector(".cerrarRegistro");

    const inputCompetencia = document.getElementById("nombreCompetencia");
    const tituloCompetencia = document.getElementById("tituloCompetencia");
    const lugarCompetencia = document.getElementById("lugarCompetencia");
    const fechaCompetencia = document.getElementById("fechaCompetencia");
    const imagenCompetencia = document.getElementById("imagenCompetencia");

    // Abrir modal
    botones.forEach((boton) => {

        boton.addEventListener("click", () => {

            modal.style.display = "flex";
            document.body.style.overflow = "hidden";

            if (inputCompetencia)
                inputCompetencia.value = boton.dataset.competencia || "";

            if (tituloCompetencia)
                tituloCompetencia.textContent = boton.dataset.competencia || "Competencia";

            if (lugarCompetencia)
                lugarCompetencia.textContent = boton.dataset.lugar || "El Salvador";

            if (fechaCompetencia)
                fechaCompetencia.textContent = boton.dataset.fecha || "Próximamente";

            if (imagenCompetencia && boton.dataset.imagen)
                imagenCompetencia.src = boton.dataset.imagen;

        });

    });

    // Cerrar con la X
    if (cerrar) {
        cerrar.addEventListener("click", () => {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        });
    }

    // Cerrar al hacer clic fuera
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        }
    });

    // Cerrar con ESC
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        }
    });

});