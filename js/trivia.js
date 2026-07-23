
let questions = document.querySelectorAll(".question");

let next = document.getElementById("next");

let finish = document.getElementById("finish");

let contador = document.getElementById("contador");

let progress = document.getElementById("progress");

let quizForm = document.getElementById("quiz");
let result = document.getElementById("result");
let resultIcon = document.getElementById("result-icon");
let resultBadge = document.getElementById("result-badge");
let resultTitle = document.getElementById("result-title");
let resultDesc = document.getElementById("result-desc");


let actual = 0;



next.addEventListener("click",()=>{


let selected = questions[actual]
.querySelector("input:checked");


if(!selected){


return;

}



questions[actual]
.classList.remove("active");



actual++;



if(actual < questions.length){


questions[actual]
.classList.add("active");


contador.innerHTML =
"Pregunta "
+(actual+1)
+" de 6";


progress.style.width =
((actual+1)/6)*100+"%";


}



if(actual === questions.length-1){

next.style.display="none";

finish.style.display="block";

}


});


finish.addEventListener("click",()=>{


let selected = questions[actual]
.querySelector("input:checked");


if(!selected){


return;

}



let inputs = quizForm
.querySelectorAll("input[type=radio]:checked");


let puntos = 0;


inputs.forEach((input)=>{

puntos += parseInt(input.value);

});



let nivel = "";

let icono = "";

let descripcion = "";

let claseNivel = "";


if(puntos <= 9){

nivel = "Principiante";

icono = "🌊";

claseNivel = "nivel-principiante";

descripcion = "Estás dando tus primeros pasos en el surf. ¡Es un gran momento para aprender desde cero!";

}else if(puntos <= 14){

nivel = "Intermedio";

icono = "🏄";

claseNivel = "nivel-intermedio";

descripcion = "Ya tienes conocimientos y experiencia. ¡Sigue practicando para perfeccionar tu técnica!";

}else{

nivel = "Avanzado";

icono = "🏆";

claseNivel = "nivel-avanzado";

descripcion = "Tienes un gran dominio del surf. ¡Estás listo para retos más grandes!";

}



progress.style.width = "100%";


quizForm.classList.add("hidden");


resultIcon.innerHTML = icono;

resultBadge.innerHTML = puntos + " / 18 puntos";

resultTitle.innerHTML = "Nivel " + nivel;

resultDesc.innerHTML = descripcion;


result.classList.add(claseNivel);

result.classList.add("active");



let formData = new FormData(quizForm);


fetch(quizForm.action,{

method:"POST",

body: formData

});


});