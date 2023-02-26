<?php

namespace Tests\Unit\app\UseCases;

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

    #[NoReturn]
    public function testExistErrorByDiffArgumentsType(): void
    {
        $this->expectException(Throwable::class);

        $result = $this->useCase
            ->find(
                numberX: self::STRING_ARG_FOR_NUMBER_X,
                numberY: 1,
                numberN: 2
            );

        $this->assertNotEmpty($result);
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
