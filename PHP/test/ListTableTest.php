<?php

namespace Tests;

use Algorithms\data_structure\LinearList\ListTable;
use PHPUnit\Framework\TestCase;

class ListTableTest extends TestCase
{
    public function testDelete()
    {
        $list = new ListTable([4, 6, 7, 9, 7]);
        $this->assertTrue($list->delete(9));
    }
}
