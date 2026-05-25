<?php

namespace App\Services\WinCalculations;

class MediumWinStrategy implements WinCalculationStrategy
{
    public function calculate(int $number): float
    {
        return $number * 0.5;
    }
}
