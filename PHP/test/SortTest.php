<?php

namespace Tests;

use Algorithms\Sort\Bubble;
use Algorithms\Sort\Counting;
use Algorithms\Sort\Heap;
use Algorithms\Sort\Insertion;
use Algorithms\Sort\Merge;
use Algorithms\Sort\Quick;
use Algorithms\Sort\Selection;
use Algorithms\Sort\Shell;
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{

    public function testBubble(): void
    {
        self::assertEquals([1, 2, 3, 4, 5], Bubble::sort([5, 3, 4, 1, 2]));
    }

    public function testInstertion(): void
    {
        self::assertEquals([1, 2, 3, 4, 5], Insertion::sort([1, 5, 3, 4, 2]));
    }

    public function testSelection(): void
    {
        self::assertEquals([1, 2, 3, 4, 5], Selection::sort([1, 5, 3, 4, 2]));
    }

    public function testMerge(): void
    {
        self::assertEquals([1, 2, 3, 4, 5], Merge::sort([1, 5, 3, 4, 2]));
        self::assertEquals([1, 2, 3, 4, 5], Merge::merge_sort([1, 5, 3, 4, 2]));
    }

    public function testQuick(): void
    {
        self::assertEquals([1, 2, 3, 4, 5], Quick::sort([1, 5, 3, 4, 2]));
        self::assertEquals([1, 2, 3, 4, 5], Quick::quick_sort([1, 5, 3, 4, 2]));
    }

    public function testShell()
    {
        self::assertEquals([1, 2, 3, 4, 5], Shell::sort([1, 5, 3, 4, 2]));
    }

    public function testCounting(): void
    {
        self::assertEquals([1, 2, 3, 4, 5], Counting::sort([1, 5, 3, 4, 2]));
    }

    public function testHeap(): void
    {
        self::assertEquals([1, 2, 3, 4, 5], Heap::sort([1, 5, 3, 4, 2]));
    }
}
