USE databaseGC;

DROP TABLE IF EXISTS liquidaciones_comercios;
DROP TABLE IF EXISTS liquidaciones_repartidores;
DROP TABLE IF EXISTS liquidaciones_sistema;
DROP TABLE IF EXISTS liquidacion_pedidos;

DROP TABLE IF EXISTS liquidaciones;
DROP TABLE IF EXISTS importes;
DROP TABLE IF EXISTS porcentajes;


CREATE TABLE liquidaciones (
  id int(11) primary key AUTO_INCREMENT,
  id_comercio int(11) NOT NULL,
  id_repartidor int(11) NOT NULL,
  fecha_desde date NOT NULL,
  fecha_hasta date NOT NULL,
  ganancia_repartidor FLOAT(7,2) NOT NULL,
  ganancia_sistema FLOAT(7,2) NOT NULL,
  ganancia_comercio FLOAT(7,2) NOT NULL
);


CREATE TABLE importes (
  id int(11) primary key AUTO_INCREMENT,
  id_pedido int(11) NOT NULL,
  id_comercio int(11) NOT NULL,
  id_repartidor int(11) NOT NULL,
  monto_comercio FLOAT(7,2) NOT NULL,
  monto_repartidor FLOAT(7,2) NOT NULL,
  monto_sistema FLOAT(7,2) NOT NULL,
  fecha_pedido date NOT NULL,
  id_liquidacion_comercio int(11) default NULL,
  id_liquidacion_repartidor int(11) default NULL
);

CREATE TABLE porcentajes (
  id int(11) primary key AUTO_INCREMENT,
  rol varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  porcentaje int(3) NOT NULL
);

insert into porcentajes (rol, porcentaje) 
values
('Repartidor',3),
('Sistema',5),
('Comercio',92);