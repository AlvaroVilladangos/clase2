DROP TABLE IF EXISTS alumnos CASCADE;

CREATE TABLE alumnos (
    id       bigserial    PRIMARY KEY,
    nombre  varchar(255) NOT NULL
        );

DROP TABLE IF EXISTS ccee CASCADE;

CREATE TABLE ccee (
    id           bigserial   PRIMARY KEY,
    ce           varchar(4) NOT NULL UNIQUE,
    descripcion  varchar(255) NOT NULL
        );

DROP TABLE IF EXISTS notas CASCADE;

CREATE TABLE notas (
    id          bigserial    PRIMARY KEY,
    alumno_id   bigint NOT NULL REFERENCES alumnos (id),
    ccee_id     bigint NOT NULL REFERENCES ccee (id),
    nota        numeric (4,2) NOT NULL
);

-- Fixtures:

INSERT INTO alumnos (nombre)
    VALUES ('alvaro'),
            ('abel'),
            ('roca');

INSERT INTO ccee (ce, descripcion)
    VALUES ('CE2a', 'Fisica'),
           ('CE4b', 'Matematicas');

INSERT INTO notas (alumno_id,ccee_id,nota)
    VALUES (2, 1,7),
           (2, 2,10),
           (3, 2, 8);