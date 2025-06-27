
-- Tabla de usuarios
CREATE TABLE Usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    rol VARCHAR(50),
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de administradores
CREATE TABLE Administradores (
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    contraseña VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);
 
-- Tabla de autoridades
CREATE TABLE Autoridades (
    id_autoridad INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    cargo VARCHAR(100),
    institucion VARCHAR(100),
    telefono VARCHAR(20),
    fecha_asignacion DATE,
    ubicacion VARCHAR(150),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

-- Tabla de estaciones de monitoreo
CREATE TABLE Estaciones_Monitoreo (
    id_estacion INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    ubicacion VARCHAR(150),
    latitud DECIMAL(9,6),
    longitud DECIMAL(9,6),
    id_autoridad INT,
    FOREIGN KEY (id_autoridad) REFERENCES Autoridades(id_autoridad)
);

-- Tabla de dispositivos IoT
CREATE TABLE Dispositivos_IoT (
    id_dispositivo INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(100),
    ubicacion VARCHAR(150),
    estado VARCHAR(50),
    fecha_instalacion DATE,
    id_estacion INT,
    FOREIGN KEY (id_estacion) REFERENCES Estaciones_Monitoreo(id_estacion)
);
