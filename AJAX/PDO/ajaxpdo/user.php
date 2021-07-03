<?php

define('HOST', '127.0.0.1');
define('DB_NAME','ajax');
define('PORT', '3306');
define('USER','root');
define('PASS','mysql');

$dsn = 'mysql:host='.HOST.'; port='.PORT.'; dbname='.DB_NAME;

try {
$bd = new PDO($dsn, USER, PASS);
//  $bd->setAttribute(PDO::ATT_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print $e->getMessage;
    exit();
}
print 'RRR';exit;
if(isset($_POST['submit'])){

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $criado_em = $_POST['criado_em'];

    $sql =  'INSERT INTO produto(id, nome, tipo, criado_em) ';
    $sql .= ' VALUES (NULL, :nome, :tipo, NOW())';

    try {
        $query = $bd->prepare($sql);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $query->bindValue(':criado_em', $criado_em, PDO::PARAM_STR);

        if($query->execute()){
            echo "Dados inseridos com sucesso";
        }else{
            echo "Falha na inserção de dados";
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
    die();
}
