<?php


namespace Tests\tdd;

use PHPUnit\Framework\TestCase;

class SqrtBlackTest extends TestCase
{
    /**
     * @skip
     */
    public function inputNumbers()
    {
        return array(
            array(0, 0),
            array(1, 1),
            array(4, 2),
            array(9, 3),
            array(-1, NAN),
            array(-2, NAN),
            array(1000000, 1000),
        );
    }

    /**
     * @skip
     *
     * @dataProvider inputNumbers
     */
    public function testSquareRootIsCalculated($input, $output)
    {
        $this->assertEquals($output, sqrt($input));
    }
}
