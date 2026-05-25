<?php

namespace App\Services\WinCalculations;

class WinCalculationResolver
{
    public function resolve(int $number): WinCalculationStrategy
    {
        return match (true) {
            $number > 900 => new HighWinStrategy(),
            $number > 600 => new MediumWinStrategy(),
            $number > 300 => new LowWinStrategy(),
            default => new MinimalWinStrategy(),
        };
    }
}
