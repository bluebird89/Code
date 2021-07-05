<?php


namespace syntax\phpunit;

class Observer
{
    public function update($argument)
    {
        // 随便做点什么。
    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
        // 随便做点什么
    }
}
