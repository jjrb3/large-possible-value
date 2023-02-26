<?php

namespace Tests\Unit\app\UseCases;

use App\Exceptions\ValueCalculationException;
use App\UseCases\LargePossibleValueUseCase;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\TestCase;
use Throwable;

class LargePossibleValueUseCaseTest extends TestCase
{
    private const STRING_ARG_FOR_NUMBER_X = 'Example';

    private LargePossibleValueUseCase $useCase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new LargePossibleValueUseCase();
    }

    /**
     * @throws ValueCalculationException
     */
    #[NoReturn]
    public function testExistErrorByDiffArgumentsType(): void
    {
        $this->expectException(Throwable::class);

        $this->useCase
            ->find(
                numberX: self::STRING_ARG_FOR_NUMBER_X,
                numberY: 1,
                numberN: 2
            );
    }

    /**
     * @throws ValueCalculationException
     */
    #[NoReturn]
    public function testWhenNotExistPossibility(): void
    {
        $this->expectException(ValueCalculationException::class);
        $this->expectExceptionMessage('No values were found');

        $this->useCase
            ->find(
                numberX: 12,
                numberY: 10_000,
                numberN: -1
            );
    }

    #[ArrayShape([
        'Scenario 1' => 'array'
    ])]
    private function scenariosDataProvider(): array
    {
        return [
            'Scenario 1' => [
                'numberX' => 7,
                'numberY' => 5,
                'numberN' => 12345
            ]
        ];
    }
}
