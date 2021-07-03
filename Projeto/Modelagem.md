# Modelagem de dados para programadores

É muito importante saber como modelar os dados de bancos de dados, para deixar seu aplicativo mais eficiente e seguro.

## Convenção de nomes:
Para compatibilizar para os grandes frameworks
- Bancos, tabelas e campos - tudo em minúsculas e palavras compostas separadas por sublinhado
- Bancos no singular
- Tabelas no plural
- Campos relacionados - nome da tabela no singular mais id: group_id (sempre not null e do mesmo tipo que a PK da tabela primária)

## Modelagem
- Banco de dados
- Esquemas (no caso do PostgreSQL)
- Tabelas normalizadas
- Campos
- Tipos de dados
- Tamanho dos campos
- Constraints:
    - PK
    - FK
    - unique
    - not null
    - null
    - enum
    - ...

## Relacionamentos:
    - Um para vários
    - Um para um
    - Vários para vários

Um para vários - Na tabela primária o campo PK se relaciona com o campo FK da tabela secundária. Exemplo de fornecedores com compras. Cada fornecedor tem em seu nome várias compras e cada compra eprtence somente a um único fornecedor:

Primária

create table fornecedores(
	id int primary key auto_increment,
	cnpj char(20),
	nome char(45) not null,
	site varchar(50)
);

Secundária

create table compras(
	id int primary key auto_increment,
	data_atualizacao datetime not null,
	fornecedor_id int not null,
	constraint fornecedor_fk foreign key (fornecedor_id) references fornecedores(id)
);

Um para um - quando na tabela primária o campo PK se relaciona com o campo PK da tabela secundária. Exemplo: maridos e esposas. Oficialmente cada marido tem somente uma única esposa e cada esposa um único marido.

create table maridos(
	cpf_esposo varchar(11) primary key,
	nome char(20),
	email char(45) not null
);

create table esposas(
	cpf_esposa varchar(11) primary key,
	nome char(20),
	email char(45) not null,
	cpf_esposo varchar(11) not null,
    Constraint FK_Esposo foreign key (cpf_esposo) references maridos(cpf_esposo)
);

Vários para Vários - O relacionamento do tipo vários para vários é inviabilizado. Para resolvê-lo inserimos uma terceira tabela e a relacionamos com as duas existentes. Exemplos: estudantes e disciplinas. Cada estudante está matriculado em várias disciplinas e em cada disciplina tem vários alunos matriculados. A saída é adicionar uma terceira tabela, no caso a de matrículas e então relacionar estudantes com matrículas e disciplinas com matrículas. A chave primária de matrículas será uma chave composta pela PK de estudantes e pela PK de disciplinas.

create table estudantes(
	matricula varchar(11) primary key,
	nome char(20),
	email char(45) not null
);

create table matriculas(
	matricula varchar(11),
    cod_disciplina varchar(11)
    primary key(matricula, cod_disciplina)
);

create table disciplinas(
	cod_disciplina varchar(11) primary,
	nome char(20),
	creditos int
);


## Parâmetros Opcionais: 
ON UPDATE parametro e ON DELETE parametro. 

ON UPDATE paramentros: 

## NO ACTION (RESTRICT) 
Quando o campo chave primária está para ser atualizado a atualização é abortada caso um registro em uma tabela referenciada tenha um valor mais antigo. Este parâmetro é o default quando esta cláusula não recebe nenhum parâmetro. 

Exemplo: ERRO Ao tentar usar:
```sql
UPDATE clientes SET codigo = 5 WHERE codigo = 2. 
```
Ele vai tentar atualizar o código para 5 mas como em pedidos existem registros do cliente 2 haverá o erro. 

CASCADE (Em Cascata) - Quando o campo da chave primária é atualizado, registros na tabela referenciada são atualizados. 

Exemplo: Funciona: Ao tentar usar "UPDATE clientes SET codigo = 5 WHERE codigo = 2. 

Ele vai tentar atualizar o código para 5 e vai atualizar esta chave também na tabela pedidos.

SET NULL (atribuir NULL) - Quando um registro na chave primária é atualizado, todos os campos dos registros referenciados a este são setados para NULL. 

Exemplo: UPDATE clientes SET codigo = 9 WHERE codigo = 5; 

Na clientes o codigo vai para 5 e em pedidos, todos os campos cod_cliente com valor 5 serão setados para NULL. 
```sql
SET DEFAULT (assumir o Default) - Quando um registro na chave primária é atualizado, todos os campos nos registros relacionados são setados para seu valor DEFAULT. 
```
Exemplo: se o valor default do codigo de clientes é 999, então UPDATE clientes SET codigo = 10 WHERE codigo = 2. Após esta consulta o campo código com valor 2 em clientes vai para 999 e também todos os campos cod_cliente em pedidos. 

```sql
ON DELETE parametros: 
```
NO ACTION (RESTRICT) - Quando um campo de chave primária está para ser deletado, a exclusão será abortada caso o valor de um registro na tabela referenciada seja mais velho. 

Este parâmetro é o default quando esta cláusula não recebe nenhum parâmetro. 

Exemplo: ERRO em DELETE FROM clientes WHERE codigo = 2. Não funcionará caso o cod_cliente em pedidos contenha um valor mais antigo que codigo em clientes. 

CASCADE - Quando um registro com a chave primária é excluído, todos os registros relacionados com aquela chave são excluídos. 

SET NULL - Quando um registro com a chave primária é excluído, os respectivos campos na tabela relacionada são setados para NULL. 

SET DEFAULT - Quando um registro com a chave primária é excluído, os campos respectivos da tabela relacionada são setados para seu valor DEFAULT. 

## Excluindo Tabelas Relacionadas 

Para excluir tabelas relacionadas, antes devemos excluir a tabela com chave estrangeira. 

```sql
PK  1 -----> N  FK 

Do lado 1 é exigida uma PK ou uma constraint UNIQUE. 

Lado 1 não permite nulos. 
Lado N permite nulos mas se existir a integridade garantida. 

PK (Chave Primária) - é formada internamente por UNIQUE e NOT NULL 
UNIQUE (Chave candidata) - permite nulos 
FK (Chave Estrangeira) - permite nulos, mas se um campo for nulo estará satisfeita a constrint em consequência em consequência violada a integridade. 
```
Recomendação: sempre usar NOT NULL nos campos da FK. 

## DER 
Cuidado com diagramas, use-os apenas para ajudar no processo do projeto, lembrando que um DER não faz todo o trabalho de modelagem e nem representa tudo de um modelo. 

Uma ótima ferramenta apra criar DER para MySQL, PostgreSQL e muitos outros:
https://dbvis.com

(CJ Date em seu livro: An Introduction To Database Systems)

## Modelo Relacional (MR) 
- Consiste de uma coleção de relações (tabelas no modelo físico), cada uma com um nome único (por esquema). 
- Cada relação é composta por atributos (campos, no modelo físico). 
- Cada atributo tem seu tipo ou domínio. 
- Temos também as constraints (restrições). Relacionamentos são formados por constraints. No caso chamado de integridade referencial. 
- Uma relação é formada por um conjunto de tuplas (registros no modelo físico). 
- No modelo relacional uma relação tanto representa os dados quanto as relações entre eles. 

NULOS - acarretam sérias dificuldades e devem ser evitados. 

## Normalizando Tabelas
- Atributos Multivalorados (telefones, municipio, uf, etc) indicam necessidade de criação de outra tabela. 
- A repetição de valores de atributos também deve ser evitada criando-se uma outra tabela. 
- A presença de nulos também é resolvida com a normalização e consequente criação de outras tabelas. 
- O modelo relacional foi fundamentado na teoria dos conjuntos e na lógica dos predicados. 

Se fosse buscar por inspiração no sentido mais exato, diria que era na crise de software: facilitar o desenvolvimento de grandes bases de dados usadas simultaneamente por muitos usuários. 

- Seus termos principais são: relações, atributos, restrições e tipos! 
- Relacionamento não é um termo técnico deste modelo, mas do MER, aqui temos as restrições de integridade referencial. 
- A linguagem SQL não é inteiramente relacional. SGBD relacionais restringem o modelo para usarem essa linguagem. 
Por isso mesmo não os chamo de SGBDRs, mas de SGBDs SQL.  Os SGBDRs que conheço são o IBM BS/12, o Ingres QUEL original, o Alphora Dataphor e outros atualmente em desenvolvimento, anteriormente listados. 
- É bom distinguir MR (modelo relacional) de MER (modelo entidade  relacionamento). Este último surgiu depois do relacional, mas a grande maioria dos SGBDs atuais implementam o modelo 
 relacional ou uma versão adaptada dele. 
(E-mail respondido na lista pgbr-geral, por Leandro Dutra)

