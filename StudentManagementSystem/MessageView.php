<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>温馨提醒</title>
</head>


<body>
<?php
/**
 * Created by PhpStorm.
 * User: caozhi
 * Date: 2016/10/18
 * Time: 16:47
 */
if(empty($_GET['update'])) die('系统出错');
$update = $_GET['update'];
$pageNow = $_GET['pageNow'];
if($update ==0 ) {
    echo "<font color='red'>操作失败！<font/>";
}elseif($update == 1){
    echo "<font color='green'>操作成功！<font/>";
}else{
    echo "<font color='red'>信息没更改！<font/>";
}
echo "
    <br/>
    <a href=\"StudentListView.php?pageNow=$pageNow\">返回<a/>
    "
?>

</body>
<html/>

