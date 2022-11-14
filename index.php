<?php
ini_set("auto_detect_line_endings", true);
require_once "ColumnHeaders.php";
require_once "row.php";
$file = fopen("/Users/oskarsfilipovs/PhpstormProjects/PHP codelex/Death/vtmec-causes-of-death.csv", "r");


$table = [];
$line = 1;
$headers = fgetcsv($file);



if (($source = fopen("/Users/oskarsfilipovs/PhpstormProjects/PHP codelex/Death/vtmec-causes-of-death.csv", "r")) !== false) {


    while (($row = fgetcsv($source, 1000)) !== false) {
        if ($row[2] === "Nevardarbīga nāve"){
            $table[] = new Row($row[1], $row[2], row[3]);
        } elseif ($row[2] === "Vardarbīga nāve"){
            $table[] = new Row($row[1], $row[2], row[5]);
        } else {
            $table[] = new Row($row[1], $row[2]);
        }


        $line++;
    }
    fclose($source);
}

//$parent = new ColumnHeaders($table[0], $table[0], $headers[0]);

echo $table[0]->getDate() . " " . $table[0]->getReason() . PHP_EOL;
echo $table[1]->getDate() . " " . $table[1]->getReason() . PHP_EOL;

foreach ($row as $death){
    if ($death->getReason() === "Nevardarbīga nāve"){
        echo $death->getReason() . " " . $death->getCauses() . PHP_EOL;
    }
}


