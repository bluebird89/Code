<?php


namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use function trigger_error;
use const E_USER_DEPRECATED;
use const E_USER_ERROR;
use const E_USER_NOTICE;
use const E_USER_WARNING;

final class ErrorTest extends TestCase
{
    public function testDeprecationCanBeExpected(): void
    {
        $this->expectDeprecation();

        // （可选）测试讯息和某个字符串相等
        $this->expectDeprecationMessage('foo');

        // 或者（可选）测试讯息和某个正则表达式匹配
        $this->expectDeprecationMessageMatches('/foo/');

        trigger_error('foo', E_USER_DEPRECATED);
    }

    public function testNoticeCanBeExpected(): void
    {
        $this->expectNotice();

        // （可选）测试讯息和某个字符串相等
        $this->expectNoticeMessage('foo');

        // 或者（可选）测试讯息和某个正则表达式匹配
        $this->expectNoticeMessageMatches('/foo/');

        trigger_error('foo', E_USER_NOTICE);
    }

    public function testWarningCanBeExpected(): void
    {
        $this->expectWarning();

        // （可选）测试讯息和某个字符串相等
        $this->expectWarningMessage('foo');

        // 或者（可选）测试讯息和某个正则表达式匹配
        $this->expectWarningMessageMatches('/foo/');

        trigger_error('foo', E_USER_WARNING);
    }

    public function testErrorCanBeExpected(): void
    {
        $this->expectError();

        // （可选）测试讯息和某个字符串相等
        $this->expectErrorMessage('foo');

        // 或者（可选）测试讯息和某个正则表达式匹配
        $this->expectErrorMessageMatches('/foo/');

        trigger_error('foo', E_USER_ERROR);
    }
}
