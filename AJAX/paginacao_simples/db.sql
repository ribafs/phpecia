CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14;

INSERT INTO `clientes` (`id`, `nome`, `email`, `cpf`) VALUES
(1, 'Jim Connor', 'jimconnor@yahoo.com', '12345678'),
(2, 'Taylor Fox', 'taylorfox@hotmail.com', '12345678'),
(3, 'Daniel Greyson', 'danielgreyson@hotmail.com', '12345678'),
(4, 'Julia Brown', 'juliabrown@gmail.com', '12345678'),
(5, 'Rose Harris', 'roseharris@gmail.com', '12345678'),
(6, 'Lilly Whites', 'lillywhites@outlook.com', '12345678'),
(7, 'Jennifer Winters', 'jennie.winters001@gmail.com', '12345678'),
(8, 'Michael Bruce', 'michaelbruce78@yahoo.com', '12345678'),
(9, 'John Alex', 'johnalex@example.com', '12345678'),
(10, 'Demi Milan', 'demimilan@gmail.com', '12345678'),
(11, 'Austin Joseph', 'austin.joseph.boston@gmail.com', '12345678'),
(12, 'Mark Higgins', 'mark.higgins21@yahoo.com', '12345678'),
(13, 'Sean Kennedy', 'seankennedy.boss@outlook.com', '12345678');
