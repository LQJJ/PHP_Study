<html>

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
<title>学生信息列表</title>
</head>
<body>

<br/><h2>学生信息表:</h2><br/><hr/>

<?php
require_once 'StudentListClass.php';


$studentListClass = new StudentListClass();
if(!empty($_GET['pageNow'])){
    $studentListClass->pageNow = $_GET['pageNow'];
}
echo $studentListClass->printStudentList($studentListClass->pageNow);
echo $studentListClass->navgationTitle();


?>


</body>
</html>