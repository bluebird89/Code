<?php

header('Location: http://example.com', true, 301);
exit;
?>

<?php
header('ocation: /page2.php');
exit;
?>

<?php
$url = 'http://'.$_SERVER['HTTP_HOST']; // Get server
$url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); // Get current directory
$url .= '/relative/path/to/page/'; // relative path
header('Location: '.$url, true, 302);
?>

<?php
session_start();
if (!isset($_SESSION['authorized-user'])) {
    header('location:../');
    exit();
}
?>

<?php
header('location: page1.php');
echo 'moving to page 2';
header('location: page2.php'); //replaces page1.php
?>

<?php
header('refresh:5;url=/page6.php');
echo 'Redirecting in 5 secs. Click here to go directly <a href=”/page6.php”>here</a>.';
?>

<?php
ob_start(); //this has to be the first line of your page
header('Location: page2.php');
ob_end_flush(); //this has to be the last line of your page
?>


<?php
echo '<script type=”text/javascript”>
window.location = “http:/example.com/”
</script>';
?>

<?php
header('Location: http://www.baidu.com');
echo '<meta http-equiv="Refresh" content="0;url=http://www.baidu.com" >';
echo '<script>window.location.href="www.baidu.com"</script>';
