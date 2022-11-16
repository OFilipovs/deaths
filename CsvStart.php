<?php

class CsvStart
{
    private int $index = 0;


    public function csvToObject(Table $table, string $file){
        $counter = $this->index;
        if (($handle = fopen($file, "r")) !== false) {
            $table->setColumnHeaders(fgetcsv($handle));
            while (($row = fgetcsv($handle, 2000)) !== false) {

                $table->setRows(new Row($row));

                $counter++;
            }
            fclose($handle);
        }
    }
}