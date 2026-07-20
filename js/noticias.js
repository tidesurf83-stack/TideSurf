const modal = document.getElementById("modal");
const navbar = document.querySelector(".ts-navbar");
const titulo = document.getElementById("modal-titulo");
const texto = document.getElementById("modal-texto");
const cerrar = document.querySelector(".cerrar");

const imagenModal = document.getElementById("modal-imagen");
const btnAnterior = document.querySelector(".carousel-prev");
const btnSiguiente = document.querySelector(".carousel-next");
const contadorCarrusel = document.getElementById("carousel-counter");

let imagenesCarrusel = [];
let imagenActual = 0;

const buscador = document.getElementById("busqueda-noticias");
const btnBuscar = document.getElementById("btn-buscar");
const botonesFiltro = document.querySelectorAll(".btn-filtro, .dropdown-item-noticia");
const tarjetas = Array.from(document.querySelectorAll(".news-card"));
const mensajeSinResultados = document.getElementById("mensaje-sin-resultados");

let filtroActual = "todas";

const btnNoticias = document.getElementById("btn-noticias");
const menuNoticias = document.querySelector(".dropdown-menu-noticias");

function normalizar(texto) {
  return texto
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "");
}

function actualizarDestacada() {
  tarjetas.forEach((tarjeta) => {
    tarjeta.classList.remove("featured");
  });

  const primeraVisible = tarjetas.find((tarjeta) => tarjeta.style.display !== "none");

  if (primeraVisible) {
    primeraVisible.classList.add("featured");
  }
}

function aplicarFiltros() {
  const busqueda = normalizar(buscador.value.trim());
  let totalVisibles = 0;

  tarjetas.forEach((tarjeta) => {
    const textoTarjeta = normalizar(
      `${tarjeta.dataset.titulo} ${tarjeta.dataset.resumen} ${tarjeta.dataset.categoria}`
    );

    const coincideBusqueda = textoTarjeta.includes(busqueda);

    let coincideFiltro = true;

    if (filtroActual === "destacadas") {
      coincideFiltro = tarjeta.dataset.destacada === "1";
    } else if (filtroActual !== "todas") {
      coincideFiltro = normalizar(tarjeta.dataset.categoria) === normalizar(filtroActual);
    }

    const mostrar = coincideBusqueda && coincideFiltro;

    tarjeta.style.display = mostrar ? "" : "none";

    if (mostrar) {
      totalVisibles++;
    }
  });

  actualizarDestacada();

  mensajeSinResultados.style.display = totalVisibles === 0 ? "block" : "none";
}

function mostrarImagenActual() {
  if (imagenesCarrusel.length === 0) {
    imagenModal.style.display = "none";
    btnAnterior.style.display = "none";
    btnSiguiente.style.display = "none";
    contadorCarrusel.textContent = "";
    return;
  }

  imagenModal.style.display = "block";
  imagenModal.src = imagenesCarrusel[imagenActual];

  contadorCarrusel.textContent = `${imagenActual + 1} / ${imagenesCarrusel.length}`;

  const mostrarControles = imagenesCarrusel.length > 1;

  btnAnterior.style.display = mostrarControles ? "block" : "none";
  btnSiguiente.style.display = mostrarControles ? "block" : "none";
  contadorCarrusel.style.display = mostrarControles ? "block" : "none";
}

document.querySelectorAll(".btn-leer-mas").forEach((boton) => {
  boton.addEventListener("click", () => {
    titulo.textContent = boton.dataset.titulo;
    texto.textContent = boton.dataset.contenido;

    imagenesCarrusel = JSON.parse(boton.dataset.imagenes || "[]");
    imagenActual = 0;
    mostrarImagenActual();

    modal.style.display = "flex";
    navbar.classList.add("navbar-fondo");
  });
});

btnSiguiente.addEventListener("click", () => {
  imagenActual++;

  if (imagenActual >= imagenesCarrusel.length) {
    imagenActual = 0;
  }

  mostrarImagenActual();
});

btnAnterior.addEventListener("click", () => {
  imagenActual--;

  if (imagenActual < 0) {
    imagenActual = imagenesCarrusel.length - 1;
  }

  mostrarImagenActual();
});

botonesFiltro.forEach((boton) => {
  boton.addEventListener("click", () => {
    botonesFiltro.forEach((btn) => btn.classList.remove("active"));
    boton.classList.add("active");

    filtroActual = boton.dataset.filtro;
    aplicarFiltros();
  });
});

btnBuscar.addEventListener("click", aplicarFiltros);
buscador.addEventListener("input", aplicarFiltros);

buscador.addEventListener("keydown", (e) => {
  if (e.key === "Enter") {
    aplicarFiltros();
  }
});

cerrar.addEventListener("click", () => {
  modal.style.display = "none";
  navbar.classList.remove("navbar-fondo");  
});

window.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
    navbar.classList.remove("navbar-fondo");
  }
});

btnNoticias.addEventListener("click", (e) => {
    e.stopPropagation();
    menuNoticias.classList.toggle("mostrar-menu");
});

document.addEventListener("click", () => {
    menuNoticias.classList.remove("mostrar-menu");
});

menuNoticias.addEventListener("click", (e) => {
    e.stopPropagation();
});