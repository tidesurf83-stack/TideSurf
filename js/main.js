window.onload = function () {

  const splash = document.getElementById("splash");
  const home = document.getElementById("home");

  setTimeout(() => {

    splash.style.transition = "4s ease";
    splash.style.opacity = "0";

    setTimeout(() => {
      splash.style.display = "none";
      home.style.display = "block";
    }, 1000);

  }, 3500);

};

const counters = document.querySelectorAll(".counter");
 
counters.forEach(counter => {
 
    const updateCounter = () => {
 
        const target = +counter.getAttribute("data-target");
 
        const current = +counter.innerText;
 
        const increment = target / 100;
 
        if(current < target){
 
            counter.innerText =
            Math.ceil(current + increment);
 
            setTimeout(updateCounter,20);
 
        }else{
 
            counter.innerText = target;
 
        }
 
    }
 
    updateCounter();
 
});
 
const beachSwiper = new Swiper(".beachesSwiper", {
 
    loop:true,
 
    spaceBetween:30,
 
    autoplay:{
        delay:3500
    },
 
    pagination:{
        el:".swiper-pagination",
        clickable:true
    },
 
    breakpoints:{
 
        0:{
            slidesPerView:1
        },
 
        768:{
            slidesPerView:2
        },
 
        1200:{
            slidesPerView:3
        }
 
    }
 
});
 
 
const tips = [
 
"Flexiona ligeramente las rodillas para mejorar el equilibrio.",
 
"Mira siempre hacia donde quieres dirigirte.",
 
"Rema con fuerza antes de tomar la ola.",
 
"Practica tu posición sobre la tabla fuera del agua.",
 
"Mantén la calma cuando caigas de la tabla."
 
];
 
let tipIndex = 0;
 
setInterval(() => {
 
    tipIndex++;
 
    if(tipIndex >= tips.length){
 
        tipIndex = 0;
    }
 
    document.getElementById("surfTip").innerHTML =
    tips[tipIndex];
 
},5000);
 
 
 
const beaches = [
 
{
name:"El Zonte",
text:"Ideal para surfistas intermedios."
},
 
{
name:"Mizata",
text:"Perfecta para disfrutar olas largas."
},
 
{
name:"Punta Roca",
text:"Una de las mejores derechas de Centroamérica."
},
 
{
name:"Las Flores",
text:"Excelente para surfistas avanzados."
}
 
];
 
let beachIndex = 0;
 
setInterval(() => {
 
    beachIndex++;
 
    if(beachIndex >= beaches.length){
 
        beachIndex = 0;
    }
 
    document.getElementById("recommendedBeach").innerHTML =
 
    `
    <h5>${beaches[beachIndex].name}</h5>
    <p>${beaches[beachIndex].text}</p>
    `;
 
},6000);
 
 
const events = [
 
{
name:"Surf Fest 2026",
text:"15 Julio · El Tunco"
},
 
{
name:"National Surf Open",
text:"28 Julio · Punta Roca"
},
 
{
name:"Junior Surf Cup",
text:"10 Agosto · El Zonte"
}
 
];
 
let eventIndex = 0;
 
setInterval(() => {
 
    eventIndex++;
 
    if(eventIndex >= events.length){
 
        eventIndex = 0;
    }
 
    document.getElementById("eventInfo").innerHTML =
 
    `
    <h5>${events[eventIndex].name}</h5>
    <p>${events[eventIndex].text}</p>
    `;
 
},7000);
 