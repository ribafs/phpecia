CREATE TABLE lotes (
  id serial primary key,
  irrigante varchar(50) NOT NULL,
  data date NOT NULL,
  valor decimal (8,2) NOT NULL
);

INSERT INTO lotes (id, irrigante, data, valor) VALUES
(1,	'João Brito',	'2020-05-25',	'34100.00'),
(2,	'Pedro Silva',	'2020-05-28',	'65150.00'),
(3,	'Manoel Brito',	'2020-06-15',	'32160.00'),
(4,	'Antônio Granja',	'2020-06-15',	'23100.00'),
(5,	'Roberto Alencar',	'2020-06-15',	'17150.00'),
(6,	'Aquiraz Brito',	'2020-07-16',	'45550.00'),
(7,	'Roberval Taylor',	'2020-07-18',	'34520.50'),
(8,	'Maria Tereza',	'2020-07-18',	'23100.00'),
(9,	'Jorgina Queiroz',	'2020-07-21',	'45400.00');
