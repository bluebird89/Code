<?php

$multiprocess = new MultiProcess();
$queue = new QueueModel();

$i = 0;
$max = 0;
while (true) {
    list($max, $queueId) = $queue->popFromQueue();
    if ($queueId == $queue::QUEUE_EMPTY) {
        $max = $i = 0;
        list($max, $queueId) = $queue->popFromQueue(true);
    }
    if ($queueId == $queue::LIST_EMPTY) {
        $max = $i = 0;
        echo "\n队列处于空闲状态...\n";
        sleep(3);//队列出于空闲状态
    }
    if ($queueId != $queue::LIST_EMPTY && $queueId != $queue::QUEUE_EMPTY) {
        $multiprocess->runToBackground('updateUserStatus', $queueId, $i, $max);
        $i++;
    }


}

/**
 * 队列
 */
class QueueModel
{
    private $key = 'queue';
    private $_redis;
    const QUEUE_EMPTY = 'queue_empty';//redis 队列为空
    const LIST_EMPTY = 'list_empty';//mysql 列表为空

    public function __construct()
    {
        $this->getRedis();
    }

    /**
     * 从队列中获取一条数据
     * 从数据库中将队列取出，并且放到redis队列中。如果redis为空则查询数据库
     *
     */
    public function popFromQueue($readFromDB = false)
    {
        $this->setKey('user');
        if ($readFromDB == false) {
            $length = $this->_redis->llen($this->key);
            if ($length > 0) {
                return array($length, $this->_redis->lpop($this->key));
            } else {
                return array(0, self::QUEUE_EMPTY);
            }
        } else {
            $lists = $this->getAllFromDB();
            if (empty($lists)) {
                return array(0, self::LIST_EMPTY);
            }
            $this->pushQueue($lists);
            return array(count($lists), $this->_redis->lpop($this->key));
        }

    }

    public function getAllFromDB()
    {//方便测试，随机返回数据或空
        $a = rand(1, 10) % 2;
        if ($a == 1) {
            return array(1001, 1002, 1003, 1004, 1005, 1006, 1007, 1008);
        } else {
            return array();
        }
    }

    private function getRedis()
    {
        if ($this->_redis) {
            return true;
        } else {
            $redis = new Redis();
            $redis->connect('192.168.23.250', 6379);
            $this->_redis = $redis;
        }
    }

    private function pushQueue($lists)
    {
        foreach ($lists as $id) {
            $this->_redis->rpush($this->key, $id);
        }
    }

    private function setKey($key)
    {
        return $this->key = 'queue:'.$key;
    }
}


/**
 * 多进程基类
 */
class MultiProcess
{
    private $logfile = './';
    private $maxProcess = 3;
    private $cmdBase = '';

    /**
     * 将某个任务推到后台执行
     *
     * @param  type  $method
     * @param  type  $queueId
     * @param  type  $i
     * @param  type  $max
     *
     * @return int
     */
    public function runToBackground($method, $queueId, $i, $max)
    {
        // 命令行
        $this->cmdBase = "php php_cli.php Test $method";
        if (!file_exists($this->logfile)) {
            mkdir($this->logfile, "777");
        }
        $logfile = $this->logfile."$method.log";

        $this->checkProcessLimit();

        $cmd = $this->cmdBase." --queueId=$queueId";
        echo "启动$i $max: ".$cmd."  >> {$logfile} &\n";
        // 检查进程是否存在，如果存在，则不执行这个
        $count = $this->checkProcessCount($cmd);
        if ($count == 0) {
            // 启动进程
            exec($cmd." >> {$logfile} &");
        }

        $this->listen($i, $max);

        return 0;
    }

    public function checkProcessLimit()
    {
        $count = $this->checkProcessCount($this->cmdBase);
        if (($this->maxProcess - $count) <= 0) {
            // 如果没有空闲进程，则等待，直到出现空闲进程
            while (1) {
                echo "进程池已满，等待中...\n";
                sleep(1);
                $count = $this->checkProcessCount($this->cmdBase);
                if (($this->maxProcess - $count) > 0) {
                    break;
                }
            }
        }
    }

    /**
     * 检查某个任务的进程数量
     *
     * @param  string  $grepParam
     *
     * @return int
     */
    function checkProcessCount($grepParam)
    {
        $cmd = "ps -ef | grep \"{$grepParam}\" | grep -v grep | wc -l";
        $out = popen($cmd, "r");
        $line = fread($out, 512);
        pclose($out);
        return $line;
    }

    public function listen($i, $max)
    {
        if ($i == $max) {
            // 最后一个进程，启动以后就扥带直到完成
            while (1) {
                sleep(1);
                $count = $this->checkProcessCount($this->cmdBase);
                echo("剩余进程数量：".trim($count, "\n").", 等待中..\n");
                if ($count == 0) {
                    echo "任务全部完成\n\n";
                    break;
                }
            }
        }
    }
}
