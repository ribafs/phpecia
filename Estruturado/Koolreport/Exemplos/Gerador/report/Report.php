<?php
require_once dirname(__FILE__)."/../vendor/autoload.php";

use \koolreport\KoolReport;
use \koolreport\processes\Filter;
use \koolreport\processes\TimeBucket;
use \koolreport\processes\Group;
use \koolreport\processes\Limit;

class Report extends KoolReport
{
    function settings()
    {
        // Configuração do banco
        return array(
            "dataSources"=>array(
                "data_src"=>array(
                    "connectionString"=>"pgsql:host=localhost;dbname=sakila;port=5432",
                    "username"=>"postgres",
                    "password"=>"postgres",
                    "charset"=>"utf8"
                ),
            )
        ); 
    }

    protected function setup()
    {
        // Configuração do relatório. Campos: date/mês - horizontal, value - vertical
        $this->src('data_src')
        ->query("SELECT payment_date,amount FROM payment")
        ->pipe(new TimeBucket(array(
            "payment_date"=>"month"
        )))
        ->pipe(new Group(array(
            "by"=>"payment_date",
            "sum"=>"amount"
        )))
        ->pipe($this->dataStore('data_store'));
    } 
}
