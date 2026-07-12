function openModal(imagen, nombre, ubicacion, estrellas, resenas, descripcion, telefono, email){

    document.getElementById("modalImagen").src = imagen;

    document.getElementById("modalNombre").innerText = nombre;

    document.getElementById("modalUbicacion").innerText = ubicacion;

    document.getElementById("modalDescripcion").innerText = descripcion;

    document.getElementById("modalTelefono").innerText = telefono;

    document.getElementById("modalEmail").innerText = email;

    document.getElementById("modalRating").innerHTML =
        "⭐".repeat(Math.round(estrellas)) +
        " " + estrellas +
        " (" + resenas + " reseñas)";

    document.getElementById("academyModal").style.display = "flex";
}

function closeModal(){
    document.getElementById("academyModal").style.display = "none";
}

window.onclick = function(event){

    const modal = document.getElementById("academyModal");

    if(event.target === modal){
        modal.style.display = "none";
    }

}