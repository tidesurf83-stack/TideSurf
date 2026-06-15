CREATE DATABASE IF NOT EXISTS tidesurf CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tidesurf;

CREATE TABLE IF NOT EXISTS register (
    ID_register INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    correo VARCHAR(180) NOT NULL UNIQUE,
    nacionalidad VARCHAR(80) NOT NULL,
    nivel_surf VARCHAR(40) NOT NULL,
    password VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    correo VARCHAR(180) NOT NULL,
    token_hash CHAR(64) NOT NULL UNIQUE,
    expira_en DATETIME NOT NULL,
    usado TINYINT(1) NOT NULL DEFAULT 0,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usado_en DATETIME NULL,
    INDEX idx_password_resets_token (token_hash),
    INDEX idx_password_resets_usuario (usuario_id),
    CONSTRAINT fk_password_resets_usuario
        FOREIGN KEY (usuario_id) REFERENCES register(ID_register)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
