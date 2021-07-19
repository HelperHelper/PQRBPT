CREATE DATABASE IF NOT EXIST apibpt;

USE apibpt;

CREATE TABLE peticiones(
    id int(255) auto_increment not null,
    nombre varchar(255),
    mensaje varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    numeroradicado int(255),
    CONSTRAINT pk_peticiones PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE reclamoPeticiones(
    id int(255) auto_increment not null,
    peticion_id int(255) not null,
    nombre varchar(255),
    mensaje varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    numeroradicado int(255),
    CONSTRAINT pk_reclamopeticiones PRIMARY KEY(id),
    CONSTRAINT fk_reclamos_petiones FOREIGN KEY(peticion_id) REFERENCES peticiones(id)

)ENGINE=InnoDb;

CREATE TABLE respuestaPeticiones(
    id int(255) auto_increment not null,
    peticion_id int(255) not null,
    nombre varchar(255),
    mensaje varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    numeroradicado int(255),
    CONSTRAINT pk_respuestapeticiones PRIMARY KEY(id),
    CONSTRAINT fk_respuesta_petiones FOREIGN KEY(peticion_id) REFERENCES peticiones(id)

)ENGINE=InnoDb;

CREATE TABLE quejas(
    id int(255) auto_increment not null,
    nombre varchar(255),
    mensaje varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    numeroradicado int(255),
    CONSTRAINT pk_quejas PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE reclamoQuejas(
    id int(255) auto_increment not null,
    queja_id int(255) not null,
    nombre varchar(255),
    mensaje varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    numeroradicado int(255),
    CONSTRAINT pk_reclamoquejas PRIMARY KEY(id),
    CONSTRAINT fk_reclamos_quejas FOREIGN KEY(queja_id) REFERENCES quejas(id)

)ENGINE=InnoDb;

CREATE TABLE respuestaQuejas(
    id int(255) auto_increment not null,
    queja_id int(255) not null,
    nombre varchar(255),
    mensaje varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    numeroradicado int(255),
    CONSTRAINT pk_respuestaquejas PRIMARY KEY(id),
    CONSTRAINT fk_respuestas_quejas FOREIGN KEY(queja_id) REFERENCES quejas(id)

)ENGINE=InnoDb;

