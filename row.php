<?php

class Row extends ColumnHeaders
{
    private string $date;
    private string $reason;
    private string $cause;
    private array $causes = [];
    public function __construct(string $date, string $reason, string $cause = "")
    {
        $this->date = $date;
        $this->reason = $reason;
        $this->cause = $cause;
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