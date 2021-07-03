CREATE TABLE produtos (
id INT NOT NULL AUTO_INCREMENT,
descricao VARCHAR(50) UNIQUE NOT NULL,
estoque_minimo INT NOT NULL, -- Ao vender, antes testar se existe quantidade suficiente, se existir vende, se não, alerta e cancela
estoque_maximo INT NOT NULL, -- Ao comprar, testar se é maior que este, se for cancela a compra, se não for aceita
PRIMARY KEY (id)
);

INSERT INTO `produtos` (`id`, `descricao`, `estoque_minimo`, `estoque_maximo`) VALUES
(1,	'Caneta BIC preta',	10,	100),
(2,	'Borracha branca',	5,	50),
(3,	'Impressora HP 440',	3,	15),
(4,	'Mouse USB Floris',	5,	20),
(5,	'Teclado Atlas 25',	3,	25),
(6,	'Caixas de som USB Tera',	5,	28),
(7,	'Computador Dell 500',	2,	15),
(8,	'Notebook Lenovo 8GB de RAM',	2,	15),
(9,	'Pendrive 8GB ScanDisk',	5,	30),
(10,	'Pendrive 16GB ScanDisk',	3,	30),
(11,	'Mouse USB Logitech',	3,	20);
	
CREATE TABLE compras (
id INT NOT NULL AUTO_INCREMENT,
produto_id INT NOT NULL,
quantidade INT NOT NULL,
valor_unitario DECIMAL(9,2) NOT NULL DEFAULT '0.00',
data_compra DATE NOT NULL,
PRIMARY KEY (id),
CONSTRAINT `compras_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE estoques (
id INT NOT NULL AUTO_INCREMENT,
produto_id INT NOT NULL,
quantidade INT NOT NULL,
valor_unitario DECIMAL(9,2) NOT NULL DEFAULT '0.00',
PRIMARY KEY (id),
CONSTRAINT `estoques_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE vendas (
id INT NOT NULL AUTO_INCREMENT,
produto_id INT NOT NULL,
quantidade INT NOT NULL,
data_venda DATE NOT NULL,
valor_unitario DECIMAL(9,2) NOT NULL DEFAULT '0.00',
PRIMARY KEY (id),
CONSTRAINT `vendas_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Crédito: https://www.devmedia.com.br/implementando-controle-de-estoque-no-mysql-com-triggers-e-procedures/26352
