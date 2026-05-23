// Crear el mapa centrado en El Salvador
const map = L.map('map').setView([13.6929, -89.2182], 8);


// Añadir el mapa base (OpenStreetMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap'
}).addTo(map);



// Playa El Tunco
const tunco = L.marker([13.4947, -89.4103]).addTo(map);

// Popup (cuando hacen clic)
tunco.bindPopup("<b>Playa El Tunco</b><br>Surf spot popular 🌊");

const playas = [
  {
    nombre: "El Tunco",
    coords: [13.4947, -89.4103]
  },
  {
    nombre: "El Sunzal",
    coords: [13.4901, -89.4065]
  },
  {
    nombre: "La Libertad",
    coords: [13.4886, -89.3226]
  }
];

// recorrer y agregar
playas.forEach(playa => {
  L.marker(playa.coords)
    .addTo(map)
    .bindPopup(`<b>${playa.nombre}</b><br>Buen spot 🌊`);
});


