<?php

namespace App\Rules;

class MaxLength
{
    protected int $maxLength;
    
    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
    }
    
    public function validate(string $value): bool
    {
        return strlen($value) <= $this->maxLength;
    }
    
    public function getErrorMessage(string $fname): string
    {
        return "A $fname deve ter no máximo {$this->maxLength} caracteres. seu arrombado";
    }
}
