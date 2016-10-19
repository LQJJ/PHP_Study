
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>修改用户信息</title>
</head>
<body>

<?php
require_once 'StudentTbaleClass.php';
if(empty($_GET['s_id'])) die();
$pageNum = $_GET['pageNow'];
$student = StudentTbaleClass::getStudentById($_GET['s_id']);
$id = $student->getId();
$name = $student->getName();
$age = $student->getAge();
$php = $student->getPhp();
$gender = $student->getGender();
echo"
<form action=\"UpDateManger.php?pageNow=$pageNum&flag=update\" method=\"post\">
ID号: <input type='text' name='s_id' readonly value='$id' ><br/>
姓名: <input type='text' name='s_name' value='$name' ><br/>
年龄: <input type='text' name='s_age' value='$age' ><br/>
PHP : <input type='text' name='s_PHP' value='$php' ><br/>
性别: <input type='text' name='s_gender' value='$gender'><br/>
      <input  type='submit' value='确认'/>
</form>
";
?>



</body>
</html>
