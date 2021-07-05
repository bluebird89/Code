<?php

namespace syntax\Reflect;

class Resolve
{
    //构建类的对象
    public static function make($className)
    {

        $reflectionClass = new ReflectionClass($className);
        $reflectionClass->getConstants();
        $reflectionClass->getProperties();
        $reflectionClass->getMethods();
        $reflectionClass->getConstructor();
        $reflectionClass->getConstructor()->getParameters();

        $constructor = $reflectionClass->getConstructor();
        $parameters = $constructor->getParameters();
        $dependencies = static::getDependencies($parameters);

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    //依赖解析
    public static function getDependencies($parameters)
    {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();
            if (is_null($dependency)) {
                if ($parameter->isDefaultValueAvailable()) {
                    $dependencies[] = $parameter->getDefaultValue();
                } else {
                    //不是可选参数的为了简单直接赋值为字符串0
                    //针对构造方法的必须参数这个情况
                    //laravel是通过service provider注册closure到IocContainer,
                    //在closure里可以通过return new Class($param1, $param2)来返回类的实例
                    //然后在make时回调这个closure即可解析出对象
                    //具体细节我会在另一篇文章里面描述
                    $dependencies[] = '0';
                }
            } else {
                //递归解析出依赖类的对象
                $dependencies[] = static::make($parameter->getClass()->name);
            }
        }

        return $dependencies;
    }
}
