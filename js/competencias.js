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



/* ==========================
      MODAL EVENTOS
========================== */

const modal = document.getElementById("eventoModal");

const modalTitulo = document.getElementById("modalTitulo");
const modalLugar = document.getElementById("modalLugar");
const modalFecha = document.getElementById("modalFecha");
const modalDescripcion = document.getElementById("modalDescripcion");
const modalImagen = document.getElementById("modalImagen");

const botones = document.querySelectorAll(".btn-detalles");

botones.forEach((boton) => {

    boton.addEventListener("click", function () {

        modalTitulo.textContent = this.dataset.titulo;
        modalLugar.textContent = this.dataset.lugar;
        modalFecha.textContent = this.dataset.fecha;
        modalDescripcion.textContent = this.dataset.descripcion;
        modalImagen.src = this.dataset.imagen;

        modal.style.display = "flex";

        document.body.style.overflow = "hidden";

    });

});

document.querySelector(".cerrar").addEventListener("click", function () {

    modal.style.display = "none";

    document.body.style.overflow = "auto";

});

window.addEventListener("click", function(e){

    if(e.target === modal){

        modal.style.display = "none";

        document.body.style.overflow = "auto";

    }

});

/*=========================
    MODAL REGISTRO
=========================*/

// ==============================
// MODAL REGISTRO
// ==============================

const modalRegistro = document.getElementById("registroModal");
const botonesRegistro = document.querySelectorAll(".abrirRegistro");
const cerrarRegistro = document.querySelector(".cerrarRegistro");

const inputCompetencia = document.getElementById("nombreCompetencia");

// Tarjeta lateral
const tituloCompetencia = document.getElementById("tituloCompetencia");
const lugarCompetencia = document.getElementById("lugarCompetencia");
const fechaCompetencia = document.getElementById("fechaCompetencia");
const imagenCompetencia = document.getElementById("imagenCompetencia");

// Abrir modal
botonesRegistro.forEach((boton) => {

    boton.addEventListener("click", () => {

        modalRegistro.style.display = "flex";

        document.body.style.overflow = "hidden";

        // Nombre de la competencia
        inputCompetencia.value = boton.dataset.competencia;

        // Información de la tarjeta
        tituloCompetencia.textContent =
            boton.dataset.competencia || "Competencia";

        lugarCompetencia.textContent =
            boton.dataset.lugar || "El Salvador";

        fechaCompetencia.textContent =
            boton.dataset.fecha || "Próximamente";

        if (boton.dataset.imagen) {
            imagenCompetencia.src = boton.dataset.imagen;
        }

        // Animación
        const caja = document.querySelector(".modal-registro");

        caja.animate(
            [
                {
                    opacity: 0,
                    transform: "translateY(-40px) scale(.9)"
                },
                {
                    opacity: 1,
                    transform: "translateY(0) scale(1)"
                }
            ],
            {
                duration: 400,
                easing: "ease"
            }
        );

    });

});

// Cerrar
function cerrarModal() {

    modalRegistro.style.display = "none";

    document.body.style.overflow = "auto";

}

cerrarRegistro.addEventListener("click", cerrarModal);

window.addEventListener("click", (e) => {

    if (e.target === modalRegistro) {

        cerrarModal();

    }

});

// Escape
document.addEventListener("keydown", (e) => {

    if (e.key === "Escape") {

        cerrarModal();

    }

});

// ==============================
// EFECTO BOTÓN
// ==============================

const botonEnviar = document.querySelector(".btnEnviar");

if (botonEnviar) {

    botonEnviar.addEventListener("mouseenter", () => {

        botonEnviar.style.transform = "scale(1.03)";

    });

    botonEnviar.addEventListener("mouseleave", () => {

        botonEnviar.style.transform = "scale(1)";

    });

}

// ==============================
// EFECTO INPUTS
// ==============================

document.querySelectorAll("input, select").forEach((campo) => {

    campo.addEventListener("focus", () => {

        campo.style.transition = ".3s";

    });

});