const beaches = {

    zonte:{
        title:"Playa El Zonte",
        location:"La Libertad, El Salvador",
        wave:"Point Break",
        level:"Intermedio",
        season:"Marzo - Octubre",
        water:"27°C promedio",
        boards:"Fish / Shortboard",
        description:"Playa El Zonte es uno de los destinos de surf más famosos de Centroamérica. Sus olas largas y constantes la convierten en un lugar ideal para surfistas.",
        activities:[
            "Clases de surf",
            "Fotografía de atardeceres",
            "Fogatas en la playa",
            "Sesiones de yoga",
            "Restaurantes frente al mar"
        ],
        tips:[
            "Usa bloqueador solar resistente al agua",
            "Las mejores olas aparecen temprano",
            "Tabla recomendada: Fish",
            "Lleva bolsas impermeables"
        ],
        images:[
            
            "img/playas/zonte.webp",
            "img/playas/el zonte2.webp",
            "img/playas/zonte3.webp"
        ]
    },

    flores:{
        title:"Playa Las Flores",
        location:"San Miguel, El Salvador",
        wave:"Point Break de Derecha",
        level:"Avanzado",
        season:"Abril - Septiembre",
        water:"28°C promedio",
        boards:"Shortboard Profesional",
        description:"Playa Las Flores es reconocida internacionalmente por sus olas rápidas y técnicas.",
        activities:[
            "Surf profesional",
            "Paseos en lancha",
            "Surf camps",
            "Competencias"
        ],
        tips:[
            "Ideal para surfistas experimentados",
            "Revisa el swell antes de entrar",
            "Usa quillas avanzadas"
        ],
        images:[
            "img/playas/las flores.webp",
            "img/playas/las flores2.webp",
            "img/playas/lasflores3.webp"
        ]
    },

    mizata:{
        title:"Playa Mizata",
        location:"Sonsonate, El Salvador",
        wave:"Beach Break",
        level:"Principiante - Intermedio",
        season:"Todo el año",
        water:"26°C promedio",
        boards:"Longboard",
        description:"Mizata es famosa por su ambiente ecológico y relajante.",
        activities:[
            "Surf camps",
            "Ecoturismo",
            "Meditación",
            "Camping"
        ],
        tips:[
            "Perfecta para aprender",
            "Las mañanas son más tranquilas",
            "Ideal para retiros de surf"
        ],
        images:[
            "img/playas/mizata.webp",
            "img/playas/mizata2.png",
            "img/playas/mizata3.webp"
        ]
    },

    tunco:{
        title:"Playa El Tunco",
        location:"La Libertad, El Salvador",
        wave:"Beach Break",
        level:"Todos los niveles",
        season:"Todo el año",
        water:"27°C promedio",
        boards:"Todo tipo de tablas",
        description:"El Tunco es el corazón de la cultura surf en El Salvador.",
        activities:[
            "Clases de surf",
            "Música en vivo",
            "Restaurantes",
            "Vida nocturna"
        ],
        tips:[
            "Perfecta para principiantes",
            "Tiene los mejores atardeceres",
            "Hay tiendas de surf cerca"
        ],
        images:[
            "img/playas/tunco1.webp",
            "img/playas/el tunco2.jpg",
            "img/playas/eltunco3.webp"
        ]
    },

    sunzal:{
        title:"Playa El Sunzal",
        location:"La Libertad, El Salvador",
        wave:"Point Break Largo",
        level:"Principiante",
        season:"Marzo - Octubre",
        water:"27°C promedio",
        boards:"Longboard",
        description:"Una de las mejores playas para aprender surf.",
        activities:[
            "Clases de surf",
            "Longboard",
            "Fotografía",
            "Bares de playa"
        ],
        tips:[
            "Ideal para principiantes",
            "Usa tablas soft-top",
            "Las olas son lentas y seguras"
        ],
        images:[
            "img/playas/el sunzal.jpg",
            "img/playas/el sunzal2.webp",
            "img/playas/sunzal3.webp"
        ]
    },

    puntaRoca:{
        title:"Punta Roca",
        location:"Puerto de La Libertad",
        wave:"Point Break Mundial",
        level:"Avanzado",
        season:"Abril - Octubre",
        water:"28°C promedio",
        boards:"Shortboard Profesional",
        description:"La ola más famosa de El Salvador.",
        activities:[
            "Campeonatos de surf",
            "Entrenamiento profesional",
            "Fotografía deportiva"
        ],
        tips:[
            "Solo para avanzados",
            "Hay arrecifes debajo",
            "Las olas son muy rápidas"
        ],
        images:[
            "img/playas/punta roca 2.webp",
            "img/playas/punta roca.jpg",
            "img/playas/puntaroca3.webp"
        ]
    }

};


const modal = document.getElementById("beachModal");
const modalImage = document.getElementById("modalImage");
const modalTitle = document.getElementById("modalTitle");
const modalLocation = document.getElementById("modalLocation");
const modalWave = document.getElementById("modalWave");
const modalLevel = document.getElementById("modalLevel");
const modalSeason = document.getElementById("modalSeason");
const modalDescription = document.getElementById("modalDescription");
const activitiesList = document.getElementById("activitiesList");

const closeModal = document.querySelector(".close-modal");
const leftArrow = document.querySelector(".left-arrow");
const rightArrow = document.querySelector(".right-arrow");

let currentBeach;
let currentImage = 0;


function openBeach(beach){

    currentBeach = beaches[beach];
    currentImage = 0;

    modal.style.display = "block";

    updateModal();
}


function updateModal(){

    modalTitle.innerHTML = currentBeach.title;

    modalLocation.textContent = currentBeach.location;
    modalWave.textContent = currentBeach.wave;
    modalLevel.textContent = currentBeach.level;
    modalSeason.textContent = currentBeach.season;
    modalDescription.textContent = currentBeach.description;

    modalImage.src = currentBeach.images[currentImage];

    activitiesList.innerHTML = "";

    currentBeach.activities.forEach(activity => {
        activitiesList.innerHTML += `<li>${activity}</li>`;
    });
}

rightArrow.addEventListener("click", () => {

    currentImage++;

    if(currentImage >= currentBeach.images.length){
        currentImage = 0;
    }

    updateModal();
});

leftArrow.addEventListener("click", () => {

    currentImage--;

    if(currentImage < 0){
        currentImage = currentBeach.images.length - 1;
    }

    updateModal();
});


closeModal.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (e) => {

    if(e.target === modal){
        modal.style.display = "none";
    }
});


const cards = document.querySelectorAll(".card");

const observer = new IntersectionObserver(entries => {

    entries.forEach(entry => {

        if(entry.isIntersecting){

            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }

    });

});

cards.forEach(card => {

    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = ".7s";

    observer.observe(card);
});
const monthlyTop = {

    0: [ 
        {
            name: "El Sunzal",
            location: "La Libertad",
            image: "img/playas/el sunzal.jpg"
        },
        {
            name: "El Tunco",
            location: "La Libertad",
            image: "img/playas/tunco1.webp"
        },
        {
            name: "El Zonte",
            location: "La Libertad",
            image: "img/playas/zonte.webp"
        }
    ],

    1: [ 
        {
            name: "El Sunzal",
            location: "La Libertad",
            image: "img/playas/el sunzal.jpg"
        },
        {
            name: "El Tunco",
            location: "La Libertad",
            image: "img/playas/tunco1.webp"
        },
        {
            name: "El Zonte",
            location: "La Libertad",
            image: "img/playas/zonte.webp"
        }
    ],

    2: [ 
        {
            name: "El Zonte",
            location: "La Libertad",
            image: "img/playas/zonte.webp"
        },
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/punta roca.jpg"
        },
        {
            name: "El Sunzal",
            location: "La Libertad",
            image: "img/playas/el sunzal.jpg"
        }
    ],

    3: [ 
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/punta roca.jpg"
        },
        {
            name: "Las Flores",
            location: "San Miguel",
            image: "img/playas/las flores.webp"
        },
        {
            name: "El Zonte",
            location: "La Libertad",
            image: "img/playas/zonte.webp"
        }
    ],

    4: [ 
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/punta roca.jpg"
        },
        {
            name: "Las Flores",
            location: "San Miguel",
            image: "img/playas/las flores.webp"
        },
        {
            name: "Mizata",
            location: "Sonsonate",
            image: "img/playas/mizata.webp"
        }
    ],

    5: [
        {
            name: "Las Flores",
            location: "San Miguel",
            image: "img/playas/las flores.webp"
        },
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/punta roca.jpg"
        },
        {
            name: "Mizata",
            location: "Sonsonate",
            image: "img/playas/mizata.webp"
        }
    ],

    6: [ 
        {
            name: "Las Flores",
            location: "San Miguel",
            image: "img/playas/lasflores.jpg"
        },
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/puntaroca.jpg"
        },
        {
            name: "Mizata",
            location: "Sonsonate",
            image: "img/playas/mizata.jpg"
        }
    ],

    7: [ 
        {
            name: "Las Flores",
            location: "San Miguel",
            image: "img/playas/lasflores.jpg"
        },
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/puntaroca.jpg"
        },
        {
            name: "Punta Mango",
            location: "La Unión",
            image: "img/playas/puntamango.jpg"
        }
    ],

    8: [ 
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/punta roca.jpg"
        },
        {
            name: "Las Flores",
            location: "San Miguel",
            image: "img/playas/las flores.webp"
        },
        {
            name: "Punta Mango",
            location: "La Unión",
            image: "img/playas/punta-mango.jpg"
        }
    ],

    9: [ 
        {
            name: "Punta Roca",
            location: "La Libertad",
            image: "img/playas/punta roca.jpg"
        },
        {
            name: "Las Flores",
            location: "San Miguel",
            image: "img/playas/las flores.webp"
        },
        {
            name: "Punta Mango",
            location: "La Unión",
            image: "img/playas/punta-mango.jpg"
        }
    ],

    10: [ // Noviembre
        {
            name: "El Sunzal",
            location: "La Libertad",
            image: "img/playas/el sunzal.jpg"
        },
        {
            name: "El Tunco",
            location: "La Libertad",
            image: "img/playas/tunco1.webp"
        },
        {
            name: "El Zonte",
            location: "La Libertad",
            image: "img/playas/zonte.webp"
        }
    ],

    11: [ 
        {
            name: "El Sunzal",
            location: "La Libertad",
            image: "img/playas/el sunzal.jpg"
        },
        {
            name: "El Tunco",
            location: "La Libertad",
            image: "img/playas/tunco1.webp"
        },
        {
            name: "El Zonte",
            location: "La Libertad",
            image: "img/playas/zonte.webp"
        }
    ]
};
const currentMonth = new Date().getMonth();

const topData = monthlyTop[currentMonth] || monthlyTop[0];

document.getElementById("top1-img").src = topData[0].image;
document.getElementById("top1-name").textContent = topData[0].name;
document.getElementById("top1-location").textContent = topData[0].location;

document.getElementById("top2-img").src = topData[1].image;
document.getElementById("top2-name").textContent = topData[1].name;
document.getElementById("top2-location").textContent = topData[1].location;

document.getElementById("top3-img").src = topData[2].image;
document.getElementById("top3-name").textContent = topData[2].name;
document.getElementById("top3-location").textContent = topData[2].location;

const months = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
];

document.getElementById("monthName").textContent =
    months[currentMonth];

const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');

if(hamburger && mobileMenu){

hamburger.addEventListener('click', () => {

    hamburger.classList.toggle('active');
    mobileMenu.classList.toggle('active');

});

}

  document.querySelectorAll('.mobile-menu a').forEach(link => {
    link.addEventListener('click', () => {
      hamburger.classList.remove('active');
      mobileMenu.classList.remove('active');
    });
  });

  // INFORMACIÓN DEL TOP 3

const details =topDetails =  {


    "Las Flores":{

        wave:"5 - 8 pies",

        water:"28°C",

        level:"Avanzado",

        score:"9.8/10",

        description:
        "Durante esta época Las Flores recibe marejadas constantes del Pacífico Sur, creando olas largas, rápidas y perfectas para surfistas experimentados."

    },



    "Punta Roca":{

        wave:"6 - 10 pies",

        water:"28°C",

        level:"Experto",

        score:"9.6/10",

        description:
        "Una de las olas más reconocidas de El Salvador. Sus condiciones ofrecen sesiones potentes y técnicas."

    },



    "Mizata":{

        wave:"5 - 9 pies",

        water:"28°C",

        level:"Intermedio - Avanzado",

        score:"9.3/10",

        description:
        "Destaca por sus olas consistentes, su entorno natural y una experiencia más tranquila para surfistas."

    },



    "El Sunzal":{

        wave:"3 - 6 pies",

        water:"27°C",

        level:"Principiante",

        score:"9/10",

        description:
        "Una playa ideal para aprender surf gracias a sus olas largas y suaves."

    },



    "El Tunco":{

        wave:"4 - 7 pies",

        water:"27°C",

        level:"Todos los niveles",

        score:"8.8/10",

        description:
        "El corazón de la cultura surf salvadoreña, con excelentes servicios y ambiente turístico."

    },



    "El Zonte":{

        wave:"4 - 8 pies",

        water:"27°C",

        level:"Intermedio",

        score:"9/10",

        description:
        "Una playa reconocida por sus olas constantes y su comunidad surf."

    },


    "Punta Mango":{

        wave:"6 - 9 pies",

        water:"28°C",

        level:"Avanzado",

        score:"9.4/10",

        description:
        "Una playa remota con olas potentes y de gran calidad."

    }


};

function openTopModal(position){


    const beach = topData[position];


    const details = topDetails[beach.name];



    document.getElementById("topModalImage").src =
    beach.image;



    document.getElementById("topModalName").textContent =
    beach.name;



    document.getElementById("topModalRank").textContent =
    "#" + (position + 1);



    document.getElementById("topModalLocation").textContent =
    beach.location;



    document.getElementById("topModalWave").textContent =
    details.wave;



    document.getElementById("topModalWater").textContent =
    details.water;



    document.getElementById("topModalLevel").textContent =
    details.level;



    document.getElementById("topModalScore").textContent =
    details.score;



    document.getElementById("topModalDescription").textContent =
    details.description;



    document.getElementById("topModal").style.display="block";


}

const closeTopModal = document.querySelector(".close-top-modal");


closeTopModal.onclick=function(){

    document.getElementById("topModal").style.display="none";

};



window.addEventListener("click",function(e){


    const modal=document.getElementById("topModal");


    if(e.target===modal){

        modal.style.display="none";

    }


});