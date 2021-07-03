# Projeto

Elaborar um projeto sempre antes de iniciar a codificação é importante pois evita retrabalho. Imagina se você começa a codificar e lá pelo meio percebe que faltam alguns campos em carta tabela ou outro detalhe importante. Ou terá trabalho extra ou terá que abandonar o projeto e começar novamente. Evite isso fazendo um planejamento inicial para o seu projeto.

## Modelagem de Dados

Antes de colocar a mão na massa

Garanta que tenha entendido realmente o que precisa fazer

- criar um projeto do banco de dados (DER e mais detalhes)
- criar um projeto do aplicativo/site com diagramas/wireframe

Mantenha o propósito de criar um projeto simples, de forma que possa ser compreendido com facilidade futuramente

Torne On a exibição de erros durante a criação do projeto. Desligue os erros antes de enviar para o servidor

Mantenha-se atualizado sobre as tecnologias com que trabalha

Faça comentários no código e no banco sempre que julgar importantes

Se julgar importante escolha um e use um framework

Use PHPOO e de preferência com MVC e boas práticas. Crie classes básicas que serão extendidas e tornarão menores as filhas


## Primary Key (Chave Primária)
É o campo de uma tabela criado para que as outras tabelas relacionadas se refiram a ela por este campo. Impede mais de um registro com valores iguais. É a combinação interna de UNIQUE e NOT NULL. 

Qualquer campo em outra tabela do banco pode se referir ao campo chave primária, desde que tenham o mesmo tipo de dados e tamanho da chave primária. 

Exemplo: 

clientes (codigo INTEGER, nome_cliente VARCHAR(60)) 

codigo nome_cliente 
- 1 PostgreSQL inc. 
- 2 RedHat inc. 

pedidos (relaciona-se à Clientes pelo campo cod_cliente) 

cod_pedido cod_cliente descricao

Caso tentemos cadastrar um pedido com cod_cliente 2 ele será aceito. 

Mas caso tentemos cadastrar um pedido com cod_cliente 3 ele será recusado pelo banco. 

Criando uma Chave Primária 

Deve ser criada quando da criação da tabela, para garantir valores exclusivos no campo. 

CREATE TABLE clientes(cod_cliente BIGINT, nome_cliente VARCHAR(60) 

PRIMARY KEY (cod_cliente)); 

## Criando uma Chave Estrangeira (Foreign Keys) 

É o campo de uma tabela que se refere ao campo Primary Key de outra. 

O campo pedidos.cod_cliente refere-se ao campo clientes.codigo, então pedidos.cod_cliente é uma chave estrangeira, que é o campo que liga esta tabela a uma outra.
```sql
CREATE TABLE pedidos( 
cod_pedido BIGINT, 
cod_cliente BIGINT REFERENCES clientes, 
descricao VARCHAR(60) 
); 
```
Outro exemplo: 
```sql
FOREIGN KEY (campoa, campob) 
REFERENCES tabela1 (campoa, campob) 
ON UPDATE CASCADE 
ON DELETE CASCADE); 
```
Cuidado com exclusão em cascata. Somente utilize com certeza do que faz. 

Dica: Caso desejemos fazer o relacionamento com um campo que não seja a chave primária, devemos passar este campo entre parênteses após o nome da tabela e o mesmo deve obrigatoriamente ser UNIQUE. 
```sql
... 
cod_cliente BIGINT REFERENCES clientes(nomecampo), 
... 
```
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

