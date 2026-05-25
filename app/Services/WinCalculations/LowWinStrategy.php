<?php

namespace App\Services\WinCalculations;

class LowWinStrategy implements WinCalculationStrategy
{
    public function calculate(int $number): float
    {
        return $number * 0.3;
    }
}
