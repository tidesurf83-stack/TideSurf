const modal = document.getElementById("modal");
const titulo = document.getElementById("modal-titulo");
const texto = document.getElementById("modal-texto");
const cerrar = document.querySelector(".cerrar");

const noticias = {
    1: {
        titulo: "El Tunco será sede de campeonato internacional",
        texto: "El Tunco recibirá a surfistas de diferentes países en un evento que busca posicionar a El Salvador como uno de los principales destinos para la práctica del surf."
    },

    2: {
        titulo: "Las mejores playas para surfear en 2026",
        texto: "Entre las playas destacadas se encuentran El Tunco, Punta Roca y El Zonte, reconocidas por la calidad de sus olas y su creciente popularidad internacional."
    },

    3: {
        titulo: "Surfistas salvadoreños destacan internacionalmente",
        texto: "Varios atletas nacionales han conseguido importantes resultados en competencias internacionales, fortaleciendo la presencia salvadoreña en el surf mundial."
    },

    4: {
        titulo: "Cómo empezar en el surf siendo principiante",
        texto: "Los expertos recomiendan iniciar con una tabla de espuma, practicar en olas pequeñas y tomar clases con instructores certificados."
    }
};

document.querySelectorAll(".btn-leer-mas").forEach(boton => {

    boton.addEventListener("click", () => {

        const id = boton.dataset.noticia;

        titulo.textContent = noticias[id].titulo;
        texto.textContent = noticias[id].texto;

        modal.style.display = "flex";
    });

});

cerrar.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (e) => {

    if (e.target === modal) {
        modal.style.display = "none";
    }

});