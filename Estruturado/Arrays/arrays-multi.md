## Arrays em PHP

Arrays são como tabelas, com linhas e colunas. Mesmo que tenha apenas uma única linha, tem a linha e as colunas desta linha.

## Arrays unidimensionais
```php
$arr = array(1,3,5,7,9,11); // Este array tem apenas uma única dimensão, unidimensional.
```
Os elementos do array, cada um tem uma chave e um valor. Neste caso não vemos as chaves, mas elas existem e seus valores são 0,1,2,3,4,5. É como se este array fosse assim: 
```php
array(0 => 1, 1 => 3, 2 => 5, 3 => 7, 4 => 9, 5 => 11);
Chaves/keys - 0,1,2,3,4,5
Valores/values: 1,3,5,7,9,11
```
As chaves podem estar implícitas ou explícitas. No caso abaixo explícitas.
```php
$ufs = array('AM' => 'Amazonas', 'BA' => 'Bahia', 'CE' => 'Ceará');
```
Neste caso as chaves são as siglas dos estados e os valores são os nomes dos estados.

## Arrays bidimensionais
```php
<?php 
$estados = array
(
    "amazonas" => array
    (
        "capital" => "Manaus",
    ),
    "ceará" => array
    (
        "capital" => "Fortaleza",
    )                         
);

echo $estados["amazonas"]["capital"];


for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
}

$film=array(

                "comedy" => array(

                                0 => "Pink Panther",

                                1 => "john English",

                                2 => "See no evil hear no evil"

                                ),

                "action" => array (

                                0 => "Die Hard",

                                1 => "Expendables"

                                ),

                "epic" => array (

                                0 => "The Lord of the rings"

                                ),

                "Romance" => array

                                (

                                0 => "Romeo and Juliet"

                                )

);
echo $film["comedy"][0];

$marks = array( 
   "mohammad" => array (
      "physics" => 35,
      "maths" => 30,   
      "chemistry" => 39
   ),
   
   "qadir" => array (
      "physics" => 30,
      "maths" => 32,
      "chemistry" => 29
   ),
   
   "zara" => array (
      "physics" => 31,
      "maths" => 22,
      "chemistry" => 39
   )
);

/* Accessing multi-dimensional array values */
echo "Marks for mohammad in physics : " ;
echo $marks['mohammad']['physics'] . "<br />"; 

echo "Marks for qadir in maths : ";
echo $marks['qadir']['maths'] . "<br />"; 

echo "Marks for zara in chemistry : " ;
echo $marks['zara']['chemistry'] . "<br />"; 


// Defining a multidimensional array 
$favorites = array( 
    array( 
        "name" => "Dave Punk", 
        "mob" => "5689741523", 
        "email" => "davepunk@gmail.com", 
    ), 
    array( 
        "name" => "Monty Smith", 
        "mob" => "2584369721", 
        "email" => "montysmith@gmail.com", 
    ), 
    array( 
        "name" => "John Flinch", 
        "mob" => "9875147536", 
        "email" => "johnflinch@gmail.com", 
    ) 
); 
  
// Accessing elements 
echo "Dave Punk email-id is: " . $favorites[0]["email"], "\n"; 
echo "John Flinch mobile number is: " . $favorites[2]["mob"]; 


// Defining a multidimensional array 
$favorites = array( 
    "Dave Punk" => array( 
        "mob" => "5689741523", 
        "email" => "davepunk@gmail.com", 
    ), 
    "Dave Punk" => array( 
        "mob" => "2584369721", 
        "email" => "montysmith@gmail.com", 
    ), 
    "John Flinch" => array( 
        "mob" => "9875147536", 
        "email" => "johnflinch@gmail.com", 
    ) 
); 
  
// Using for and foreach in nested form 
$keys = array_keys($favorites); 
for($i = 0; $i < count($favorites); $i++) { 
    echo $keys[$i] . "\n"; 
    foreach($favorites[$keys[$i]] as $key => $value) { 
        echo $key . " : " . $value . "\n"; 
    } 
    echo "\n"; 
} 


/*Multidimentional array declaration using array() method*/
$employees = array(
"Jonny" => array("post" => "Sales Executive","email" =>"jonny@yahoo.com",
"phone" => "953456788"),
"Mac" => array("post" => "Manager","email" =>"mac@gmail.com",
"phone" => "900267748"),
"Gilmore" => array("post" => "Director","email" =>"gilmore@yahoo.com",
"phone" => "988777789"),
);
 
/*Reading multidimensional array using for loop */
foreach( $employees as $key=>$value ) {
    echo "<br/>";
    echo  "Employee Name:<b> $key </b><br/>";
    foreach( $value as $k=>$v ) {
        echo "$k: <b> $v </b><br/>";
    }
}
 
echo "<br/>";
 
/* Reading multi-dimensional array multiple indexes */
echo "The email address of <b> Jonny </b> is : " ;
echo $employees['Jonny']['email'] . "<br />";
 
echo "The phone number of <b> Mac </b> is : ";
echo $employees['Mac']['phone'] . "<br />";
 
echo "The designation of <b> Gilmore </b> is : " ;
echo $employees['Gilmore']['post'] . "<br />";
?>


/* 
    multidimensional array initialization
*/
$cars = array(
    array(
        "name"=>"Urus", 
        "type"=>"SUV", 
        "brand"=>"Lamborghini"
    ),
    array(
        "name"=>"Cayenne", 
        "type"=>"SUV", 
        "brand"=>"Porsche"
    ),
    array(
        "name"=>"Bentayga", 
        "type"=>"SUV", 
        "brand"=>"Bentley"
    ),
);

/* 
    Accessing multidimensional array
*/
echo "Accessing multidimensional array...";
echo "Urus is an ".$cars[0]["type"]." manufactured by ".$cars[0]["brand"]."\n";
echo "Bentayga is an ".$cars[2]["type"]." manufactured by ".$cars[2]["brand"]."\n";

$cars = array(
    array(
        "name"=>"Urus", 
        "type"=>"SUV", 
        "brand"=>"Lamborghini"
    ),
    array(
        "name"=>"Cayenne", 
        "type"=>"SUV", 
        "brand"=>"Porsche"
    ),
    array(
        "name"=>"Bentayga", 
        "type"=>"SUV", 
        "brand"=>"Bentley"
    ),
);

// array traversal
// find size of the array
$size = count($lamborghinis);

// using the for loop
for($i = 0; $i < $size; $i++)
{
    foreach($cars[$i] as $key => $value) {
        echo $key . " : " . $value . "\n";
    }
    echo "\n";
}


    2. $emp = array  
    3.   (  
    4.   array(1,"sonoo",400000),  
    5.   array(2,"john",500000),  
    6.   array(3,"rahul",300000)  
    7.   );  
    8.   
    9. for ($row = 0; $row < 3; $row++) {  
    10.   for ($col = 0; $col < 3; $col++) {  
    11.     echo $emp[$row][$col]."  ";  
    12.   }  
    13.   echo "<br/>";  
    14. }  


$arrs=array(
   array(1=>100, 2=>200, 3=>300),
   array(1=>'aa', 2=>'bb', 3=>'cc'),
);
foreach ($arrs as $arr){
   foreach ($arr as $i=>$j){
      echo $i . "->" .$j . " ";
   }
   echo "\n";
}
for ($row=0; $row < count($arrs); $row++){
   foreach ($arrs[$row] as $i=>$j){
      echo $i . "->" .$j . " ";
   }
   echo "\n";
}

$carsModel = array
  (
  array("Maruti",21,28),
  array("BMW",05,75),
  array("Tata",25,12),
  array("Land Rover",11,20)
  );
?>

$cars = array(array("Volvo", 22, 18), array("BMW", 15, 13), array("Saab", 5, 2), array("Land Rover", 17, 15));
$cars = array( //Same thing as above execept it is more readable
	array("Volvo", 22, 18),
	array("BMW", 15, 13),
	array("Saab", 5, 2),
	array("Land Rover", 17, 15)
);

echo $cars[0][0] . ", " . $cars[0][1]; //Outputs: Volvo, 22



$cars = [
	array("Volvo", 22, 18),
	array("BMW", 15, 13),
	array("Saab", 5, 2),
	array("Land Rover", 17, 15)
];


<?php 
$veiculos = array
(
     "carros"  => array
     (
          "marca"  => array
          (
                "ford" => array
                (
                     "1992" => 545,
                     "2006" => 845,
                     "2020" => 245,       
                 ),
                "toyota" => array
                 (
                      "1992" => 245,
                       "2006" => 745,
                       "2020" => 145,       
                 ),
                 "jeep" => array
                 (
                     "1992" => 445,
                     "2006" => 345,
                     "2020" => 545,       
                 ),
          ),
     ),
     "motos"  => array
     (
          "marca"  => array
          (
                "Yamaha" => array
                (
                     "1992" => 545,
                     "2006" => 845,
                     "2020" => 245,       
                 ),
                "Honda" => array
                 (
                      "1992" => 245,
                       "2006" => 745,
                       "2020" => 145,       
                 ),
                 "Suzuki" => array
                 (
                     "1992" => 445,
                     "2006" => 345,
                     "2020" => 545,       
                 ),
          ),
     ),
     "caminhões"  => array
     (
          "marca"  => array
          (
                "Ford" => array
                (
                     "1992" => 545,
                     "2006" => 845,
                     "2020" => 245,       
                 ),
                "Scania" => array
                 (
                      "1992" => 345,
                       "2006" => 745,
                       "2020" => 145,       
                 ),
                 "Wolkswagem" => array
                 (
                     "1992" => 445,
                     "2006" => 345,
                     "2020" => 545,       
                 ),
          ),
     ),

);
echo $veiculos["carros"]["marca"]["ford"]["1992"]."<br>";
echo $veiculos["motos"]["marca"]["Honda"]["1992"]."<br>";
echo $veiculos["caminhões"]["marca"]["Scania"]["1992"];

<?php 
$veiculos = 
[
     "carros"  => 
     [
          "marca"  =>
          [
                "ford" =>
                [
                     "1992" => 545,
                     "2006" => 845,
                     "2020" => 245,       
                ],
                "toyota" =>
                [
                      "1992" => 245,
                       "2006" => 745,
                       "2020" => 145,       
                 ],
                 "jeep" =>
                 [
                     "1992" => 445,
                     "2006" => 345,
                     "2020" => 545,       
                 ],
          ],
     ],
     "motos"  =>
     [
          "marca"  =>
          [
                "Yamaha" =>
                [
                     "1992" => 545,
                     "2006" => 845,
                     "2020" => 245,       
                 ],
                "Honda" =>
                 [
                      "1992" => 245,
                       "2006" => 745,
                       "2020" => 145,       
                 ],
                 "Suzuki" =>
                 [
                     "1992" => 445,
                     "2006" => 345,
                     "2020" => 545,       
                 ],
          ],
     ],
     "caminhões"  =>
     [
          "marca"  =>
          [
                "Ford" =>
                [
                     "1992" => 545,
                     "2006" => 845,
                     "2020" => 245,       
                 ],
                "Scania" =>
                 [
                      "1992" => 345,
                       "2006" => 745,
                       "2020" => 145,       
                 ],
                 "Wolkswagem" =>
                 [
                     "1992" => 445,
                     "2006" => 345,
                     "2020" => 545,       
                 ],
          ],
     ],
];
echo $veiculos["carros"]["marca"]["ford"]["1992"]."<br>";
echo $veiculos["motos"]["marca"]["Honda"]["1992"]."<br>";
echo $veiculos["caminhões"]["marca"]["Scania"]["1992"];

<?php 
// Veículos vendidos
// Array de 5 dimensões
$veiculos = 
[
     "carros"  => 
     [
          "marca"  =>
          [
                "ford" =>
                [
                     "1992" => 
                     [
                        "novos" => 245,
                        "usados" => 245,
                     ],
                     "2006" => 
                     [
                        "novos" => 145,
                        "usados" => 445,
                     ],
                     "2020" => 
                     [
                        "novos" => 645,
                        "usados" => 145,
                     ],
                ],
                "jeep" =>
                [
                     "1992" => 
                     [
                        "novos" => 45,
                        "usados" => 145,
                     ],
                     "2006" => 
                     [
                        "novos" => 345,
                        "usados" => 245,
                     ],
                     "2020" => 
                     [
                        "novos" => 345,
                        "usados" => 245,
                     ],
                ],
           ],
     ],
];
echo $veiculos["carros"]["marca"]["ford"]["1992"]["usados"]."<br>";
echo $veiculos["carros"]["marca"]["jeep"]["1992"]["novos"]."<br>";

<?php 
$veiculos = 
[
     "carros"  => 
     [
          "marca"  =>
          [
                "ford" =>
                [
                     "1992" => 
                     [
                        "1semestre" =>
                        [
                            "novos" => 145,
                            "usados" => 245
                        ],
                        "2semestre" =>
                        [
                            "novos" => 245,
                            "usados" => 645
                        ],
                     ],
                     "2006" => 
                     [
                        "1semestre" =>
                        [
                            "novos" => 145,
                            "usados" => 245
                        ],
                        "2semestre" =>
                        [
                            "novos" => 245,
                            "usados" => 645
                        ],
                     ],
                     "2021" => 
                     [
                        "1semestre" =>
                        [
                            "novos" => 145,
                            "usados" => 245
                        ],
                        "2semestre" =><?php 
$veiculos = 
[
     "carros"  => 
     [
          "marca"  =>
          [
                "ford" =>
                [
                     "1992" => 
                     [
                        "1semestre" =>
                        [
                            "meses" =>
                            [
                                "janeiro" => 145,
                                "fevereiro" => 245
                            ],
                        ],
                        "2semestre" =>
                        [
                            "meses" =>
                            [
                                "janeiro" => 145,
                                "fevereiro" => 245
                            ],
                        ],
                     ],
                     "2006" => 
                     [
                        "1semestre" =>
                        [
                            "meses" =>
                            [
                                "janeiro" => 145,
                                "fevereiro" => 245
                            ],
                        ],
                        "2semestre" =>
                        [
                            "meses" =>
                            [
                                "janeiro" => 145,
                                "fevereiro" => 245
                            ],
                        ],
                     ],
                     "2021" => 
                     [
                        "1semestre" =>
                        [
                            "meses" =>
                            [
                                "janeiro" => 145,
                                "fevereiro" => 245
                            ],
                        ],
                        "2semestre" =>
                        [
                            "meses" =>
                            [
                                "janeiro" => 145,
                                "fevereiro" => 245
                            ],
                        ],
                     ],
                ],
           ],
     ],
];
echo $veiculos["carros"]["marca"]["ford"]["2021"]["2semestre"]["meses"]["fevereiro"]."<br>";



                        [
                            "novos" => 245,
                            "usados" => 645
                        ],
                     ],
                ],
           ],
     ],
];
echo $veiculos["carros"]["marca"]["ford"]["1992"]["1semestre"]["usados"]."<br>";

```
