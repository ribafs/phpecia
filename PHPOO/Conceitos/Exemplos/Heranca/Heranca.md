# Tirando proveito da orientação a objetos

## Herança - Para herdar de uma classe usamos a palavra reservada extends

Aclasse base é chamada de classe pai
A classe que herda é chamada de filha

Assim fazendo a classe filha herda tudo da classe pai tem, exceto o que for private

## Vejamos alguns exemplos:

Connection -> Model -> ClientesModel

- Model extends Connection
- Então Model pode usar métodos e propriedades de Connection

- ClientesModel extends Model
- Então ClientesConnection pode usar métodos e propriedades de Model
- Obs.: para que uma classe que extendeu outra possa usar métodos e/ou propriedades da classe pai, precisa que a classe pai os tenha definido como protected ou public
- O interessane é que Model pode usar os métodos de Model (todosRegs(), delete() e somaRegs()) sem precisar definir.

Veja como se ganhou com isso: o código foi dividido em 3 classes: Connection, Model e ClientesModel. Se não tivesse feito isso, usado herança, então precisariamos ter uma classe com o código das 3.

Veja os exemplos do diretório.


