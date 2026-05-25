<?php

namespace App\Services\WinCalculations;

interface WinCalculationStrategy
{
    public function calculate(int $number): float;
}
