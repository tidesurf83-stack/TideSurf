
const bounds = L.latLngBounds(
    [12.9, -90.3], // esquina suroeste
    [14.6, -87.5]  // esquina noreste
);

const map = L.map('map', {
    minZoom: 8,
    maxZoom: 14,
    maxBounds: bounds,
    maxBoundsViscosity: 1.0
}).setView([13.6929, -89.2182], 8);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
}).addTo(map);


const surfIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/2204/2204346.png',
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -35]
});


const playas = [

    {
        nombre: "Playa El Tunco",
        coords: [13.4947, -89.4103],
        descripcion: "Uno de los destinos de surf más famosos de El Salvador."
    },

    {
        nombre: "Playa El Sunzal",
        coords: [13.4901, -89.4065],
        descripcion: "Ideal para principiantes por sus olas largas y suaves."
    },

    {
        nombre: "Punta Roca",
        coords: [13.4889, -89.3224],
        descripcion: "Escenario de competencias internacionales de surf."
    },

    {
        nombre: "Playa El Zonte",
        coords: [13.4947, -89.4359],
        descripcion: "Famosa por sus atardeceres y ambiente relajado."
    },

    {
        nombre: "Playa Mizata",
        coords: [13.5250, -89.6000],
        descripcion: "Perfecta para surf, naturaleza y descanso."
    },

    {
        nombre: "Playa Las Flores",
        coords: [13.1697, -88.1227],
        descripcion: "Destino reconocido para surfistas avanzados."
    }

];


playas.forEach(playa => {

    L.marker(playa.coords, {
        icon: surfIcon
    })
    .addTo(map)
    .bindPopup(`
        <div style="text-align:center;">
            <h3>${playa.nombre}</h3>
            <p>${playa.descripcion}</p>
        </div>
    `);

});


map.fitBounds(bounds);