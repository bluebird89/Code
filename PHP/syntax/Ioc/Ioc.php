<?php

namespace syntax\Ioc;

use ReflectionClass;

class Ioc
{
    public array $binding = [];

    public function bind($abstract, $concrete)
    {
        //这里为什么要返回一个closure呢？因为bind的时候还不需要创建User对象，所以采用closure等make的时候再创建FileLog;
        $this->binding[$abstract]['concrete'] = function ($ioc) use ($concrete) {
            return $ioc->build($concrete);
        };
    }

    public function build($concrete)
    {
        $reflector = new ReflectionClass($concrete);
        $constructor = $reflector->getConstructor();
        if (is_null($constructor)) {
            return $reflector->newInstance();
        }

        $dependencies = $constructor->getParameters();
        $instances = $this->getDependencies($dependencies);

        return $reflector->newInstanceArgs($instances);
    }

    // 获取参数依赖
    protected function getDependencies($paramters): array
    {
        $dependencies = [];
        foreach ($paramters as $paramter) {
            $dependencies[] = $this->make($paramter->getClass()->name);
        }
        return $dependencies;
    }

    // 创建对象
    public function make($abstract)
    {
        // 根据key获取binding的值
        $concrete = $this->binding[$abstract]['concrete'];
        return $concrete($this);
    }
}

$ioc = new Ioc();

$ioc->bind('log', 'FileLog');
$ioc->bind('user', 'User');

//$user = $ioc->make('user');
//$user->login();
