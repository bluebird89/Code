<?php

// $a = pconnect(host, port, time_out);
// select(3);
// $a -> setex(id, 3);
// echo $a -> get(id);

// //之后执行下面的连接
// $b = pconnect(host, port, time_out);
// select(2);
// $b->set(id,2)
// echo $a->get(id);

namespace syntax\redis;

class RedisConnection
{
    public $hostname = 'localhost';
    public $port = 6379;
    public $password = '';
    public $redis;

    public function connect()
    {
        $this->redis = new \Redis();
        $this->redis->connect($this->hostname, $this->port);
        if ($this->password !== null) {
            $this->redis->auth($this->password);
        }
    }

    public function pconnect()
    {
        $this->redis = new \Redis();
        $this->redis->pconnect($this->hostname, $this->port);
        if ($this->password !== null) {
            $this->redis->auth($this->password);
        }
    }

    public function getRedis($pconnect = false)
    {
        if ($pconnect) {
            $this->pconnect();
        } else {
            $this->connect();
        }
        return $this->redis;
    }
    public function __call($name, $params = [])
    {
        switch ($name) {
            case 'set':
                return $this->redis->set($params[0], $params[1]);
            case 'get':
                return $this->redis->get($params[0]);
            case 'del':
                return $this->redis->del($params[0]);
            case 'hGet':
                return $this->redis->hGet($params[0], $params[1]);
            case 'hSet':
                return $this->redis->hSet($params[0], $params[1], $params[2]);
            case 'hDel':
                return $this->redis->hDel($params[0], $params[1]);
            case 'hGetAll':
                return $this->redis->hGetAll($params[0]);
            case 'hMSet':
                return $this->redis->hMSet($params[0], $params[1]);
            case 'hMGet':
                return $this->redis->hMSet($params[0], $params[1]);
            case 'lPush':
                return $this->redis->lPush($params[0], $params[1]);
            case 'rPush':
                return $this->redis->rPush($params[0], $params[1]);
            case 'lPop':
                return $this->redis->lPop($params[0]);
            case 'rPop':
                return $this->redis->rPop($params[0]);
            case 'lLen':
                return $this->redis->lLen($params[0]);
            case 'lRange':
                return $this->redis->lRange($params[0], $params[1], $params[2]);
            case 'incr':
                return $this->redis->incr($params[0]);
            case 'expire':
                return $this->redis->expire($params[0], $params[1]);
            case 'publish':
                return $this->redis->publish($params[0], $params[1]);
        }
    }
}

$instance = new RedisConnection();

$instance->pconnect();
$instance->set('City', 'Shanghai');
echo $instance->get('City');
