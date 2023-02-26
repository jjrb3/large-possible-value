<?php

namespace App\UseCases;

/**
 * This class find the large possible value by complying with the following
 * condition:
 *
 * - The maximum integer k such that 0 ≤ k ≤ n that k % x = y.
 */
final class LargePossibleValueUseCase
{
    public function find(int $numberX, int $numberY, int $numberN): int
    {
        return 1;
    }
}
