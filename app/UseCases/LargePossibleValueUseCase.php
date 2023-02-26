<?php

namespace App\UseCases;

use App\Exceptions\ValueCalculationException;

/**
 * This class find the large possible value by complying with the following
 * condition:
 *
 * - The maximum integer k such that 0 ≤ k ≤ n that k % x = y.
 */
final class LargePossibleValueUseCase
{
    /**
     * @throws ValueCalculationException
     */
    public function find(int $numberX, int $numberY, int $numberN): int
    {
        throw new ValueCalculationException('No values were found');
    }
}
