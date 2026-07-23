
<?php


?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>TideSurf Trivia</title>
<link rel="stylesheet" href="trivia.css">

<link rel="stylesheet" href="css/trivia.css">

</head>


<body>


<div class="trivia-box">


<h1> TideSurf Quiz</h1>

<p class="subtitle">
Descubre cuál es tu nivel dentro del mundo del surf
</p>



<div class="progress-container">

<div id="progress"></div>

</div>


<h3 id="contador">
Pregunta 1 de 6
</h3>



<form action="php/guardar_trivia.php" method="POST" id="quiz">


<input 
type="hidden" 
name="usuario_id"
value="<?php echo htmlspecialchars($id ?? '', ENT_QUOTES) ?>">



<div class="question active">


<h2>
¿Has practicado surf alguna vez?
</h2>


<label>
<input type="radio" name="p1" value="3">
 Sí, ya he surfeado
</label>


<label>
<input type="radio" name="p1" value="2">
 Una vez o pocas veces
</label>


<label>
<input type="radio" name="p1" value="1">
 Nunca
</label>


</div>



<div class="question">


<h2>
¿Qué tanto sabes sobre las olas?
</h2>


<label>
<input type="radio" name="p2" value="3">
Sé identificar tipos de olas
</label>


<label>
<input type="radio" name="p2" value="2">
Conozco lo básico
</label>


<label>
<input type="radio" name="p2" value="1">
Estoy aprendiendo
</label>


</div>




<div class="question">


<h2>
¿Cuál es tu objetivo con el surf?
</h2>


<label>
<input type="radio" name="p3" value="3">
Ser un surfista avanzado
</label>


<label>
<input type="radio" name="p3" value="2">
Aprender por diversión
</label>


<label>
<input type="radio" name="p3" value="1">
Conocer más del deporte
</label>


</div>




<div class="question">


<h2>
¿Qué conoces sobre una tabla de surf?
</h2>


<label>
<input type="radio" name="p4" value="3">
Conozco varios tipos
</label>


<label>
<input type="radio" name="p4" value="2">
Sé lo básico
</label>


<label>
<input type="radio" name="p4" value="1">
No conozco mucho
</label>


</div>




<div class="question">


<h2>
¿Cuánto te gustaría aprender surf?
</h2>


<label>
<input type="radio" name="p5" value="3">
    Muchísimo
</label>


<label>
<input type="radio" name="p5" value="2">
    Me interesa
</label>


<label>
<input type="radio" name="p5" value="1">
Solo quiero información
</label>


</div>




<div class="question">


<h2>
¿Qué buscas en TideSurf?
</h2>


<label>
<input type="radio" name="p6" value="3">
Aprender y practicar surf
</label>


<label>
<input type="radio" name="p6" value="2">
Noticias y competencias
</label>


<label>
<input type="radio" name="p6" value="1">
Explorar el mundo surfista
</label>


</div>




<button 
type="button" id="next">Siguiente </button>



<button 
type="button"
id="finish">

Finalizar 

</button>


</form>


<div class="result" id="result">

<div class="result-icon" id="result-icon"></div>

<span class="result-badge" id="result-badge"></span>

<h2 id="result-title"></h2>

<p id="result-desc"></p>

<button type="button" id="retry" onclick="location.reload()">
Volver a intentar
</button>

</div>


</div>


<script src="js/trivia.js"></script>


</body>

</html>