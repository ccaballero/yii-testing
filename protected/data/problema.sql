CREATE TABLE problema (
    codigo            serial          NOT NULL,
    nombre            varchar(128)    NOT NULL,
    cpu_max           integer         NOT NULL,
    mem_max           integer         NOT NULL,
    path_descripcion  varchar(258)    NOT NULL,
    path_entrada      varchar(258)    NOT NULL,
    path_salida       varchar(256)    NOT NULL,
    PRIMARY KEY (codigo)
);
