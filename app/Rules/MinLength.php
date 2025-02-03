<?php

namespace App\Rules;

class MinLength
{
    protected int $minLength;
    
    public function __construct(int $minLength)
    {
        $this->minLength = $minLength;
    }
    
    public function validate(string $value): bool
    {
        return strlen($value) >= $this->minLength;
    }
    
    public function getErrorMessage(string $fname): string
    {
        return "A $fname deve ter pelo menos {$this->minLength} caracteres.";
    }
}
