<?php

namespace Tests;

use Algorithms\data_structure\StringMatch;
use PHPUnit\Framework\TestCase;

class StringMatchTest extends TestCase
{
    public function testBF()
    {
        $this->assertTrue(StringMatch::BF([1, 2, 3, 4, 5, 6], [4, 5, 6]));
    }
}
