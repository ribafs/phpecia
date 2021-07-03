<?php
$host = 'localhost';
$user = 'postgres';
$pass = 'postgres';
$db = 'testes';

try {
    $con = new PDO("pgsql:host=".$host.";dbname=".$db, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
} catch (Exception $e) {
    echo $e->getMessage() . " dbCall Line 9";
    exit;
}

try {
        $sql = "select * from clientes";
        $result = $con->query($sql);

        $count = $result->rowCount();


        $array = [];
        while($row = $result->fetchAll(PDO::FETCH_ASSOC)){
            array_push($array, $row);
        }
foreach($array as $ar){
    $array = $ar;
}

//print_r($array);exit;
        $dataset = [
            "echo" => 1,
            "totalrecords" => $count,
            "totaldisplayrecords" => $count,
            "data" => $array
        ];

//        echo json_encode($dataset, JSON_UNESCAPED_SLASHES);
        echo json_encode($dataset);
   } catch (Exception $e) {
        echo $e->getMessage() . "Erro na linha ...";
        exit;
   }
?>
