<?php

namespace App\Services\WinCalculations;

class HighWinStrategy implements WinCalculationStrategy
{
    public function calculate(int $number): float
    {
        return $number * 0.7;
    }
}
