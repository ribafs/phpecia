<?php

// Require autoload.php from koolreport library
require_once "../koolreport/core/autoload.php";

//Specify some data processes that will be used to process
use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;
use \koolreport\processes\Custom;

//Define the class
class SalesByCustomer extends \koolreport\KoolReport
{
    use \koolreport\clients\Bootstrap;

    function settings()
    {
        // Configuração do banco
        return array(
            "dataSources"=>array(
                "sales_order"=>array(
                    "connectionString"=>"mysql:host=localhost;dbname=orders",
                    "username"=>"root",
                    "password"=>"",
                    "charset"=>"utf8"
                ),
            )
        ); 
    }
 
    protected function setup()
    {
        // Configuração do relatório. Campos: color - horizontal, value - vertical
        $this->src('sales_order')
        ->query("SELECT customer_name,dollar_sales FROM sales")
/*        ->pipe(new Custom(function($row){
            $row["curtomer_name"] = strtolower($row["curtomer_name"]);
            return $row;
        }))*/
        ->pipe(new Group(array(
            "by"=>"customer_name",
            "sum"=>"dollar_sales"
        )))
        ->pipe(new Sort(array(
            "dollar_sales"=>"desc"
        )))
        ->pipe(new Limit(array(10)))
        ->pipe($this->dataStore('sales_by_customer'));
    }
}
