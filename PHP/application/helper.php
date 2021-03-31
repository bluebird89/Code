<?php

if (!function_exists('redirect')) {
    function redirect($route, $statusCode = 301)
    {
        $response = new \Application\services\Http\Response('', $statusCode, ['Location' => $route]);
        $response->send();
        exit();
    }
}

/**
 * 对数据进行编码转换
 *
 * @param  array/string $data 数组
 * @param  string  $input   需要转换的编码
 * @param  string  $output  转换后的编码
 */
function array_iconv($data, $input = 'gbk', $output = 'utf-8')
{
    if (!is_array($data)) {
        return iconv($input, $output, $data);
    } else {
        foreach ($data as $key => $val) {
            if (is_array($val)) {
                $data[$key] = array_iconv($val, $input, $output);
            } else {
                $data[$key] = iconv($input, $output, $val);
            }
        }
        return $data;
    }
}

/**
 * 检测输入中是否含有错误字符
 *
 * @param  char  $string  要检查的字符串名称
 *
 * @return TRUE or FALSE
 */
function is_badword($string)
{
    $badwords = array("\\", '&', ' ', "'", '"', '/', '*', ',', '<', '>', "\r", "\t", "\n", "#");
    foreach ($badwords as $value) {
        if (strpos($string, $value) !== false) {
            return true;
        }
    }
    return false;
}

/**
 * 生成随机字符串
 *
 * @param  string  $lenth  长度
 *
 * @return string 字符串
 */
function create_randomstr($lenth = 6)
{
    return random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
}

/**
 * 对用户的密码进行加密
 *
 * @param $password
 * @param $encrypt  //传入加密串，在修改密码时做认证
 *
 * @return array/password
 */
function password($password, $encrypt = '')
{
    $pwd = array();
    $pwd['encrypt'] = $encrypt ? $encrypt : create_randomstr();
    $pwd['password'] = md5(md5(trim($password)).$pwd['encrypt']);
    return $encrypt ? $pwd['password'] : $pwd;
}
