<?php

/**
 * 日志调试方法
 *
 * 调试非本地环境或分布式环境，通过Log查看变量传递
 * 写入变量值到\var\log\php_super_debug.log
 *
 * @param  mixed   $data      日志数据
 * @param  string  $log_path  日志路径
 * @param  string  $log_name  日志名称
 *
 * @return void
 */
function super_debug($data, $log_path = '/var/log/', $log_name = 'debug.log')
{
    error_log('['.time().']:'.json_encode($data, JSON_UNESCAPED_UNICODE)."\n", 3, $log_path.$log_name);
}

 super_debug(['name' => 'henry', 'time' => time()], './');

// 下载
$file_url = 'https://upload.chinaz.com/picmap/201811151633430899_60.jpg';
header('context-Type: application/octet-stream');
header("context-Transfer-Encoding: Binary");
header("context-disposition: attachment; filename=\"".basename($file_url)."\"");
readfile($file_url); # 获取图片 base64

require __DIR__.'/../vendor/autoload.php';

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\MemoryPeakUsageProcessor;

// 创建一个 Channel，参数 log 即为 Channel 的名字
$log = new Logger('log');

// 创建两个 Handler，对应变量 $stream 和 $fire
$stream = new StreamHandler('runtime/logger/test.log', Logger::WARNING);
$fire = new FirePHPHandler();

// 定义时间格式 "Y-m-d H:i:s"
$dateFormat = "Y n j, g:i a";
// 定义日志格式 "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
$output = "%datetime%||%channel||%level_name%||%message%||%context%||%extra%\n";
// 根据时间格式和日志格式，创建一个 Formatter
$formatter = new LineFormatter($output, $dateFormat);

// 将 Formatter 设置到 Handler 里面
$stream->setFormatter($formatter);

//  Handler 推入到 Channel 的 Handler 队列内
$log->pushHandler($stream);
$log->pushHandler($fire);

// clone new log channel
$log2 = $log->withName('log2');

// add records to the log
$log->warning('Foo');

// add extra data to record
// 1. log context
$log->error('a new user', ['username' => 'daydaygo']);
// 2. processor
$log->pushProcessor(function ($record) {
    $record['extra']['dummy'] = 'hello';
    return $record;
});
$log->pushProcessor(new MemoryPeakUsageProcessor());
$log->alert('czl');
