<?php
require('catalog.php');

use Catalog\ClassA as A;
use Catalog\ClassB as B;
use Catalog\ClassC as C;
use function  Catalog\fn_a;
use function  Catalog\fn_b;
use function  Catalog\fn_c;
use const Catalog\ConstA;
use const Catalog\ConstB;
use const Catalog\ConstC;
use const Catalog\Const1;

$a = new A();
echo $a->hello();
echo "<br/>";
$b = new B();
echo $b->hello();
echo "<br/>";
$c = new C();
echo $c->hello();
echo "<br/>";
echo fn_a();
echo "<br/>";
echo fn_b();
echo "<br/>";
echo fn_c();
echo "<br/>";
echo ConstA;
echo "<br/>";
echo ConstB;
echo "<br/>";
echo ConstC;
