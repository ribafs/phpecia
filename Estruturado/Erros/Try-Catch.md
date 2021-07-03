Tratamento de exceções

O PHP possui um modelo de exceções similar ao de outras linguagens de programação. Uma exceção pode ser lançada (throw) e capturada (catch). Código pode ser envolvido por um bloco try para facilitar a captura de exceções potenciais. Cada bloco try precisa ter ao menos um bloco catch ou finally correspondente.


catch

Múltiplos blocos catch podem ser utilizados para capturar exceções diferentes. A execução normal (quando nenhuma exceção é lançada dentro de um try) irão continuar a execução após o último catch definido em sequência. Exceções podem ser lançadas (ou relançadas) dentro um bloco catch.

Quando uma exceção é lançada o código seguinte não é executado, e o PHP tentará encontrar o primeiro bloco catch coincidente. Se uma exceção não for capturada, um erro PHP fatal será lançado com a mensagem "Uncaught Exception ..." na ausência de uma função definida com set_exception_handler().

A partir do PHP 7.1 um bloco catch pode especificar múltiplas exceções usando o caractere pipe (|). Isto é útil quando diferentes exceções de diferentes hierarquias de classes são tratadas da mesma forma.
finally

A partir do PHP 5.5, um bloco finally pode ser especificado após ou no lugar de blocos catch. Códigos dentro de finally sempre serão executados depois do try ou catch, independente se houve o lançamento de uma exceção, e antes que a execução normal continue.


O objeto lançado precisa ser uma instância da classe Exception ou uma subclasse de Exception. Tentar lançar um objeto sem essa ascendência resultará em um erro fatal.

Exception é a classe base para todas as exceções.

class Newsletter
{
    public function cadastrarEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception ('E-mail inválido', 1);
        }else{
            echo 'E-mailc adastrado com sucesso';
        }
    }
}

$nl = new Newsletter();
try {
    $nl->cadastrarEmail('riba@');
}catch(Exception $e){
    echo 'Mensagem; '.$e->getMessage();// code, file, message, line
    echo '<br>Código: '.$e->getCode();
    echo '<br>Arquivo: '.$e->getFile();
    echo '<br>Linha: '.$e->getLine();
}


<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Divisão por zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}

// Execução continua
echo "Olá mundo\n";
?>


<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Divisão por zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
} finally {
    echo "Primeiro finaly.\n";
}

try {
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
} finally {
    echo "Segundo finally.\n";
}

// Execução continua
echo "Olá mundo\n";
?>


try {
    throw new Exception('Hello world');
} catch (Exception $e) {
    echo 'Uh oh! ' . $e->getMessage();
} finally {
    echo " - I'm finished now - home time!";
}

		try {
			// prepare select query
			$query = "SELECT id, name, description, price, image FROM products WHERE id = ? LIMIT 0,1";
			$stmt = $con->prepare( $query );
		 
			// this is the first question mark
			$stmt->bindParam(1, $id);
		 
			// execute our query
			$stmt->execute();
		 
			// store retrieved row to a variable
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		 
			// values to fill up our form
			$name = $row['name'];
			$description = $row['description'];
			$price = $row['price'];
			$image = $row['image'];
		}
		 
		// show error
		catch(PDOException $exception){
			die('ERROR: ' . $exception->getMessage());
		}
