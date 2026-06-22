const modal = document.getElementById("modal");
const titulo = document.getElementById("modal-titulo");
const texto = document.getElementById("modal-texto");
const cerrar = document.querySelector(".cerrar");

const buscador = document.getElementById("busqueda-noticias");
const btnBuscar = document.getElementById("btn-buscar");
const botonesFiltro = document.querySelectorAll(".btn-filtro");
const tarjetas = Array.from(document.querySelectorAll(".news-card"));
const mensajeSinResultados = document.getElementById("mensaje-sin-resultados");

let filtroActual = "todas";

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

document.querySelectorAll(".btn-leer-mas").forEach((boton) => {
  boton.addEventListener("click", () => {
    titulo.textContent = boton.dataset.titulo;
    texto.textContent = boton.dataset.contenido;

    modal.style.display = "flex";
  });
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
});

window.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
  }
});