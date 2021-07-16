<?php
namespace syntax\Ioc;

$container = new Containers;
$container->bind('superman', function ($container, $moduleName) {
    return new Superman($container->make($moduleName));
});

$container->bind('xpower', function ($container) {
    return new XPower;
});

$container->bind('ultrabomb', function ($container) {
    return new UltraBomb;
});

// 启动生产
$superman_1 = $container->make('superman', ['xpower']);
$superman_2 = $container->make('superman', ['ultrabomb']);
$superman_3 = $container->make('superman', ['xpower']);
