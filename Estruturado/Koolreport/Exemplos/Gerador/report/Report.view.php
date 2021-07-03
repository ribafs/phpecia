<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\ColumnChart;
    use \koolreport\widgets\google\PieChart;
?>

<div class="report-content">
    <h1 class="text-center"><?php echo "<h2>Exemplo com PostgreSQL</h2>"; ?></h1>

    <?php
    PieChart::create(array(
        "dataStore"=>$this->dataStore('data_store'),  
        "columns"=>array(
            "payment_date"=>array(
                "label"=>"payment_date",
                "type"=>"datetime",
                "format"=>"Y-n",
                "displayFormat"=>"F, Y",
            ),
            "amount"=>array(
                "label"=>"amount",
                "type"=>"number",
                "prefix"=>"$",
            )
        ),
        "width"=>"100%",
    ));
    ?>

    <?php
        ColumnChart::create([
            "dataSource"=>$this->dataStore("data_store"),
            "columns"=>[
                "payment_date",
                "amount"=>[
                    "style"=>function($row) {
                        switch($row["payment_date"])
                        {
                            case "payment_date":
                                return "color: #00F";
                            case "payment_date":
                                return "color: #0F0";
                            case "payment_date":
                                return "color: #F00";
                        }
                    }
                ]
            ],
            "width"=>"100%",
        ]);
    ?>

    <?php
    Table::create(array(
        "dataStore"=>$this->dataStore('data_store'),
        "columns"=>array(
            "payment_date" => array(
                "label"=>"payment_date",
                "type"=>"datetime",
                "format"=>"Y-n",
                "displayFormat"=>"F, Y",
            ),
            "amount"=>array(
                "label"=>"amount",
                "type"=>"number",
                "prefix"=>"$",
            )
        ),
        "cssClass"=>array(
            "table"=>"table table-hover table-bordered"
        )
    ));
    ?>
</div>

<br>
<hr>
<h3>Título da descrição</h3>
<p>Corpo da descrição do relatório</p>
