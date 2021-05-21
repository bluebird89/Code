<?php

$parentId = posix_getpid();
fwrite(STDOUT, "my pid: $parentId".PHP_EOL);
$childNum = 10;
foreach (range(1, $childNum) as $index) {
    $pid = pcntl_fork();
    if ($pid === -1) {
        fwrite(STDERR, "failt to fork!\n");
        exit;
    }
    // parent code
    if ($pid > 0) {
        fwrite(STDOUT, "fork the {$index}th child, pid: $pid\n");
    } else {
        $mypid = posix_getpid();
        $parentId = posix_getppid();
        fwrite(STDOUT, "I'm the {$index}th child and my pid: $mypid, parentId: $parentId\n");
        sleep(5);
        exit;
    }
}
