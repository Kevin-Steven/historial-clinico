CREATE DATABASE historialClinico;
USE historialClinico;

CREATE TABLE registro (
    id_registro INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) not null,
    apellido VARCHAR(100) not null,
    telefono VARCHAR(15) not null,
    email VARCHAR(100) not null,
    contraseña VARCHAR(50) not null,
    rol VARCHAR(100) not null
);

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY, 
    email varchar(100) not null,
    contraseña VARCHAR(50) not null,
    rol VARCHAR(100) not null,
    registro_id INT not null,
    FOREIGN KEY (registro_id) REFERENCES registro(id_registro)
);


CREATE TABLE datos_afiliado(
id_datos_afiliado INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
id_usuario int,
nombres VARCHAR(35) NOT NULL,
apellidos VARCHAR(35) NOT NULL,
cedula VARCHAR(10) NOT NULL,
direccion VARCHAR(50) NOT NULL,
barrio VARCHAR(25) NOT NULL,
canton VARCHAR(20) NOT NULL,
provincia VARCHAR(20) NOT NULL,
telefono VARCHAR(10) NOT NULL,
fecha_nacimiento DATE NOT NULL,
ocupacion VARCHAR(30) NOT NULL,
sexo VARCHAR(10) NOT NULL,
estado_civil VARCHAR(20) NOT NULL,
hijos INT NOT NULL,
nombre_contacto VARCHAR(20) NOT NULL,
carrera VARCHAR(50) NOT NULL,
fecha DATE NOT NULL,
estudios_realizados VARCHAR(30) NOT NULL,
atencion_medica VARCHAR(50) NOT NULL,
profesion varchar(50),
estado int default 1,
foreign key (id_usuario) references registro(id_registro),
fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE antecedentes_patologicos (
id_antecedentes_patologicos INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
id_datos_afiliado INT,
alergico varchar(2),
descripcion_alergia varchar(150),
clinica varchar(2),
descripcion_clinica varchar(150),
ginecologia varchar(2),
descripcion_ginecologia varchar(150),
traumatologia varchar(2),
descripcion_traumatologia varchar(150),
quirurgico varchar(2),
descripcion_quirurgico varchar(150),
farmacologico varchar(2),
descripcion_farmacologico varchar(150),
psiquiatrico varchar(2),
descripcion_psiquiatrico varchar(150),
otro varchar(2),
descripcion_otro varchar(150),
antecedentes_discapacidad VARCHAR(10),
carnet_conadis VARCHAR(10), 
descripcion_discapacidad_fisica VARCHAR(255),
descripcion_discapacidad_intelectual VARCHAR(255),
descripcion_discapacidad_mental VARCHAR(255),
descripcion_discapacidad_psicosocial VARCHAR(255),
descripcion_discapacidad_sensorial VARCHAR(255),
descripcion_discapacidad_auditiva VARCHAR(255),
descripcion_discapacidad_visual VARCHAR(255),
porcentaje_discapacidad INT,
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table antecedentes_obstetricos (
id_antecedentes_obstetricos int auto_increment primary key,
id_datos_afiliado int,
menarquea varchar(2),
gesta varchar(2),
cesarea varchar(2),
aborto varchar(2),
alcohol CHAR(5),
droga varchar(2),
cigarrillo varchar(2),
otro_obstetricos varchar(2),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table antecedentes_patologicos_familiares (
id_antecedentes_patologicos_familiares int auto_increment primary key,
id_datos_afiliado int,
descripcion_antecedentes_patologicos_familiares varchar(300),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table enfermedad_actual (
id_enfermedad_actual int auto_increment primary key,
id_datos_afiliado int,
via_aerea_libre varchar(2),
descripcion_via_aerea_libre varchar(200),
via_aerea_obstruida varchar(2),
descripcion_via_aerea_obstruida varchar(200),
condicion_estable varchar(2),
descripcion_condicion_estable varchar(200),
condicion_inestable varchar(2),
descripcion_condicion_inestable varchar(200),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table signos_vitales (
id_signos_vitales int auto_increment primary key,
id_datos_afiliado int,
presion_arterial varchar(50),
frecuencia_cardiaca varchar(50),
frecuencia_respiratoria varchar(50),
temperatura varchar(50),
peso varchar(50),
talla varchar(50),
observacion varchar(150),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table examen_fisico_general (
id_examen_fisico_general int auto_increment primary key,
id_datos_afiliado int,
descripcion_examen_fisico_general varchar(300),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table examen_fisico_regional (
id_examen_fisico_regional int auto_increment primary key,
id_datos_afiliado int,
cabeza varchar(2),
descripcion_cabeza varchar(200),
cuello varchar(2),
descripcion_cuello varchar(200),
torax varchar(2),
descripcion_torax varchar(200),
abdomen varchar(2),
descripcion_abdomen varchar(200),
columna varchar(2),
descripcion_columna varchar(200),
pelvis varchar(2),
descripcion_pelvis varchar(200),
extremidades varchar(2),
descripcion_extremidades varchar(200),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table diagnostico (
id_diagnostico int auto_increment primary key,
id_datos_afiliado int,
presuntivo varchar(200),
definitivo varchar(200),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

create table tratamiento (
id_tratamiento int auto_increment primary key,
id_datos_afiliado int,
indicacion_1 varchar(200),
medicamento_1 varchar(200),
posologia_1 varchar(150),
indicacion_2 varchar(200),
medicamento_2 varchar(200),
posologia_2 varchar(150),
indicacion_3 varchar(200),
medicamento_3 varchar(200),
posologia_3 varchar(150),
indicacion_4 varchar(200),
medicamento_4 varchar(200),
posologia_4 varchar(150),
foreign key (id_datos_afiliado) references datos_afiliado(id_datos_afiliado)
);

# INSERTAMOS LOS REGISTROS DE LA TABLA "REGISTRO" A LA TABLA "USUARIO"

DELIMITER $$
CREATE TRIGGER registro_insert_trigger
AFTER INSERT ON registro
FOR EACH ROW
BEGIN
    INSERT INTO usuario (email, contraseña, rol, registro_id)
    VALUES (NEW.email, NEW.contraseña, NEW.rol, NEW.id_registro);
END$$
DELIMITER ;

insert into registro (nombre, apellido, telefono, email, contraseña, rol)
values ('user', 'userLastName', '0999999999', 'user@gmail.com', '1', 'gestora');