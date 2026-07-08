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

const modalRegistro = document.getElementById("registroModal");

const botonesRegistro = document.querySelectorAll(".abrirRegistro");

const cerrarRegistro = document.querySelector(".cerrarRegistro");

const inputCompetencia = document.getElementById("nombreCompetencia");

botonesRegistro.forEach(boton=>{

    boton.addEventListener("click",()=>{

        modalRegistro.style.display="flex";

        inputCompetencia.value=boton.dataset.competencia;

    });

});

cerrarRegistro.addEventListener("click",()=>{

    modalRegistro.style.display="none";

});

window.addEventListener("click",(e)=>{

    if(e.target===modalRegistro){

        modalRegistro.style.display="none";

    }

});