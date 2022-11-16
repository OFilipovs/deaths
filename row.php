<?php

class Row extends Table
{
    private array $row;
    public function __construct(array $row)
    {
        $this->row = $this->formatData($row);
    }

    public function formatData (array $row): array{

        for ($i = 0, $count = count($row); $i < $count; $i++){
            if (strpos($row[$i], ";") !== false){
                $newData = explode(";", $row[$i]);
                if ($newData[0] === $newData[1]){
                    $newData[1] = "";
                }
                $row[$i] = $newData;

                }
            }
        return $row;
    }
    /**
     * @return array
     */

    public function getRow(): array
    {
        return $this->row;
    }
    /**
     * @return array
     */
    public function getCauses(): array
    {
        return $this->causes;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getCause(): string
    {
        return $this->cause;
    }

    /**
     * @param array $causes
     */
    public function setCauses(string $cause): void
    {
        $this->causes[] = $cause;
    }
}