import "./Login.css";

export default function Login() {
  return (
    <>
      {/* NAVBAR */}
      <div className="navbar">

        {/* LOGO */}
        <div className="logo-section">
          <img
            src="/logo.png"
            alt="Logo"
            className="logo"
          />
        </div>

        {/* TITULO */}
        <h1>Inicio de Sesión</h1>

        {/* FLECHA */}
        <a href="/registro" className="back-arrow">
          ←
        </a>
      </div>

      {/* CONTENEDOR LOGIN */}
      <div className="login-container">

        {/* CARD */}
        <div className="login-card">

          <h2>Bienvenido a TideSurf</h2>

          {/* EMAIL */}
          <div className="input-group">
            <input
              type="email"
              placeholder="Correo electrónico"
            />
          </div>

          {/* PASSWORD */}
          <div className="input-group">
            <input
              type="password"
              placeholder="Contraseña"
            />
          </div>

          {/* LINK */}
          <div className="forgot-password">
            <a href="/">¿Olvidé mi contraseña?</a>
          </div>

          {/* BOTON */}
          <button className="btn-login">
            Iniciar Sesión
          </button>

          {/* REGISTRO */}
          <p className="register-text">
            ¿No tienes cuenta?{" "}
            <a href="/registro">Regístrate</a>
          </p>

        </div>
      </div>
    </>
  );
}