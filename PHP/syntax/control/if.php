<?php

//  减少if...else...的使用,提前return异常
//　函数里面先处理异常的情况，再执行正常的逻辑
function doSomething($x)
{
    if ($x < 4) {
        return false;
    }
    if ($x > 19) {
        return false;
    }

    return true;
}

$num = 12;
if ($num % 2 == 0) {
    echo "$num is even number";
} else {
    echo "$num is odd number";
}

$a = 0;
$b = 0;
if ($a > $b) :
    echo $a." is greater than ".$b;
elseif ($a == $b) : // 注意使用 elseif
    echo $a." equals ".$b;
else :
    echo $a." is neither greater than or equal to ".$b;
endif;
