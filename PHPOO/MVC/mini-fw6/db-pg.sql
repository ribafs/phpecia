CREATE TABLE customers (
  id serial primary key,
  name varchar(55) NOT NULL,
  email varchar(55) NOT NULL,
  birthday date NOT NULL
);

INSERT INTO customers (id, name, email, birthday) VALUES
(1,	'Maeve Streich II',	'beahan.edd@huels.com',	'1972-08-21'),
(2,	'Roosevelt Berge Sr.',	'moen.scottie@hotmail.com',	'1978-08-08'),
(3,	'Emmy Bins',	'berge.jess@price.com',	'1979-02-05'),
(4,	'Carson Harber',	'zsipes@greenholt.com',	'2019-05-16'),
(5,	'Dr. Alphonso Rau III',	'margret.hansen@yahoo.com',	'1973-06-05'),
(6,	'Mrs. Willa Schneider',	'ylowe@yahoo.com',	'1999-07-26'),
(7,	'Prof. Alexane Cormier PhD',	'brannon13@gmail.com',	'2008-11-07'),
(8,	'Iva Lockman',	'oconnell.harold@mann.org',	'1984-12-17'),
(9,	'Nathen Mitchell',	'jennyfer.towne@stroman.com',	'1997-12-07'),
(10,	'Mrs. Crystel Ledner',	'karley.hyatt@raynor.biz',	'2007-05-28'),
(11,	'Enola Parker MD',	'anderson.margarette@tromp.net',	'1996-09-10'),
(12,	'Ernestine Hill',	'ycronin@gmail.com',	'1977-12-25'),
(13,	'Helena Reichel',	'aletha.beier@gmail.com',	'1975-06-02'),
(14,	'Efrain Block',	'fay.lynch@hotmail.com',	'1971-11-22'),
(15,	'Prof. Forest Quitzon',	'olga.conn@gmail.com',	'2015-11-06'),
(16,	'Toney Breitenberg DDS',	'tatyana.purdy@yost.com',	'1982-02-06'),
(17,	'Mrs. Breanne Hegmann',	'blanca.hermiston@hotmail.com',	'2001-05-27'),
(18,	'Prof. Hadley Jacobs',	'bahringer.gideon@gmail.com',	'1974-02-16'),
(19,	'Dr. Louvenia Schulist',	'jody.hills@hotmail.com',	'2010-10-01'),
(20,	'Ardella Batz',	'verla45@miller.com',	'2001-09-27'),
(21,	'Eleanore Rice',	'hlangosh@gleichner.net',	'1979-06-12'),
(22,	'Dr. Hubert Kihn',	'harris.dean@gmail.com',	'1997-12-25'),
(23,	'Enos Ruecker III',	'chris86@marquardt.biz',	'1979-12-30'),
(24,	'Miss Maymie Dickinson',	'vwill@davis.org',	'1970-04-27'),
(25,	'Leslie Steuber IV',	'quitzon.berneice@jones.com',	'2013-06-07'),
(26,	'Zackary Rath',	'anne38@gmail.com',	'2015-02-10'),
(27,	'Gage Lesch',	'rolfson.adrien@hotmail.com',	'1983-06-03'),
(28,	'Prof. Henderson Luettgen',	'green.noemy@hotmail.com',	'2001-02-15'),
(29,	'Ms. Josephine Lemke DDS',	'naomi38@yahoo.com',	'2010-05-02'),
(30,	'Aileen Kulas',	'abigayle.glover@halvorson.com',	'2018-08-01'),
(31,	'Miss Noelia Breitenberg',	'felicita.quigley@yahoo.com',	'1970-11-27'),
(32,	'Prof. Winona Muller IV',	'theo16@terry.com',	'1974-07-16'),
(33,	'Ismael Olson',	'daren72@white.com',	'1994-07-12'),
(34,	'Rosendo Bailey',	'konopelski.caden@nicolas.com',	'1988-10-18'),
(35,	'Herta Schuster',	'miller.lionel@crist.com',	'2006-03-27'),
(36,	'Abagail Langworth',	'bhudson@yahoo.com',	'1985-11-08'),
(37,	'Rubye Kub',	'elvera62@eichmann.org',	'1973-02-23'),
(38,	'Candace McDermott',	'gonzalo36@friesen.com',	'1971-03-06'),
(39,	'Leonardo Schaden',	'bradley.wintheiser@rice.com',	'2004-08-21'),
(40,	'Lane Cole',	'mschultz@paucek.net',	'2015-09-15'),
(41,	'Deron Gutmann I',	'maggio.eddie@dibbert.com',	'2012-11-19'),
(42,	'Rolando Kunde',	'homenick.gudrun@yahoo.com',	'1988-06-11'),
(43,	'Prof. Perry Predovic',	'lshanahan@schultz.net',	'1970-08-05'),
(44,	'Dangelo Hoppe Jr.',	'crona.burdette@yahoo.com',	'1974-12-12'),
(45,	'Isadore Hauck II',	'orunolfsdottir@mertz.com',	'1977-10-23'),
(46,	'Hillary Braun III',	'spinka.emmitt@hotmail.com',	'2017-12-09'),
(47,	'Colton Abernathy',	'jeanie.ernser@bahringer.info',	'2003-06-12'),
(48,	'Marlin Bahringer',	'zromaguera@tromp.com',	'2005-05-12'),
(49,	'Viva Gleason',	'paucek.trenton@hahn.biz',	'1984-05-26'),
(50,	'Katharina McKenzie II',	'xdenesik@senger.org',	'1983-03-07');

CREATE TABLE products (
  id serial primary key,
  description varchar(50) NOT NULL,
  unity varchar(5) NOT NULL,
  date date DEFAULT NULL
);

INSERT INTO products (id, description, unity, date) VALUES
(1,	'Constance Doyle',	'W3',	'1989-01-21'),
(2,	'Prof. Marcia Rogahn',	'N3',	'2001-07-11'),
(3,	'Nyah Botsford',	'G3',	'1970-07-04'),
(4,	'Gilbert Kemmer',	'L3',	'1981-02-21'),
(5,	'Annamae Carroll',	'S3',	'1991-10-27'),
(6,	'Mrs. Audra Botsford',	'F3',	'1981-09-12'),
(7,	'Norris Nikolaus',	'J3',	'1981-11-28'),
(8,	'Mr. Zander Crist V',	'P3',	'1986-04-23'),
(9,	'Cheyanne Lowe',	'Y3',	'2007-03-11'),
(10,	'Sid Jacobi',	'T3',	'1985-02-18'),
(11,	'Nikki Hudson IV',	'W3',	'1970-05-22'),
(12,	'Neoma Bahringer',	'U3',	'1971-12-09'),
(13,	'Ms. Ines Ryan',	'L3',	'1996-04-17'),
(14,	'Prof. Citlalli Fadel DVM',	'E3',	'1993-09-02'),
(15,	'Eriberto Lakin',	'D3',	'1971-11-06'),
(16,	'Ms. Marlen Brakus',	'L3',	'2016-10-25'),
(17,	'Kenna Kilback',	'Y3',	'1985-01-31'),
(18,	'Diego Brown',	'V3',	'1982-12-13'),
(19,	'Lambert Harris',	'U3',	'1994-01-12'),
(20,	'Kaitlin Jacobi',	'E3',	'1981-12-08'),
(21,	'Mateo Walsh',	'T3',	'1984-06-06'),
(22,	'Lonnie Sanford',	'N3',	'2006-04-20'),
(23,	'Mr. Geovany Feeney',	'M3',	'2008-06-21'),
(24,	'Roy Swaniawski',	'I3',	'1994-02-28'),
(25,	'Mr. Hazle Wilkinson',	'Y3',	'1999-07-04'),
(26,	'Krystel Cartwright',	'X3',	'1985-11-15'),
(27,	'Ms. Daisha Lueilwitz DVM',	'R3',	'1988-08-15'),
(28,	'Lauren Willms DVM',	'R3',	'2015-07-10'),
(29,	'Myrtice Spencer',	'L3',	'2006-12-20'),
(30,	'Rodger Berge',	'W3',	'1993-11-13'),
(31,	'Danielle Heathcote',	'L3',	'1986-04-17'),
(32,	'Cristal Bergnaum DDS',	'H3',	'1993-03-04'),
(33,	'Jayme McLaughlin',	'Y3',	'1972-12-18'),
(34,	'Susan Hoppe',	'K3',	'1971-05-09'),
(35,	'Coy Herman IV',	'G3',	'1983-11-29'),
(36,	'Aurelia Homenick',	'E3',	'1973-02-07'),
(37,	'Ms. Lauryn Swaniawski',	'U3',	'1985-04-07'),
(38,	'Miss Nona Berge II',	'M3',	'2005-10-08'),
(39,	'Jonas Fisher',	'C3',	'1989-09-06'),
(40,	'Kurtis Jerde V',	'Z3',	'2011-07-23'),
(41,	'Ms. Paula Greenholt DDS',	'Q3',	'1989-03-29'),
(42,	'Malcolm Rempel',	'Y3',	'2000-04-21'),
(43,	'Prof. Makenna Maggio',	'C3',	'1982-05-23'),
(44,	'Lizzie Wolf',	'M3',	'2012-10-22'),
(45,	'Cletus Grant',	'N3',	'2011-11-23'),
(46,	'Suzanne Bernhard',	'T3',	'1977-12-12'),
(47,	'Myrtis Jast',	'L3',	'2010-05-30'),
(48,	'Osborne Paucek',	'H3',	'1979-02-06'),
(49,	'Mr. Pierre Hackett',	'T3',	'1982-04-06'),
(50,	'Miss Rachelle Kiehn DVM',	'G3',	'1985-06-20');

-- 2019-08-30 11:30:15
