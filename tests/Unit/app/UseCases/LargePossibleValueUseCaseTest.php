<?php

namespace Tests\Unit\app\UseCases;

use App\Exceptions\ValueCalculationException;
use App\UseCases\LargePossibleValueUseCase;
use JetBrains\PhpStorm\{ArrayShape, NoReturn};
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 * @link https://codeforces.com/problemset/problem/1374/A Documentation
 */
class LargePossibleValueUseCaseTest extends TestCase
{
    private const STRING_ARG_FOR_NUMBER_X = 'Example';

    private LargePossibleValueUseCase $useCase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new LargePossibleValueUseCase();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->useCase);
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

    /**
     * @throws ValueCalculationException
     * @dataProvider scenariosDataProvider()
     *
     * @note If you want to run only one scenario then put this command
     *       "--filter='testSuccessScenarios@Scenario 3'" after test called.
     */
    #[NoReturn]
    public function testSuccessScenarios(
        int $numberX,
        int $numberY,
        int $numberN,
        int $successResult
    ): void {
        $result = $this->useCase
            ->find(
                numberX: $numberX,
                numberY: $numberY,
                numberN: $numberN
            );

        $this->assertEquals($successResult, $result);
    }

    #[ArrayShape([
        'Scenario 1' => 'int[]',
        'Scenario 2' => 'int[]',
        'Scenario 3' => 'int[]',
        'Scenario 4' => 'int[]',
        'Scenario 5' => 'int[]',
        'Scenario 6' => 'int[]',
        'Scenario 7' => 'int[]',
    ])]
    private function scenariosDataProvider(): array
    {
        return [
            'Scenario 1' => [
                'numberX'       => 7,
                'numberY'       => 5,
                'numberN'       => 12_345,
                'successResult' => 12_339
            ],
            'Scenario 2' => [
                'numberX'       => 5,
                'numberY'       => 0,
                'numberN'       => 4,
                'successResult' => 0
            ],
            'Scenario 3' => [
                'numberX'       => 10,
                'numberY'       => 5,
                'numberN'       => 15,
                'successResult' => 15
            ],
            'Scenario 4' => [
                'numberX'       => 17,
                'numberY'       => 8,
                'numberN'       => 54_321,
                'successResult' => 54_306
            ],
            'Scenario 5' => [
                'numberX'       => 499_999_993,
                'numberY'       => 9,
                'numberN'       => 1_000_000_000,
                'successResult' => 999_999_995
            ],
            'Scenario 6' => [
                'numberX'       => 10,
                'numberY'       => 5,
                'numberN'       => 187,
                'successResult' => 185
            ],
            'Scenario 7' => [
                'numberX'       => 10,
                'numberY'       => 5,
                'numberN'       => 187,
                'successResult' => 185
            ]
        ];
    }
}
