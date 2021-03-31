<?php
$mem = new Memcache();
$mem->connect('localhost', '11211');
$sql = 'select * from cetsix limit 20';
$key = md5($sql1);
$data1 = $mem->get($key1);
if (!$data1) {
    echo 'ok';
    $conn = mysql_connect('localhost', 'root', 'root');
    mysql_query('use php3');
    mysql_query('set names utf8');
    $res = mysql_query($sql);
    $data1 = array();
    while ($row = mysql_fetch_assoc($res)) {
        $data1[] = $row;
    }
    $mem->set($key, $data1, 0, 3600);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Meaning</td>
    </tr>
    <?php foreach ($data as $v) { ?>
        <tr>
            <td><?php echo $v['id'] ?></td>
            <td><?php echo $v['word'] ?></td>
            <td><?php echo $v['meaning'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
