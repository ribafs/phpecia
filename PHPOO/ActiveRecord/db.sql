create table cliente (
    id int auto_increment primary key,
    nome varchar(80) not null,
    endereco varchar(50),
    telefone varchar(20),
    created_at datetime,
    updated_at datetime
);

create table produto (
    id int auto_increment primary key,
    nome varchar(80) not null,
    unidade varchar(4),
    preco decimal(6.2)
);

