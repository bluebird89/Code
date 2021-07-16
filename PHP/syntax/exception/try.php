<?php

class UserModel
{
    public function login($username = '', $password = '')
    {
        if (!$username) {
            // 用户不存在
            throw new Exception('用户不存在', '404');
        }

        if (!$password) {
            // 密码错误
            throw new Exception('密码错误', '400');
        }
    }
}

class UserController
{
    public function login($username = '', $password = '')
    {
        try {
            $model = new UserModel();
            $res = $model->login($username, $password);
            // 如果需要的话，我们可以在这里统一commit数据库事务
            // $db->commit();
        } catch (Exception $e) {
            // 如果需要的话，我们可以在这里统一rollback数据库事务
            // $db->rollback();
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }
    }
}

print_r((new UserController())->login('henry'));

class Oss
{
    public static function connect()
    {
        throw new Exception("oss connect error");
        return 'oss object';
    }
}

//调用三层
class S3
{
    public static function connect()
    {
        // throw new Exception("s3 connect error");
        return 's3 object';
    }
}

//调用二层
function callReader($class)
{
    try {
        $pdo = call_user_func_array(array($class, "connect"), array());
        return $pdo;
    } catch (Exception $e) {
        throw $e;
    } finally {
        //无论如何都会执行,在这记录日志
    }
}

//调用一层
function getMessage()
{
    $pdo = null;
    try {
        $pdo = callReader('Oss');
    } catch (Exception $e1) {
        $pdo = callReader('S3');
    }

    return $pdo;
}

//最先的入口
try {
    var_dump(getMessage());
} catch (Exception $e) {
}
