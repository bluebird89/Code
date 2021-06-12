<?php

/**
 * 迭代器：实现 Iterator 接口就行
 */
class OwnIterator implements Iterator
{
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind()
    {
        echo __METHOD__.PHP_EOL;
        $this->position = 0;
    }

    public function current()
    {
        echo __METHOD__.PHP_EOL;
        return $this->array[$this->position];
    }

    public function key()
    {
        echo __METHOD__.PHP_EOL;
        return $this->position;
    }

    public function next()
    {
        echo __METHOD__.PHP_EOL;
        ++$this->position;
    }

    public function valid()
    {
        echo __METHOD__.PHP_EOL;
        return isset($this->array[$this->position]);
    }
}

$it = new OwnIterator;
foreach ($it as $key => $value) {
    echo $key.'@@'.$value.PHP_EOL;
}
