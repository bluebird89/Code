<?php

require '../vendor/autoload.php';

# 可以包含任何数据类型，支持无限扩容,将传统数组和字典类型合二为一, 底层通过哈希表实现数组功能
use oop\Users;

print_r(str_split('werty'));
die;

# 索引数组
$season = ["summer", "winter", "spring", "autumn"];

$startMemory = memory_get_usage();
$fruits = [];
$fruits[] = 'Apple';
$fruits[] = 'Orange';
$fruits[] = 'Pear';
foreach ($fruits as $index => $value) {
    echo "Position ".$index." holds the value ".$value."\n";
}
echo memory_get_usage() - $startMemory, " bytes\n";

$fruits[2] = 'Banana';
print($fruits[0].PHP_EOL);
unset($fruits[1]);

$emp = [
    [1, "sonoo", 400000],
    [2, "john", 450000],
    [3, "rahul", 300000]
];
for ($row = 0; $row < 3; $row++) {
    for ($col = 0; $col < 3; $col++) {
        echo $emp[$row][$col]."  ";
    }
    echo "<br/>";
}

$arr = ['a', 'b', 'c'];
foreach ($arr as $k => &$v) {
    # code...
}
print_r($arr); // ['a', 'b', 'c']
// unset($v); # 引用赋值指针未消除，下轮生效
foreach ($arr as $k => $v) {
}
print_r($arr); # ['a', 'b', 'b']

$array1 = range(0, 100, 10);//0为起始值，100为结束值，10为步进值(默认步进值为1).
print_r($array1);
echo "<br />";
$array2 = range("A", "Z");
print_r($array2);
echo "<br />";
$array3 = range("z", "a");
print_r($array3);

$array = range(1, 10);
$fillarray = range("a", "d");
$arrayFilled = array_fill(0, 5, $fillarray);//这里的$fillarray可以是字符串，如"test".
echo "<pre>";
print_r($arrayFilled);
echo "</pre>";
$keys = array("string", "2", 9, "SDK", "PK");
$array2 = array_fill_keys($keys, "testing");
echo "<pre>";
print_r($array2);
echo "</pre>";

# 关联数组
$salary = array("Hema" => "350000", "John" => "450000", "Kartik" => "200000");
$salary["Hema"] = "350000";
$salary["John"] = "450000";
$salary["Kartik"] = "200000";
# 计算数组中单元数目，或对象中的属性个数
echo count($salary);

foreach ($salary as $k => $v) {
    echo "Key: ".$k." Value: ".$v."<br/>";
}

$arr = [
    ['name' => 'henry', 'status' => 1, 'gender' => 'male'],
    ['name' => 'lily', 'status' => 0, 'gender' => 'female']
];
foreach ($arr as &$v) {
    if ($v['status'] === 1) {
        $v['address'] = 'SH';
    }
    unset($v['status']);
}
unset($v);
print_r($arr);

$array = array(
    1 => "a",
    "1" => "b",
    1.5 => "c",
    true => "d",
);
var_dump($array);

// 混合
$array = [1, 2, 3, 4, 5];
$mixedArray = [];
$mixedArray[0] = 200;
$mixedArray['name'] = "Mixed array";
$mixedArray[1] = 10.65;
$mixedArray[2] = ['I', 'am', 'another', 'array'];

$players = [];
$players[] = ['Name' => "Ronaldo", "Age" => 31, "Country" => "Portugal", "Team" => "Real Madrid"];
$players[] = ['Name' => "Messi", "Age" => 27, "Country" => "Argentina", "Team" => "Barcelona"];
$players[] = ['Name' => "Neymar", "Age" => 24, "Country" => "Brazil", "Team" => "Barcelona"];
$players[] = ['Name' => "Rooney", "Age" => 30, "Country" => "England", "Team" => "Man United"];

foreach ($players as $index => $playerInfo) {
    echo "Info of player # ".($index + 1)."\n";
    foreach ($playerInfo as $key => $value) {
        echo $key.": ".$value."\n";
    }
    echo "\n";
}

// 所有键名改为全小写或大写,不改变数字索引
// 如果输入值（array）不是一个数组，就会抛出一个错误警告（E_WARNING）
$input_array = array("FirSt" => 1, "SecOnd" => 4);
print_r(array_change_key_case($input_array, CASE_UPPER)); # [[FIRST] => 1 [SECOND] => 4]
print_r(array_change_key_case($input_array, CASE_LOWER)); # [[first] => 1 [second] => 4]]

# 值需要能够作为合法的键名，同一个值出现多次，则最后一个键名将作为它的值，其它键会被丢弃
print_r(array_flip($input_array)); # [ [1] => FirSt [4] => SecOnd]

print_r(array_reverse($input_array));
print_r($input_array);

# 随机取出一个或多个单元, 返回键值 用了伪随机数产生算法，所以不适合密码学场景
$array5 = ["Neo", "Morpheus", "Trinity", "Cypher", "Tank"];
print_r(array_rand($array5, 2));
shuffle($array5);
print_r($array5);

# 获取指定value 的 key，第三个参数是否严格比较
print_r(array_keys(['Name', '1'], 1, true)); # []
# isset() 对于数组中为 NULL 的值不会返回 TRUE
print_r(array_key_exists('first', ['first' => 1, 'second' => 4])); # 返回 true|false
in_array('Mac', ["Mac", "NT", "Irix", "Linux"], true); # true  搜索给定的值，如果成功则返回首个相应的键名

# 获得重新编排索引的新数组
print_r(array_values($input_array));
# 数组里是否有指定的键名或索引
print_r(array_search('first', ['zero', 'first', 'second'])); # 1

### 遍历
$vehicles = ['car', 'truck', 'van', 'bus'];
current($vehicles);
next($vehicles);
//each($vehicles);
echo current($vehicles);
$a = [1, 2, 3, 4, 5];
$sum = 0;
while (next($a)) {
    $current = prev($a);
    $sum += $current;
    next($a);
}

echo $sum.PHP_EOL;
reset($vehicles);
do {
    print key($vehicles).':'.current($vehicles).PHP_EOL;
} while (next($vehicles));

$array = [
    'fruit1' => 'apple',
    'fruit2' => 'orange',
    'fruit3' => 'grape',
    'fruit4' => 'apple',
    'fruit5' => 'apple'
];
while ($fruit_name = current($array)) {
    if ($fruit_name == 'apple') { # fruit1 friut4 fruit5
        echo key($array).PHP_EOL;
    }
    next($array);
}

$transport = ['foot', 'bike', 'car', 'plane'];

$mode = current($transport); // $mode = 'foot';
$mode = next($transport);    // $mode = 'bike';
$mode = current($transport); // $mode = 'bike';
$mode = prev($transport);    // $mode = 'foot';
# 将数组的内部指针指向最后一个单元
$mode = end($transport);     // $mode = 'plane';
$mode = current($transport); // $mode = 'plane';
# 返回当前指针位置的键／值对并向前移动数组指针
//print_r(each($transport)); # [1] => plane [value] => bob [0] => 3 [key] => 3
# 将变量从数组中导入到当前的符号表中
# 关联数组。此函数会将键名当作变量名，值作为变量的值
# 对每个键／值对都会在当前的符号表中建立变量，并受到 flags 和 prefix 参数的影响。
# EXTR_OVERWRITE如果有冲突，覆盖已有的变量。
# EXTR_SKIP如果有冲突，不覆盖已有的变量。
# EXTR_PREFIX_SAME如果有冲突，在变量名前加上前缀 prefix。
# EXTR_PREFIX_ALL给所有变量名加上前缀 prefix。
# EXTR_PREFIX_INVALID仅在非法／数字的变量名前加上前缀 prefix。
# EXTR_IF_EXISTS仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。 举个例子，以下情况非常有用：定义一些有效变量，然后从 $_REQUEST 中仅导入这些已定义的变量。
# EXTR_PREFIX_IF_EXISTS 仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
# EXTR_REFS 将变量作为引用提取。这有力地表明了导入的变量仍然引用了 array 参数的值。可以单独使用这个标志或者在 flags 中用 OR 与其它任何标志结合使用。

$size = "large";
$var_array = array(
    "color" => "blue",
    "size" => "medium",
    "shape" => "sphere"
);
extract($var_array, EXTR_PREFIX_SAME, "wddx");
echo "$color, $size, $shape, $wddx_size\n"; // blue, large, sphere, medium

// 一个数组分割成多个数组，其中每个数组的单元数目由 size 决定。最后一个数组的单元数目可能会少于 size 个 第三个参数决定是否保留键名
// size 小于 1，会抛出一个 E_WARNING 错误并返回 NULL
$input_array = array('a', 'b', 'c');
print_r(array_chunk($input_array, 2)); # [[a,b], [c]]
print_r(array_chunk($input_array, 2, true)); # [[a,b], [2 => c]]
//print_r(array_slice());

// 如果提供的是包含一组对象的数组，只有 public 属性会被直接取出。 为了也能取出 private 和 protected 属性，类必须实现 __get() 和 __isset() 魔术方法
// 返回input数组中键值为column_key的列， 如果指定了可选参数index_key，那么input数组中的这一列的值将作为返回数组中对应值的键
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    )
);
print_r(array_column($records, 'first_name')); # [[0] => John [1] => Sally [2] => Jane]
print_r(array_column($records, 'first_name', 'id')); # [[2135] => John,[3245] => Sally,[5342] => Jane]

$users = [
    new Users('user 1'),
    new Users('user 2'),
    new Users('user 3'),
];
print_r(array_column($users, 'username')); # [[0] => user 1 [1] => user 2 [2] => user 3]

// 用一个数组的值作为其键名，另一个数组的值作为其值
// 键中 非法值将会被转换为字符串类型
// 如果两个数组的单元数不同则返回 FALSE
$a = ['green', 'red', 'yellow'];
$b = ['avacado', 'apple', 'banara'];
print_r(array_combine($a, $b)); # [[green] => avacado [red] => apple [yellow] => banara]

//array_splice();

# 合并一个或多个数组
# 相同的字符串键名，则后面的值将覆盖前一个值
# 包含数字键名，后面的值将不会覆盖原来的值，而是附加到后面
# 如果只给了一个索引数组或者结果包含 数字索引，则键名会以连续方式重新索引
print_r(array_merge(
    ['Name' => 'henry', 5 => 'Beijing'],
    ['Name' => 'Lily', 5 => 'Shanghai']
)); # [ [Name] => Lily [0] => Beijing [1] => Shanghai]
print_r(array_merge([5 => 'name', 7 => 'address'])); # [[0] => name [1] => address]
# 保留原有数组并只想新的数组附加到后面
# 第一个数组的键名将会被保留。在两个数组中存在相同的键名时，第一个数组中的同键名的元素将会被保留，第二个数组中的元素将会被忽略
print_r([0 => 'zero_a', 2 => 'two_a', 3 => 'three_a'] + [
        1 => 'one_b', 3 => 'three_b', 4 => 'four_b'
    ]); # [  [0] => zero_a [2] => two_a [3] => three_a [1] => one_b [4] => four_b]
# 输入的数组中有相同的字符串键名，则这些值会被合并到一个数组中去，这将递归下去
# 如果数组具有相同的数组键名，后一个值将不会覆盖原来的值，而是附加到后面
print_r(array_merge_recursive(
    ['name' => ['first' => 'Lee', 'last' => 'Henry']],
    ['name' => ['first' => 'King']]
)); # [ 'name' => ['first' => ['Lee', 'King'], 'last' => 'Henry']]

# 用给定的值填充数组 array_fill ( int $start_index , int $num , mixed $value )
# start_index 是负数， 那么返回的数组的第一个索引将会是 start_index ，而后面索引则从0开始
print_r(array_fill(-2, 4, 'pear')); # [[-2] => pear [0] => pear [1] => pear [2] => pear]
# 用指定的键和值填充数组, 非法值将被转换为字符串
print_r(array_fill_keys(['foo', 5], 'banana')); # [[foo] => banana [5] => banana]
# 用 value 填充到 size 指定的长度之后的一个副本
# 如果 size 为正，则填补到数组的右侧，如果为负则从左侧开始填补
# 如果 size 的绝对值小于或等于 array 数组的长度则没有任何填补。
print_r(array_pad([12, 10, 9], 5, 0)); # [12, 10, 9, 0, 0]

# 索引数组 + 会保留第一个值，后面同样key舍弃，merge不会覆盖掉原来的值
# 关联数组：+ 会保留第一个值，merge会保留保留后者
$arr1 = ['PHP', 'apache'];
$arr2 = ['PHP', 'MySQl', 'HTML', 'CSS'];
$mergeArr = array_merge($arr1, $arr2);
$plusArr = $arr1 + $arr2;
print_r($mergeArr);
print_r($plusArr);

## 内容操作
$stack = array("apple", "raspberry");

# 弹出数组最后一个单元,如果 array 是空（如果不是一个数组），将会返回 NULL
print_r(array_pop($stack));# raspberry
print_r($stack);# ['apple']

print(array_push($stack, 'orange', 'banana')); # 3
print_r($stack); // [[0] => apple [1] => orange [2] => banana]

# 数组开头单元移出
print(array_shift($stack)); // apple
print_r($stack); // [[0] => orange [1] => banana]]

# 数组开头插入
print_r(array_unshift($stack, "orange", "pear")); # 4
print_r($stack); # [ [0] => orange [1] => pear [2] => orange [3] => banana]
print_r(array_product([2, 4, 5])); # 40

echo "############## array_count_values ################".PHP_EOL;
// 数组的键是 array 里单元的值； 数组的值是 array 单元的值出现的次数
print_r(array_count_values([1, 'hello', 1, 'world', 1])); # [ [1] => 3 [hello] => 1 [world] => 1]
// #  移除数组中重复的值
//array_unique();
// # 返回字符串所用字符的信息
//count_chars();

echo "############## array sort ################".PHP_EOL;
# sort 索引数组排序
$season = array("summer", "winter", "spring", "autumn");
sort($season); # 自身操作
foreach ($season as $s) {
    echo "$s <br/>";
}

# 对多个数组进行排序，或者根据某一维或多维对多维数组进行排序
$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);
# 默认升序 第二个数组里的项目对应第一个数组后也进行了排序
print_r($ar1); # [0, 10, 100, 100]
print_r($ar2); # [4,1,2,3]
$ar = array(
    array("10", 11, 100, 100, "a"),
    array(1, 2, "2", 3, 1)
);
# 第一个数组 被当作字符串以升序排列, 第二个数组 被当作数字以降序排列，两个数组保持对应关系
# 优先第一个数组排序，再排序第二个
array_multisort(
    $ar[0],
    SORT_ASC,
    SORT_STRING,
    $ar[1],
    SORT_NUMERIC,
    SORT_DESC
);
print_r($ar); # [["10", 100,100,11,"a"],[1,3,"2", 2,1]]
# SORT_STRING 和 SORT_REGULAR 都是区分大小写字母的，大写字母会排在小写字母之前
$array = array('Alpha', 'atomic', 'Beta', 'bank');
$array_lowercase = array_map('strtolower', $array);
# 把 $array 作为最后一个参数，以通用键排序
array_multisort($array_lowercase, SORT_ASC, SORT_STRING, $array);
print_r($array);

$arr = array(
    array(
        'name' => 'sadas',
        'norder' => 1
    ),
    array(
        'name' => 'sadas',
        'norder' => 11
    ),
    array(
        'name' => 'sadas',
        'norder' => 123
    ),
    array(
        'name' => 'sadas',
        'norder' => 11
    )
);
//array_multisort(array_column($arr, 'norder'), SORT_ASC, $arr);

echo "############## array diff && insert ################".PHP_EOL;
// 支持多个数组比较
// 回调函数 等于1 的返回
$array1 = ["a" => "green", "b" => "brown", "c" => "blue", "red"];
$array2 = ["a" => "green", "yellow", "red"];
$array3 = ['blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4];
$array4 = ['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8];

# 计算数组交集,只比较值,键名保留不变
print_r(array_intersect($array1, $array2)); # [[a] => green [0] => red]

$name1 = array("maxsu", "john", "vivek", "minsu");
$name2 = array("umesh", "maxsu", "kartik", "minsu");
print_r(array_intersect($name1, $name2)); # 交集

# 带索引检查计算数组的交集, 和 array_intersect() 不同的是键名也用于比较
print_r(array_intersect_assoc($array1, $array2)); # [[a] => green]
# 带索引检查计算数组的交集，用回调函数比较索引
print_r(array_intersect_uassoc(
    $array1,
    array("a" => "GREEN", "B" => "brown", "yellow", "red"),
    "strcasecmp"
)); # [[b] => brown]
# 所有出现在 array3 中并同时出现在所有其它参数数组中的键名的值 键名比较 使用键名比较计算数组的交集
print_r(array_intersect_key($array3, $array4)); # [ [blue] => 1 [green] => 3]
# 所有出现在 array3 中并同时出现在所有其它参数数组中的键名的值 用回调函数比较键名 用回调函数比较键名来计算数组的交集
print_r(array_intersect_ukey($array3, $array4, function ($key1, $key2) {
    # [ [blue] => 1 [green] => 3]
    if ($key1 == $key2) {
        return 0;
    } elseif ($key1 > $key2) {
        return 1;
    } else {
        return -1;
    }
}));


# 比较value 所有在 array1 中但是不在任何其它参数数组中的值 键名保留不变  (string) $elem1 === (string) $elem2 时被认为是相同
print_r(array_diff($array1, $array2)); # [[b] => brown[c] => blue]
# 用用户提供的回调函数做索引检查来计算数组的差集

// 所有在 array1 中但是不在任何其它参数数组中的值。和 array_diff() 不同的是键名也用于比较
print_r(array_diff_assoc($array1, $array2)); # [[b] => brown[c] => blue [0] => red]
# 值仅在 (string) $elem1 === (string) $elem2 时被认为相等
print_r(array_diff_assoc([0, 1, 2], ["00", "01", "2"])); # [ [0] => 0 [1] => 1]
print_r(array_diff_uassoc($array1, $array2, function ($a, $b) {
    # [[b] => brown [c] => blue [0] => red]
    if ($a === $b) {
        return 0;
    }
    return ($a > $b) ? 1 : -1;
}));
// # 带索引检查计算数组的差集，用回调函数比较数据
//array_udiff_assoc();
// # 带索引检查计算数组的差集，用回调函数比较数据和索引
//array_udiff_uassoc();

# 所有出现在 array1 中但是未出现在任何其它参数数组中的键名的值, 键名仅在 (string) $key1 === (string) $key2 时被认为相等
print_r(array_diff_key($array3, $array4)); # [[red] => 2 [purple] => 4]
# 用回调函数对键名比较计算数组的差集
print_r(array_diff_ukey($array3, $array4, function ($key1, $key2) {
    # [[red] => 2 [purple] => 4]
    if ($key1 == $key2) {
        return 0;
    } elseif ($key1 > $key2) {
        return 1;
    } else {
        return -1;
    }
}));

// is_array(), explode(), implode(), split(), preg_split(), and unset()
// base64_encode();

# 批处理, 每条为索引数组一条数据
# 如果几个数组的元素数量不一致：空元素会扩展短那个数组，直到长度和最长的数组一样。
print_r(array_map(function ($n) {
    return ($n * $n * $n);
}, [1, 5, 6])); # [[0] => 1 [1] => 125 [2] => 216 ]
print_r(array_map( # [[henry] => name [34] => age]
    function ($key) {
        return str_replace('user_', '', $key);
    },
    ['henry' => 'user_name', 'user_age']
));
print_r(array_map(function ($a, $b) {
    return $a.':'.$b;
}, ['Henry', 'Lily'], [15, 17])); # [ [0] => Henry:15 [1] => Lily:17]
print_r(array_map(null, [1, 2, 3], ['one', 'two', 'three'])); # [[1,one], [2,two], [3,three]]
# 仅传入一个数组，键（key）会保留；传入多个数组，键（key）是整型数字的序列
print_r(array_map(function ($key) {
    # ['key'] => ['value']
    return [$key];
}, ['key' => 'value']));
print_r(array_map(function ($key, $value) {
    # [['value', 'value']]
    return [$key, $value];
}, ['key' => 'value'], ['key' => 'value']));

array_map(function ($element) {
    return strtotime($element['add_time']);
}, $datas);

# value 过滤
print_r(array_filter([0 => 'foo', 1 => false, 2 => -1, 3 => null, 4 => ''])); # [ [0] => foo [2] => -1]
$array6 = array("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5);
$array7 = array(6, 7, 8, 9, 10, 11, 12);
print_r(array_filter($array6, function ($var) {
    # [[a] => 1 [c] => 3 [e] => 5]
    // returns whether the input integer is odd
    return ($var & 1);
}));
print_r(array_filter($array7, function ($var) {
    # [ [1] => 7 [3] => 9 [5] => 11]
    // returns whether the input integer is odd
    return ($var & 1);
}));
$array8 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
#ARRAY_FILTER_USE_KEY - callback接受键名作为的唯一参数
#ARRAY_FILTER_USE_BOTH - callback同时接受键名和键值
print_r(array_filter($array8, function ($k) {
    # [["b"]=> 2]
    return $k == 'b';
}, ARRAY_FILTER_USE_KEY));
print_r(array_filter($array8, function ($v, $k) {
    # [[b] => 2 [d] => 4]
    return $k == 'b' || $v == 4;
}, ARRAY_FILTER_USE_BOTH));

function myfun1($value, $key, $p)
{
    echo "$key $p $value". PHP_EOL;
}
array_walk($array8, "myfun1", "has the value");
echo 4555;
die;
array_reduce();

$salary = array("Maxsu" => "550000", "Vimal" => "250000", "Ratan" => "200000");
print_r(array_change_key_case($salary, CASE_UPPER)); # Array ( [SONOO] => 550000 [VIMAL] => 250000 [RATAN] => 200000 )
print_r(array_chunk($salary, 2, $preserve_keys = false));

print_r(array_reverse($season)); # 赋值新变量

echo array_search("spring", $season);

$items = array(
    [
        "uid" => 1,
        "pid" => 0,
        "views" => 100
    ],
    [
        "uid" => 2,
        "pid" => 1,
        "views" => 200
    ],
    [
        "uid" => 3,
        "pid" => 0,
        "views" => 300
    ],
    [
        "uid" => 4,
        "pid" => 0,
        "views" => 400
    ],
    [
        "uid" => 5,
        "pid" => 3,
        "views" => 500
    ]
);

array_column($items, 'uid'); # [1,2,3,4,5];
array_column($items, 'uid', 'view'); # [100=>1,200=>2,300=>3,400=>4,500=>5];

$foo = $foo * 1.3;  // $foo 现在是一个浮点数 (2.6)
$foo = 5 * "10 Little Piggies"; // $foo 是整数 (50)
$foo = 5 * "10 Small Pigs";     // $foo 是整数 (50)

function array2gbk($array)
{
    array_walk($array, function (&$value) {
        $value = iconv('utf-8', 'gbk', $value);
    });

    return $array;
}

function array2gbk1($array)
{
    $array = array_map(function ($value) {
        return iconv('utf-8', 'gbk', $value);
    }, $array);

    return $array;
}

$user = array(
    '0' => array('id' => 100, 'username' => 'a1'),
    '1' => array('id' => 101, 'username' => 'a2'),
    '2' => array('id' => 102, 'username' => 'a3'),
    '3' => array('id' => 103, 'username' => 'a4'),
    '4' => array('id' => 104, 'username' => 'a5'),
);
$username = array();
array_walk($user, function ($value, $key) use (&$username) {
    $username[] = $value['username'];
});

error_reporting(0);

$arr = [1, 3, 5, 6];
foreach ($arr as &$v) {
}
foreach ($arr as $v) {
}
var_dump($arr);

$arr2 = [["hello", "MySQl", "HTML", "CSS"]];
echo json_encode($arr2, JSON_PRETTY_PRINT).'<br>';

$countries = ["Bangladesh", "Nepal", "Bhutan"];

$key = array_search("Bangladesh", $countries);
if ($key !== false) {
    echo "Found in: ".$key;
} else {
    echo "Not found";
}

$countries = ["bangladesh", "nepal", "bhutan"];
$newCountries = array_map(function ($country) {
    return strtoupper($country);
}, $countries);
foreach ($newCountries as $country) {
    echo $country."\n";
}

$countries = ["bangladesh", "nepal", "bhutan"];
$newCountries = array_map('strtoupper', $countries);
foreach ($newCountries as $country) {
    echo $country."\n";
}

$countries = ["bangladesh", "nepal", "bhutan"];
$top = array_shift($countries);
echo $top;

$baseNumber = "123456754";
$newNumber = base_convert($baseNumber, 8, 16);
echo $newNumber;
