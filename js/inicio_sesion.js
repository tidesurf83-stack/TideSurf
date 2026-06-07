document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');
 
    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bx-hide');
            this.classList.toggle('bx-show');
        });
    }
 
    const form = document.querySelector('.formulario-login');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        document.body.classList.add('mostrar-olas');
        setTimeout(() => {
            form.submit();
        }, 1500);
    });
});
 