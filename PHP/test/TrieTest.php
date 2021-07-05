<?php

namespace Tests;

use Algorithms\data_structure\Trie;
use PHPUnit\Framework\TestCase;

class TrieTest extends TestCase
{
    public function testFindStr()
    {
        $trie = new Trie();
        $strs = ['Laravel', '学院君', 'Framework', '学院', 'PHP'];
        foreach ($strs as $str) {
            $trie->insertStr($str);
        }

        self::assertTrue($trie->findStr('Laravel'));
        self::assertFalse($trie->findStr('Laravedffl'));
    }
}
