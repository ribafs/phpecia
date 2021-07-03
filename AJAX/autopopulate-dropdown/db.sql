CREATE TABLE `cities` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `state` int(11) NOT NULL
);

INSERT INTO `cities` (`id`, `name`, `state`) VALUES
(1, 'Indore', 1),
(2, 'Bhopal', 1),
(3, 'Gwalior', 1),
(4, 'Mumbai', 2),
(5, 'Pune', 2),
(6, 'Nagpur', 2),
(7, 'Jaipur', 3),
(8, 'Jodhpur', 3),
(9, 'Kota', 3),
(10, 'Aruppola', 4),
(11, 'Dambulla', 4),
(12, 'Kandy', 5),
(13, 'Nuwara Eliya', 5),
(14, 'Batticaloa', 6),
(15, 'Albany', 7),
(16, 'Algies Bay', 7),
(17, 'Addington', 8),
(18, 'Akaroa', 8),
(19, 'Christchurch', 8),
(20, 'Gisborne', 9),
(21, 'Kaharoa', 9),
(22, 'Linwood', 9),
(23, 'Acequias', 10),
(24, 'Alamedilla', 10),
(25, 'Cabo De Gata', 10),
(26, 'Adeje', 11),
(27, 'Buzanada', 11),
(28, 'El Paso', 11),
(29, 'La Oliva', 11),
(30, 'Alalpardo', 12),
(31, 'Belmonte De Tajo', 12),
(32, 'Guadarrama', 12),
(33, 'Ban Khlong Prawet', 13),
(34, 'Saphan Sung', 13),
(35, 'Wang Thonglang', 13),
(36, 'Ban Don Rak', 14),
(37, 'Phanom Thuan', 14),
(38, 'Rang', 14),
(39, 'Fortaleza', 15),
(40, 'Boa viagem', 15),
(41, 'Quixadá', 15),
(42, 'São Paulo', 16),
(43, 'Santos', 16);

CREATE TABLE `states` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `states` (`id`, `name`, `country`) VALUES
(1, 'Madhya Pradesh', 1),
(2, 'Maharashtra', 1),
(3, 'Rajasthan', 1),
(4, 'Central', 2),
(5, 'Central Province', 2),
(6, 'Eastern Province', 2),
(7, 'Auckland', 3),
(8, 'Canterbury', 3),
(9, 'Gisborne', 3),
(10, 'Andalucia', 4),
(11, 'Canary Islands', 4),
(12, 'Madrid', 4),
(13, 'Bangkok', 5),
(14, 'Kanchanaburi', 5),
(15, 'Ceará', 6),
(16, 'São Paulo', 6);


CREATE TABLE `countries` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(80) NOT NULL
);

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'India'),
(2, 'Sri Lanka'),
(3, 'New Zealand'),
(4, 'Spain'),
(5, 'Thailand'),
(6, 'Brazil');


