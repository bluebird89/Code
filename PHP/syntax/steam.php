<?php

$handle = opendir('.');
while (false !== ($file = readdir($handle))) {
    $files[] = $file;
}
closedir($handle);
print_r($files);

if (!($fp = fopen('date.txt', 'w'))) {
    return;
}
fprintf($fp, "%04d-%02d-%02d", 2020, 4, 3); // 写入一个根据 format 格式化后的字符串到 由 handle 句柄打开的流中

file_put_contents('test1.txt', '你好');  // 快速写入内容到文件 test.txt（不存在则自动创建）
$context = file_get_contents('test1.txt');
var_dump($context);

$file = fopen('test2.txt', 'w');   // 以写入模式打开文件 test2.txt，不存在则创建自动创建
fwrite($file, '你好，');   // 通过 fwrite 写入内容到文件
fwrite($file, ' world！');  // 继续写入
fclose($file);  // 关闭这个文件句柄

$file = fopen('test2.txt', 'r');  // 只读模式打开 test2.txt 文件
$context = '';
while (!feof($file)) {    // 还没有到文件末尾，则继续读取
    $context .= fread($file, 1024);   // 通过 fread 读取指定字节内容
}
fclose($file);
var_dump($context);

// 删除上述文件
unlink('test1.txt');
unlink('test2.txt');

# 读取
$filename = "./test.txt";
$handle = fopen($filename, "r");//open file in read mode
$contents = fread($handle, filesize($filename));//read file
echo $contents;//printing data of file
fclose($handle);//close file

# 写入并加
$fp = fopen(__DIR__.'/lock.txt', 'w+');
if (flock($fp, LOCK_EX)) {
    fwrite($fp, 'write something');
    flock($fp, LOCK_UN);
} else {
    echo "file is locking...";
}
fclose($fp);

# 追加
$fp = fopen(__DIR__.'/data.txt', 'a');//opens file in append mode
fwrite($fp, ' this is additional text ');
fwrite($fp, 'appending data');
fclose($fp);
echo "File appended successfully";

# 删除
$status = unlink(__DIR__.'/data.txt');
if ($status) {
    echo "File deleted successfully";
} else {
    echo "Sorry!";
}

$fp = fopen("./test1.txt", "r");//open file in read mode

while (!feof($fp)) {
    echo fgetc($fp);
}
fclose($fp);
?>

    # uploadform.html
    <form action="uploader.php" method="post" enctype="multipart/form-data">
        选择上传的文件:
        <input type="file" name="fileToUpload"/>
        <input type="submit" value="Upload Image" name="submit"/>
    </form>

<?php
$target_path = "D:/";
$target_path = $target_path.basename($_FILES['fileToUpload']['name']);

if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {
    echo "File uploaded successfully!";
} else {
    echo "Sorry, file not uploaded, please try again!";
}

$file_url = 'http://www.myremoteserver.com/file.exe';
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"".basename($file_url)."\"");
readfile($file_url);

echo "1) ".basename("/etc/sudoers.d", ".d").PHP_EOL;
echo "2) ".basename("/etc/passwd").PHP_EOL;
echo "3) ".basename("/etc/").PHP_EOL;
echo "4) ".basename(".").PHP_EOL;
echo "5) ".basename("/");
print_r(pathinfo("./debug.log"));

/**
 * 根据 id 获取机构二级目录名称
 *
 * @param $id
 *
 * @return mixed|string
 */
function getTwoPhraseOranizationById($id)
{
    $selfInfo = Organization::find()->select('id,title,parent_id')->where(['id' => $id])->asArray()->one();

    if ($selfInfo['parent_id'] > 0) {
        $parentInfo = Organization::getTwoPhraseOranizationById($selfInfo['parent_id']);

        if (null != $parentInfo) {
            return $parentInfo.'-'.$selfInfo['title'];
        }
    }

    return $selfInfo['title'];
}

$handle = fopen('test.txt', 'rb');
stream_filter_append($handle, 'string.toupper');
while (feof($handle) !== true) {
    echo fgets($handle);
}
fclose($handle);

$handle = fopen('php://filter/read=string.toupper/resource=test.txt', 'rb');
while (feof($handle) !== true) {
    echo fgets($handle);
}
fclose($handle);

