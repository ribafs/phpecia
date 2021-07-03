Active Record - (AR) é um padrão de projeto que trabalha com a técnica ORM (Object Relational Mapper). Este padrão consiste em mapear um objeto a uma tabela do Banco da dados, a fim de tornar o trabalho com os dados persistido em um banco de dados, totalmente orientado a objetos. Alguns explicam isso como sendo relacionar um objeto Modelo (Na sua aplicação) com um objeto relacional (No banco de dados).

Normalmente, uma classe ORM, contém no mínimo as operações de “CRUD”: Criar (Insert), Ler (Select), Atualizar(Update) e Excluir(Delete). 

Gastamos 90% do nosso tempo escrevendo instruções SQL para efetuar as operações de CRUD (create (criar), read (ler), update (atualizar) e delete (excluir)). Além disso, nosso código é mais difícil de manter quando temos instruções SQL misturadas com ele. Para resolver esses problemas, podemos utilizar Active Record (Registro Ativo).

Cada classe AR representa uma tabela (ou uma view) do banco de dados, cujos campos são representados por propriedades na classe AR. Uma instância de uma AR representa um único registro de uma tabela. As operações de CRUD são implementadas como métodos na classe AR. Como resultado, podemos acessar nossos dados de uma maneira orientada a objetos.

Exemplo: inserir registro na tabela posts:

$post=new Posts();
$post->title='post de exemplo';
$post->content='conteúdo do post';
$post->save();

Nota: A intenção do AR não é resolver todas tarefas relacionadas a banco de dados. Ele é melhor utilizado para modelar tabelas do banco para estruturas no PHP e executar consultas que não envolvem instruções SQL complexas. No caso do framework Yii, o seu DAO é o recomendado para esses cenários mais complexos.


