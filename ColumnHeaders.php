<?php

class ColumnHeaders
{
    protected ?string $headerOne = null;
    protected ?string $headerTwo = null;
    protected ?string $headerThree = null;


    public function __construct(?string $headerOne, ?string $headerTwo, ?string $headerThree)
    {
        $this->headerOne = $headerOne;
        $this->headerTwo = $headerTwo;
        $this->headerThree = $headerThree;
    }

    /**
     * @return string|null
     */
    public function getHeaderOne(): ?string
    {
        return $this->headerOne;
    }

    /**
     * @return string|null
     */
    public function getHeaderThree(): ?string
    {
        return $this->headerThree;
    }

    /**
     * @return string|null
     */
    public function getHeaderTwo(): ?string
    {
        return $this->headerTwo;
    }

}