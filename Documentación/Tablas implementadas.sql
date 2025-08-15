-- 1. Tabla: agencias
CREATE TABLE tbl_agencias (
    id_agencia INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    rif VARCHAR(15) NOT NULL,
    telefono VARCHAR(20),
    email VARCHAR(100),
    direccion TEXT,
    foto VARCHAR(255),
    coord_latitud INT,
	coord_altitud INT,

    -- Claves foráneas:
    Cod_Ciudad INT NOT NULL,
	Cod_Parroquia INT NOT NULL,

    FOREIGN KEY (Cod_Ciudad) REFERENCES tbl_ciudad(Cod_Ciudad)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    FOREIGN KEY (Cod_Parroquia) REFERENCES tbl_parroquia(Cod_Parroquia)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2. Tabla: servicio
CREATE TABLE tbl_servicio (
    id_servicio INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Tabla intermedia: agencia_servicio (relación muchos a muchos)
CREATE TABLE tbl_agencia_servicio (
    id_agencia INT UNSIGNED NOT NULL,
    id_servicio INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_agencia, id_servicio),
    FOREIGN KEY (id_agencia) REFERENCES tbl_agencias(id_agencia)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_servicio) REFERENCES tbl_servicio(id_servicio)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
