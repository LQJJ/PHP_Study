


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>管理页面</title>
</head>
<body>
<?php

require_once 'TeacherTableClass.php';

$teacherTable = new TeacherTableClass();
$teacher = $teacherTable ->getTeacherById($_GET['t_id']);
echo "欢迎{$teacher->getName()}登陆！<br/><br/>";
echo "<a href='LoginView.php'>注销登陆</a><hr/><br/>";

    ?>
    <h2>主界面</h2><br/>
    <table>
        <tr>
            <td><a href="StudentListView.php">管理用户</a></td>
        </tr>
    <tr>
        <td><a href="#">添加用户</a></td>
    </tr>    <tr>
        <td><a href="#">查询用户</a></td>
    </tr>    <tr>
        <td><a href="#">退出系统</a></td>
    </tr>
</table>

</body>
</html>



