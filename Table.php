<?php

class Table
{

    private array $rows = [];
    protected array $columnHeaders = [];





    public function setRows(Row $row): void
    {
        $this->rows [] = $row;


    }

    public function formatData (array $row){
        for ($i = 0, $count = count($row); $i < $count; $i++){
            if (str_contains($row[$i], ";")){
                $newData = explode(";", $row[$i]);
                $row[$i] = $newData;
            }
        }
    }

    public function setColumnHeaders(array $headers): void
    {
        $this->columnHeaders = $headers;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function getColumnHeaders(): array
    {
        return $this->columnHeaders;
    }

    public function entriesCount(): int{
        return count($this->rows);
    }

    public function longestArrayInColumn(int $columnKey): int {
        $length = 0;
        foreach ($this->rows as $row){
            if(is_array($row->getRow()[$columnKey])){
                $elementLength = count($row->getRow()[$columnKey]);
                if ($length < $elementLength){
                    $length = $elementLength;
                }
            }
        }
        return $length;
    }

    public function countSpecial (string $columnName): array {
        [$key] = array_keys($this->getColumnHeaders(), $columnName);
        $uniqueValues = $this->groupSpecialUnique($key);
        $length = count($uniqueValues);
        $count = [];
        for ($i = 0; $i < $length; $i++) {
            $count[] = [];
            foreach ($uniqueValues[$i] as $value){
                $count[$i][$value] = 0;
                foreach ($this->rows as $row){
                    if (is_array($row->getRow()[$key])){
                        $causes = $row->getRow()[$key];
                        $dataCount = count($causes);
                        for ($c = 0; $c < $dataCount; $c++){
                            if ($causes[$c] === $value){
                                $count[$c][$value]++;
                            }
                        }
                    }
                }
            }
        }


        return $count;
    }

    public function groupSpecialUnique (int $columnKey): array {
        $loops = $this->longestArrayInColumn($columnKey);
        $unique = [];
        for ($i = 0; $i < $loops; $i++) {
            $unique[] = [];
        }
        foreach ($this->rows as $row){
            $causes = $row->getRow()[$columnKey];

            if (is_array($causes)){
                $length = count($causes);
                for($ix = 0; $ix < $length; $ix++){
                    if (!in_array($causes[$ix], $unique[$ix]) && !empty($causes[$ix])){
                        $unique[$ix][] = $causes[$ix];
                    }
                }
            }
        }

        return $unique;
    }
    public function groupBasicUnique(int $columnKey): array{
        $unique = [];
        foreach ($this->rows as $row){
            $cause = $row->getRow()[$columnKey];
                if (!in_array($cause, $unique) && !empty($cause)){
                    $unique[] = $cause;
                }
        }
        return $unique;
    }

    public function countBasicUniqueCauses(string $column): array {
        $count = [];
        [$key] = array_keys($this->getColumnHeaders(), $column);
        $uniqueValues = $this->groupBasicUnique($key);

        foreach ($uniqueValues as $value){
            $count[$value] = 0;
            foreach ($this->getRows() as $row){
                $main = $row->getRow()[$key];
                    if ($main === $value){
                        $count[$value]++;
                    }
                }
            }

        return $count;
    }

}