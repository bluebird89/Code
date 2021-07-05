<?php

namespace Tests;

use Algorithms\Search\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    public function testSearch()
    {
        self::assertEquals(4, BinarySearch::binary_search([5,7,8,3,45,2], 45));
        self::assertEquals(3, BinarySearch::binary_search_first([1, 2, 3, 3, 4, 5, 6], 3));
        self::assertEquals(4, BinarySearch::binary_search_last([1, 2, 3, 3, 4, 5, 6], 4));
        self::assertEquals(2, BinarySearch::binary_search_not_smaller_first([1, 2, 3, 3, 4, 5, 6], 3));
        self::assertEquals(3, BinarySearch::binary_search_smaller_last([1, 2, 3, 3, 4, 5, 6], 3));
    }
}
