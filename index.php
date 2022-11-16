<?php

ini_set("auto_detect_line_endings", true);
require_once "Table.php";
require_once "Row.php";
require_once "CsvStart.php";
const FILE = "vtmec-causes-of-death.csv";

function displayCompoundData(array $count){
    $length = count($count);
    for ($i = 0; $i < $length; $i++){
        if ($i > 0){
            echo "Of those: " . PHP_EOL;
        } else {
            echo "Galvenā klasifikācija: " . PHP_EOL;
        }

        foreach ($count[$i] as $key => $value){
                echo $key .":" . $value . PHP_EOL;
        }
    }
}

function displayTable (Table $table){
        echo implode("  ", $table->getColumnHeaders());
        for ($i = 1, $count = count($table->getRows()); $i < $count; $i++){
            $row = $table->getRows()[$i];
            foreach ($row->getRow() as $value){
                if (is_array($value)){
                    echo implode(";", $value) . " ";
                } else {
                    echo $value . " ";
                }
            }
        }
}


$table = new Table();

$csvConfig = new CsvStart();

$csvConfig->csvToObject($table, FILE);



//$table->setColumnHeaders($table->getRows()[0]);



foreach ($table->countBasicUniqueCauses("naves_celonis") as $key => $count){
    echo $key . ": " . $count . PHP_EOL;
}
[$key] = array_keys($table->getColumnHeaders(), "vardarbigas_naves_lietas_apstakli");
$test = $table->groupSpecialUnique($key);


displayCompoundData($table->countSpecial("vardarbigas_naves_lietas_apstakli"));

//displayTable($table);



//unset($key);
//unset($count);
//foreach ($table->countUniqueCauses("vardarbigas_naves_lietas_apstakli") as $key => $count){
//    echo $key . ": " . $count . PHP_EOL;
//}
//var_dump($table->getRows()[1]->getColumnHeaders());

//$parent = new ColumnHeaders($table[0], $table[0], $headers[0]);

//echo $table[0]->getDate() . " " . $table[0]->getReason() . PHP_EOL;
//echo $table[1]->getDate() . " " . $table[1]->getReason() . PHP_EOL;




