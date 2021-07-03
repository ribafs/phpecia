Datas

$hoje = date('d/m/Y');
echo $hoje;

$agora = date('d/m/Y H:i');
echo $agora;



function date_br($date_en){
    $dateBR = implode( '/', array_reverse( explode( '-', $date_en ) ) );
     
    return $dateBR;
}

print date_br('2020-03-14');

Validação

    function validateDate($date, $format = 'Y-m-d'){
        $b = DateTime::createFromFormat($format, $date);
        return $b && $b->format($format) === $date;
    }

Usando

        if(!$this->validateDate($nascimento)){
		    header("location: index.php?msg=Esta data é inválida&color=red&data=$nascimento");  
            exit;
        }

Nome do mês pelo número

$monthNum = 4;
$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
print $monthName;

