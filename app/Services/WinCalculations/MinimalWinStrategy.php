<?php

namespace App\Services\WinCalculations;

class MinimalWinStrategy implements WinCalculationStrategy
{
    public function calculate(int $number): float
    {
        return $number * 0.1;
    }
}
