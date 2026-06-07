document.addEventListener("DOMContentLoaded", function() {
    // 1. Buscamos el formulario de registro por su etiqueta
    const formulario = document.querySelector('form');
 
    if (formulario) {
        // 2. Escuchamos el evento 'submit' (cuando se intenta enviar el formulario)
        formulario.addEventListener('submit', function(e) {
            
            // 3. Como es un evento 'submit', el navegador YA comprobó que todos 
            // los campos requeridos (nombre, correo, contraseñas, etc.) estén llenos.
            // Si faltaba alguno, el navegador ya detuvo el proceso automáticamente 
            // y este código no se ejecuta.
            
            // 4. Detenemos temporalmente el envío automático para que no se recargue la página de golpe
            e.preventDefault();
 
            // 5. Activamos las olas únicamente ahora, porque sabemos que todo está correcto
            document.body.classList.add('mostrar-olas');
            console.log("¡Campos completados con éxito! Iniciando oleaje...");
 
            // 6. Esperamos 1.5 segundos para que se vea la animación y enviamos los datos de verdad
            setTimeout(() => {
                formulario.submit();
            }, 1500);
        });
    }
});
 