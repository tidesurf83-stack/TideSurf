

const map = L.map('map').setView([13.4886, -89.3220], 9);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
    attribution:'© OpenStreetMap'
}
).addTo(map);


L.marker([13.4947, -89.4359])
.addTo(map)
.bindPopup("Playa El Zonte");

L.marker([13.1697, -88.1227])
.addTo(map)
.bindPopup("Playa Las Flores");

L.marker([13.5250, -89.6000])
.addTo(map)
.bindPopup("Playa Mizata");

L.marker([13.4920, -89.3830])
.addTo(map)
.bindPopup("Playa El Tunco");

L.marker([13.4905, -89.3805])
.addTo(map)
.bindPopup("Playa El Sunzal");

L.marker([13.4889, -89.3224])
.addTo(map)
.bindPopup("Punta Roca");


const beaches = {

    zonte:{
        title:"Playa El Zonte",
        location:"La Libertad",
        wave:"Point Break",
        level:"Intermediate",
        season:"March - October",
        description:"Playa El Zonte is one of the most iconic surf destinations in El Salvador.",
        activities:[
            "Surf lessons",
            "Yoga sessions",
            "Sunset photography",
            "Beach restaurants"
        ],
        images:[
            "img/zonte1.jpg",
            "img/zonte2.jpg",
            "img/zonte3.jpg"
        ]
    },

    flores:{
        title:"Playa Las Flores",
        location:"San Miguel",
        wave:"Right Point Break",
        level:"Advanced",
        season:"April - September",
        description:"Playa Las Flores is internationally recognized for its powerful right-hand wave.",
        activities:[
            "Professional surfing",
            "Luxury surf camps",
            "Boat rides"
        ],
        images:[
            "img/flores1.jpg",
            "img/flores2.jpg",
            "img/flores3.jpg"
        ]
    },

    mizata:{
        title:"Playa Mizata",
        location:"Sonsonate",
        wave:"Beach Break",
        level:"Beginner - Intermediate",
        season:"All year",
        description:"Mizata combines surfing and eco tourism with beautiful scenery.",
        activities:[
            "Camping",
            "Meditation",
            "Surf camps"
        ],
        images:[
            "img/mizata1.jpg",
            "img/mizata2.jpg",
            "img/mizata3.jpg"
        ]
    },

    tunco:{
        title:"Playa El Tunco",
        location:"La Libertad",
        wave:"Beach Break",
        level:"All Levels",
        season:"All year",
        description:"El Tunco is the heart of surf culture in El Salvador.",
        activities:[
            "Nightlife",
            "Surfing",
            "Live music"
        ],
        images:[
            "img/tunco1.jpg",
            "img/tunco2.jpg",
            "img/tunco3.jpg"
        ]
    },

    sunzal:{
        title:"Playa El Sunzal",
        location:"La Libertad",
        wave:"Long Right Point Break",
        level:"Beginner",
        season:"March - October",
        description:"El Sunzal is perfect for beginners thanks to its long waves.",
        activities:[
            "Surf lessons",
            "Swimming",
            "Beach bars"
        ],
        images:[
            "img/sunzal1.jpg",
            "img/sunzal2.jpg",
            "img/sunzal3.jpg"
        ]
    },

    puntaRoca:{
        title:"Punta Roca",
        location:"Puerto de La Libertad",
        wave:"World-Class Point Break",
        level:"Advanced",
        season:"April - October",
        description:"Punta Roca hosts international surf competitions.",
        activities:[
            "Competitions",
            "Surf training",
            "Photography"
        ],
        images:[
            "img/roca1.jpg",
            "img/roca2.jpg",
            "img/roca3.jpg"
        ]
    }

};


const modal =
document.getElementById("beachModal");

const modalImage =
document.getElementById("modalImage");

const modalTitle =
document.getElementById("modalTitle");

const modalLocation =
document.getElementById("modalLocation");

const modalWave =
document.getElementById("modalWave");

const modalLevel =
document.getElementById("modalLevel");

const modalSeason =
document.getElementById("modalSeason");

const modalDescription =
document.getElementById("modalDescription");

const activitiesList =
document.getElementById("activitiesList");

const closeModal =
document.querySelector(".close-modal");

const leftArrow =
document.querySelector(".left-arrow");

const rightArrow =
document.querySelector(".right-arrow");

let currentBeach;
let currentImage = 0;

function openBeach(beach){

    currentBeach = beaches[beach];

    currentImage = 0;

    modal.style.display = "block";

    updateModal();
}


function updateModal(){

    modalTitle.textContent =
    currentBeach.title;

    modalLocation.textContent =
    currentBeach.location;

    modalWave.textContent =
    currentBeach.wave;

    modalLevel.textContent =
    currentBeach.level;

    modalSeason.textContent =
    currentBeach.season;

    modalDescription.textContent =
    currentBeach.description;

    modalImage.src =
    currentBeach.images[currentImage];

    activitiesList.innerHTML = "";

    currentBeach.activities.forEach(activity=>{

        activitiesList.innerHTML +=
        `<li>${activity}</li>`;

    });
}


rightArrow.addEventListener("click",()=>{

    currentImage++;

    if(currentImage >= currentBeach.images.length){

        currentImage = 0;
    }

    updateModal();

});


leftArrow.addEventListener("click",()=>{

    currentImage--;

    if(currentImage < 0){

        currentImage =
        currentBeach.images.length - 1;
    }

    updateModal();

});


closeModal.addEventListener("click",()=>{

    modal.style.display = "none";

});

window.addEventListener("click",(e)=>{

    if(e.target === modal){

        modal.style.display = "none";
    }

});