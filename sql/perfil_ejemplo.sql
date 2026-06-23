USE tidesurf;

ALTER TABLE register
    ADD COLUMN IF NOT EXISTS foto_perfil VARCHAR(255) NULL AFTER nombre,
    ADD COLUMN IF NOT EXISTS ubicacion VARCHAR(150) NULL AFTER nivel_surf,
    ADD COLUMN IF NOT EXISTS edad INT NULL AFTER ubicacion,
    ADD COLUMN IF NOT EXISTS playas_favoritas VARCHAR(255) NULL AFTER edad,
    ADD COLUMN IF NOT EXISTS sobre_mi TEXT NULL AFTER playas_favoritas;

UPDATE register
SET ubicacion = 'Playa El Cuco, El Salvador.',
    edad = 20,
    nivel_surf = 'Avanzado',
    playas_favoritas = 'El paredon(GT) J-BAY(ZA)',
    sobre_mi = 'Soy Briseyda, una surfista apasionada por el mar y la tranquilidad de la playa...'
WHERE correo = 'TU_CORREO_AQUI';
