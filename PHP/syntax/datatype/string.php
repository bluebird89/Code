<?php

# 单引号:不会对变量进行解析
# 双引号:会对引用变量值进行解析
$name = "Laravel";
if (is_string($name)) {
    echo '$name 是字符串'.PHP_EOL;
}

$str = 'Hello text within single quote';
$str2 = "Using double \"quote\" with backslash inside double quoted string";
echo 'You can also have embedded newlines in
strings this way as it is
okay to do';

$bar = "bar
asfasfd
    dgdfgsdfgdfgf ";

// echo  print echo 最主要的区别： print 仅支持一个参数，并总是返回 1

// flush() - 刷新输出缓冲
echo lcfirst('HELLO world').PHP_EOL; // 第一个字母小写 str
echo ucfirst('hello world').PHP_EOL; // 将字符串的首字母转换为大写
echo strtolower("HELLO WOLda").PHP_EOL; // 将字符串转化为小写
echo strtoupper("hekdaf sdfa").PHP_EOL; // 将字符串转化为大写
echo ucwords("hello world").PHP_EOL; // 将字符串中每个单词的首字母转换为大写
echo strrev("Hello world!").PHP_EOL; // "!dlrow olleH" 反转字符串

// mb_strtolower() // 使字符串小写
echo str_shuffle("hello world").PHP_EOL;
echo strtr("Where $%?", ['%' => '2', '$' => 'f', '?' => 8]).PHP_EOL; //  转换指定字符
echo strtr("Where $%?", "%$?", "aao").PHP_EOL;  //  转换指定字符
// echo  quoted_printable_encode('P') . PHP_EOL; //  将 quoted-printable 字符串转换为 8-bit 字符串
// echo  quoted_printable_decode(26) . PHP_EOL; //  将 8-bit 字符串转换成 quoted-printable 字符串

echo substr("abcdef", -3).PHP_EOL; // 返回字符串的子串 返回字符串 string 由 start 和 length 参数指定的子字符串
echo substr("abcdef", -3, 1).PHP_EOL;
// mb_stripos() // 大小写不敏感地查找字符串在另一个字符串中首次出现的位置
echo strstr('name@example.com', '@').PHP_EOL; // @example.com 返回 haystack 字符串从 needle 第一次出现的位置开始到 haystack 结尾的字符串
echo strstr('name@example.com', '@', true).PHP_EOL; // name
echo strpos('abC', 'C').PHP_EOL; // 2 查找字符串首次出现的位置 没有为 false
echo strrchr("adasLinesdfs", 'L').PHP_EOL; // Linesdfs 查找指定字符在字符串中的最后一次出现之后的字符串
echo stripos('dhfgshgABC', 'ab').PHP_EOL; // 7 查找字符串首次出现的位置（不区分大小写)
echo strrpos('sasgafaBC', 'a').PHP_EOL; // 6 计算指定字符串在目标字符串中最后一次出现的位置（区分大小写)
echo strspn("42 is the answer to the 128th question.", "1234567890").PHP_EOL; // 2 计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度

// 将字符串 str 分割为若干子字符串，每个子字符串以 token 中的字符分割。如果有个字符串是 "This is an example string"，可以使用空格字符将这句话分割成独立的单词。
$string = "This is\tan example\nstring";
/* 使用制表符和换行符作为分界符 */
$tok = strtok($string, " \n\t");
while ($tok !== false) {
    echo "Word=$tok \n";
    $tok = strtok(" \n\t");
}
echo wordwrap("The quick brown fox jumped over the lazy dog.", 20, "<br />\n").PHP_EOL; // 打断字符串为指定数量的字串

echo strcasecmp(
    "Hello",
    "aello"
).PHP_EOL;// 二进制安全比较字符串(不区分大小写） 如果 str1 小于 str2 返回 < 0； 如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。
// strcmp()// 二进制安全字符串比较
echo substr_compare(
    "abcde",
    "bc",
    1,
    2
).PHP_EOL; // 0  二进制安全比较字符串（从偏移位置比较指定长度） 如果 main_str 从偏移位置 offset 起的子字符串小于 str，则返回小于 0 的数；如果大于 str，则返回大于 0 的数；如果二者相等，则返回 0。
echo substr_compare("abcde", "BC", 1, 2, true).PHP_EOL; // 0
echo substr_compare("abcde", "bc", 1, 3).PHP_EOL; // 1
echo substr_compare("abcde", "cd", 1, 2).PHP_EOL; // -1

// 计算字串出现的次数
$text = 'This is a test';
echo substr_count($text, 'is').PHP_EOL; // 2
echo substr_count($text, 'is', 3).PHP_EOL; // 1 字符串被简化为 's is a test'，因此输出 1
echo substr_count($text, 'is', 3, 3).PHP_EOL; // 0 字符串被简化为 's i'，所以输出 0

echo addcslashes('foo[ ]', 'A..z').PHP_EOL; // \f\o\o\[ \] 以 C 语言风格使用反斜线转义字符串中的字符
echo addslashes("Is your name O'reilly?").PHP_EOL; // Is your name O\'reilly? 使用反斜线引用字符串单引号（'）、双引号（"）、反斜线（\）与 NUL
echo stripcslashes("\H\o\o\[ \]").PHP_EOL; // 反引用一个使用 addcslashes 转义的字符串
// stripslashes() // 反引用一个引用字符串

echo strip_tags('<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>').PHP_EOL;// 从字符串中去除 HTML 和 PHP 标记
// quotemeta() // 转义元字符集
echo "\n";

// 97 0x61 a
echo bin2hex('a').PHP_EOL; // 61 二进制字符串转换为十六进制值 高四位字节优先
echo hex2bin('6578616d706c65206865782064617461').PHP_EOL; // example hex data 十六进制字符串为二进制字符串
echo chr(97).PHP_EOL; # 对应于 ascii 所指定的单个字符
echo ord('a').PHP_EOL;  # 97 返回字符串 string 第一个字符的 ASCII 码值
// pack(); // Pack data into binary string

// rtrim() 删除字符串末端的空白字符 chop — rtrim() 的别名
// 不使用第二个参数，rtrim() 仅删除以下字符：
// " " (ASCII 32 (0x20))，普通空白符。
// "\t" (ASCII 9 (0x09))，制表符。
// "\n" (ASCII 10 (0x0A))，换行符。
// "\r" (ASCII 13 (0x0D))，回车符。
// "\0" (ASCII 0 (0x00))，NUL 空字节符。
// "\x0B" (ASCII 11 (0x0B))，垂直制表符。
$text = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello = "Hello World";
var_dump($text, $binary, $hello);
print "\n";

var_dump(rtrim($text));
var_dump(rtrim($text, " \t."));
var_dump(ltrim($text)); // 删除字符串开头的空白字符（或其他字符）
var_dump(trim("\t\tThese are a few words :) ...  ")); // 去除字符串首尾处的空白字符（或者其他字符）
var_dump(rtrim($hello, "Hdle"));
var_dump(rtrim($binary, "\x00..\x1F")); // 删除 $binary 末端的 ASCII 码控制字符 (包括 0 - 31)

echo chunk_split(base64_encode("hello world"), 5, ";").PHP_EOL; # aGVsb;G8gd2;9ybGQ;=; 字符串分割成小块
print_r(str_split("Hello Friend", 3)); // 将字符串转换为数组
print_r(explode(
    " ",
    "piece1 piece2 piece3 piece4 piece5 piece6",
    4
)); // 使用一个字符串分割另一个字符串 由字符串组成的数组，每个元素都是 string 的一个子串，它们被字符串 delimiter 作为边界点分割出来
echo implode(",", ['lastname', 'email', 'phone']).PHP_EOL; // 一维数组的值连接为一个字符串 join 同名函数

// split() // 用正则表达式将字符串分割到数组中
// preg_split() // 通过一个正则表达式分隔字符串
// mb_split() // 使用正则表达式分割多字节字符串

// 返回字符串中单词的使用情况
// 0 - 返回单词数量
// 1 - 返回一个包含 string 中全部单词的数组
// 2 - 返回关联数组。数组的键是单词在 string 中出现的数值位置，数组的值是这个单词
$str = "Hello fri3nd, you're
       looking       Hello   good today!";
echo str_word_count($str).PHP_EOL; // 7
print_r(str_word_count($str, 2));
print_r(str_word_count($str, 1, 'àá??3'));

echo "/-------------- 编码-----------/".PHP_EOL;
echo 'sha1_file(__FILE__):'.sha1_file(__FILE__).PHP_EOL; // 计算文件的 sha1 散列值,一个 40 字符长度的十六进制数字 动态
echo 'sha1_file(__FILE__) with  raw_output:'.sha1_file(__FILE__, true).PHP_EOL; // 以 20 字符长度的原始格式返回
echo 'md5_file(__FILE__):'.md5_file(__FILE__).PHP_EOL; // 计算指定文件的 MD5 散列值 32 字符的十六进制数字

echo "sha1('PHP'):".sha1('PHP').PHP_EOL; // 计算字符串的 sha1 散列值 静态
echo "sha1('PHP') with raw_output:".sha1('PHP', true).PHP_EOL; // 计算字符串的 sha1 散列值
echo "crc32('PHP'):".crc32('PHP').PHP_EOL; // 计算一个字符串的 crc32 多项式
echo 'md5():'.md5('apple').PHP_EOL; // 计算字符串的 MD5 散列值
// echo 'hash()' . hash() . PHP_EOL; // 生成哈希值 （消息摘要）
echo 'crypt():'.crypt('mypassword', 'r1').PHP_EOL;// 单向字符串散列 返回一个基于标准 UNIX DES 算法或系统上其他可用的替代算法的散列字符串

$hashed_password = crypt('mypassword', 'sasdfascdadgsgasg'); // 自动生成盐值
/* 应当使用 crypt() 得到的完整结果作为盐值进行密码校验，以此来避免使用不同散列算法导致的问题。（如上所述，基于标准 DES 算法的密码散列使用 2 字符盐值，但是基于 MD5 算法的散列使用 12 个字符盐值。）*/
if (hash_equals($hashed_password, crypt('mypassword', $hashed_password))) {
    echo "Password verified!";
}

// hash_equals() // 可防止时序攻击的字符串比较
// password_hash() // 创建密码的散列（hash）
// echo 'password_hash()' . password_hash() . PHP_EOL; // 创建密码的散列（hash）
echo base64_encode('This is an encoded string').PHP_EOL;//  VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw== 使用 MIME base64 对数据进行编码,为了使二进制数据可以通过非纯 8-bit 的传输层传输，例如电子邮件的主体 要比原始数据多占用 33% 左右的空间
echo convert_uuencode("I love PHP!").PHP_EOL; // 使用 uuencode 算法对一个字符串进行编码 字符串转化为可输出的字符， 并且可以被安全的应用于网络传输。使用 uuencode 编码后的数据 将会比源数据大35%左右
echo convert_uudecode("+22!L;W9E(%!(4\"$`\n`").PHP_EOL;// 解码一个 uuencode 编码的字符串
echo similar_text('Hello', 'hello').PHP_EOL; // 计算两个字符串的相似度 4
// levenshtein() // 计算两个字符串之间的编辑距离
echo soundex("Euler").soundex("Ellery").PHP_EOL; // Calculate the soundex key of a string E460E460

// 统计 string 中每个字节值（0..255）出现的次数
// 0 - 以所有的每个字节值作为键名，出现次数作为值的数组。
// 1 - 与 0 相同，但只列出出现次数大于零的字节值。
// 2 - 与 0 相同，但只列出出现次数等于零的字节值。
// 3 - 返回由所有使用了的字节值组成的字符串。
// 4 - 返回由所有未使用的字节值组成的字符串。
print_r(count_chars("Two Ts and one F.", 1));

// setlocale(); //设置地区信息
echo str_repeat("-=", 3).PHP_EOL; // -=-=-= 重复一个字符串

echo str_ireplace("%body%", "black", "<body text=%BODY%>").PHP_EOL; //  str_replace() 的忽略大小写版本 <body text=black>
echo str_replace(
    ["fruits", "vegetables", "fiber"],
    ["pizza", "beer", "ice cream"],
    "You should eat fruits, vegetables, and fiber every day."
).PHP_EOL; // 子字符串替换
echo str_replace(["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"], "", "Hello World of PHP").PHP_EOL;

echo substr_replace('ABCDEFGH:/MNRPQR/', 'bob', 0, 0).PHP_EOL;
print_r(substr_replace(
    ['A: XXX', 'B: XXX', 'C: XXX'],
    'YYY',
    3,
    3
)); // 替换字符串的子串 在字符串 string 的副本中将由 start 和可选的 length 参数限定的子字符串使用 replacement 进行替换
print_r(substr_replace(['A: XXX', 'B: XXX', 'C: XXX'], ['AAA', 'BBB', 'CCC'], 3, 3));
die;
// preg_replace() //执行一个正则表达式的搜索和替换

//  input 被从左端、右端或者同时两端被填充到制定长度后的结果
$input = "Alien";
echo str_pad($input, 10);                      // 输出 "Alien     "
echo str_pad($input, 10, "-=", STR_PAD_LEFT);  // 输出 "-=-=-Alien"
echo str_pad($input, 10, "_", STR_PAD_BOTH);   // 输出 "__Alien___"
echo str_pad($input, 6, "___");               // 输出 "Alien_"

// % - a literal percent character. No argument is required.
// b - treated as an integer and presented as a binary number.
// c - treated as an integer and presented as the character with that ASCII value.
// d - treated as an integer and presented as a (signed) decimal number.
// e - treated as scientific notation (e.g. 1.2e+2). The precision specifier stands for the number of digits after the decimal point since PHP 5.2.1. In earlier versions, it was taken as number of significant digits (one less).
// E - like %e but uses uppercase letter (e.g. 1.2E+2).
// f - treated as a float and presented as a floating-point number (locale aware).
// F - treated as a float and presented as a floating-point number (non-locale aware). Available since PHP 5.0.3.
// g - shorter of %e and %f.
// G - shorter of %E and %f.
// o - treated as an integer and presented as an octal number.
// s - treated as and presented as a string.
// u - treated as an integer and presented as an unsigned decimal number.
// x - treated as an integer and presented as a hexadecimal number (with lowercase letters).
// X - treated as an integer and presented as a hexadecimal number (with uppercase letters).
echo sprintf(
    'There are %d monkeys in the %s',
    5,
    'tree'
).PHP_EOL; // Return a formatted string There are 5 monkeys in the tree
echo sprintf('The %2$s contains %1$d monkeys', 5, 'tree').PHP_EOL; // The tree contains 5 monkeys
echo sprintf('The %2$s contains %1$04d monkeys', 5, 'tree').PHP_EOL; // The tree contains 0005 monkeys
echo sprintf("%'.9d\n", 123); // ......123
echo sprintf("%'.09d\n", 123); // 000000123

$n = 43951789;
$u = -43951789;
$c = 65; // ASCII 65 is 'A'
// notice the double %%, this prints a literal '%' character
printf("%%b = '%b'\n", $n); // binary representation
printf("%%c = '%c'\n", $c); // print the ascii character, same as chr() function
printf("%%d = '%d'\n", $n); // standard integer representation
printf("%%e = '%e'\n", $n); // scientific notation
printf("%%u = '%u'\n", $n); // unsigned integer representation of a positive integer
printf("%%u = '%u'\n", $u); // unsigned integer representation of a negative integer
printf("%%f = '%f'\n", $n); // floating point representation
printf("%%o = '%o'\n", $n); // octal representation
printf("%%s = '%s'\n", $n); // string representation
printf("%%x = '%x'\n", $n); // hexadecimal representation (lower-case)
printf("%%X = '%X'\n", $n); // hexadecimal representation (upper-case)
printf("%%+d = '%+d'\n", $n); // sign specifier on a positive integer
printf("%%+d = '%+d'\n", $u); // sign specifier on a negative integer

list($serial) = sscanf("SN/2350001", "SN/%d"); // 根据指定格式解析输入的字符
list($month, $day, $year) = sscanf("January 01 2000", "%s %d %d");
echo "Item $serial was manufactured on: $year-".substr($month, 0, 3)."-$day\n";

print_r(str_getcsv('henry,lee,Shanhai'));

// ENT_COMPAT  Will convert double-quotes and leave single-quotes alone. 转换双引号，不转换单引号
// ENT_QUOTES  Will convert both double and single quotes. 单引号和双引号都转换
// ENT_NOQUOTES    Will leave both double and single quotes unconverted. 单引号和双引号都不转换
// &  "  ' < >
echo htmlspecialchars(
    "<a href='test'>Test</a>",
    ENT_QUOTES
).PHP_EOL; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt; 将特殊字符转换为 HTML 实体
echo htmlspecialchars_decode("<p>this -&gt; &quot;</p>\n").PHP_EOL;// 将特殊的 HTML 实体转换回普通字符

$orig = "I'll \"walk\" the <b>dog</b> now";
$a = htmlentities($orig, ENT_COMPAT | ENT_HTML401, ini_get("default_charset")); // 将字符转换为 HTML 转义字符
echo $a.PHP_EOL;
echo html_entity_decode($a).PHP_EOL; // Convert all HTML entities to their applicable characters

// strip_tags() // 从字符串中去除 HTML 和 PHP 标记
echo nl2br("foo isn't\n bar").PHP_EOL; // 在字符串所有新行之前插入 HTML 换行标记

parse_str("first=value&arr[]=foo+bar&arr[]=baz", $output);
print_r($output);

// 提供第一个参数，number的小数部分会被去掉 并且每个千位分隔符都是英文小写逗号","
// 如果提供两个参数，number将保留小数点后的位数到你设定的值，其余同楼上
// 如果提供了四个参数，number 将保留decimals个长度的小数部分, 小数点被替换为dec_point，千位分隔符替换为thousands_sep
echo number_format(1234.56).PHP_EOL; // 1,235  以千位分隔符方式格式化一个数字
echo number_format(1234.56, 2, ',', ' ').PHP_EOL;// 1 234,56
echo number_format(1234.5678, 2, '.', '').PHP_EOL; // 1234.57

// ROT13 编码简单地使用字母表中后面第 13 个字母替换当前字母，同时忽略非字母表中的字符。编码和解码都使用相同的函数，传递一个编码过的字符串作为参数，将得到原始字符串。
echo str_rot13('PHP 4.3.0').PHP_EOL; // CUC 4.3.0
echo str_rot13('CUC 4.3.0').PHP_EOL; // PHP 4.3.0

# char length eng and chn
echo 'hello world'.'<br>';
echo 'ｈｅｌｌｏ　ｗｏｒｌｄ'.' length:'.strlen('ｈｅｌｌｏ　ｗｏｒｌｄ').'<hr>';

//自动移除字符串中的 HTML 标记
$text = strip_tags($input, "");

//获取 $start 和 $end 之间的文本
function GetBetween($content, $start, $end)
{
    $r = explode($start, $content);
    if (isset($r[1])) {
        $r = explode($end, $r[1]);
        return $r[0];
    }

    return null;
}

//将 URL 转换为超链接
$url = "服务器运维与架构(http://www.ha97.com)";
$url = preg_replace("#http://([A-z0-9./-]+)#", '$0', $url);

//将文本分割为 140 字符的数组
function split_to_chunks($to, $text)
{
    $total_length = (140 - strlen($to));
    $text_arr = explode(" ", $text);
    $i = 0;
    $message[0] = "";
    foreach ($text_arr as $word) {
        if (strlen($message[$i].$word.' ') <= $total_length) {
            if ($text_arr[count($text_arr) - 1] == $word) {
                $message[$i] .= $word;
            } else {
                $message[$i] .= $word.' ';
            }
        } else {
            $i++;
            if ($text_arr[count($text_arr) - 1] == $word) {
                $message[$i] = $word;
            } else {
                $message[$i] = $word.' ';
            }
        }
    }
    return $message;
}

//从字符串中移除 URL
$string = preg_replace('/b(https?|ftp|file)://[-A-Z0-9+&@#/%?=~_|$!:,.;]*[A-Z0-9+&@#/%=~_|$]/i', '', $string);

//转换字符串为缩略标题
function slug($str)
{
    $str = strtolower(trim($str));
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = preg_replace('/-+/', '-', $str);
    return $str;
}

//  解析 CSV 文件
$fh = fopen("contacts.csv", "r");
while ($line = fgetcsv($fh, 1000, ",")) {
    echo "Contact: {$line[1]}";
}

//检索字符串中的另一个字符串
function contains($str, $content, $ignoreCase = true)
{
    if ($ignoreCase) {
        $str = strtolower($str);
        $content = strtolower($content);
    }

    return strpos($content, $str) ? true : false;
}

// 检测某个字符串是否以指定的模式开始
function String_Begins_With($needle, $haystack)
{
    return (substr($haystack, 0, strlen($needle)) == $needle);
}

//从字符串中提取电子邮件地址
function extract_emails($str)
{
    // This regular expression extracts all emails from a string:
    $regexp = '/([a-z0-9_.-])+@(([a-z0-9-])+.)+([a-z0-9]{2,4})+/i';
    preg_match_all($regexp, $str, $m);

    return isset($m[0]) ? $m[0] : array();
}
