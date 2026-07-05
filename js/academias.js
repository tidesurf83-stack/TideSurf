
function openModal(id) {
    fetch("obtener_escuela.php?id=" + id)
        .then(response => response.json())
        .then(data => {

            
            document.getElementById("modalImagen").src = data.imagen;

         
            document.getElementById("modalNombre").innerText = data.nombre;
            document.getElementById("modalUbicacion").innerText = data.ubicacion;
            document.getElementById("modalDescripcion").innerText = data.descripcion;
            document.getElementById("modalTelefono").innerText = data.telefono;
            document.getElementById("modalEmail").innerText = data.email;

          
            document.getElementById("modalRating").innerText =
                "⭐".repeat(Math.round(data.estrellas)) +
                " " + data.estrellas + " (" + data.total_resenas + " Reseñas)";

           
            document.getElementById("academyModal").style.display = "block";
        });
}

function closeModal() {
    document.getElementById("academyModal").style.display = "none";
}

window.onclick = function(event) {
    const modal = document.getElementById("academyModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
