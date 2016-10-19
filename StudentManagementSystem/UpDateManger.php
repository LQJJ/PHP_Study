<?php
/**
 * Created by PhpStorm.
 * User: caozhi
 * Date: 2016/10/18
 * Time: 11:30
 */

require_once 'StudentTbaleClass.php';

if(empty($_GET['flag'])) die('系统有误');

$flag = $_GET['flag'];


if(!empty($_GET['pageNow'])){
    $pageNow = $_GET['pageNow'];
}

if($flag == 'update') {

    $id = $_POST['s_id'];
    $name = $_POST['s_name'];
    $age = $_POST['s_age'];
    $php = $_POST['s_PHP'];
    $gender = $_POST['s_gender'];


    $student = new StudentClass($id, $name, $age, $php, $gender);
    $res = StudentTbaleClass::updateStudent($student);


}elseif($flag == 'delete'){
    $s_id = $_GET['s_id'];
    $res = StudentTbaleClass::deleteStudentById($s_id);
}elseif($flag == 'add'){
    $name = $_POST['s_name'];
    $age = $_POST['s_age'];
    $php = $_POST['s_PHP'];
    $gender = $_POST['s_gender'];
    $student = new StudentClass($id, $name, $age, $php, $gender);
    $res = StudentTbaleClass::addStudent($student);
}
$pageNow = StudentTbaleClass::getPageCount(8);
header("Location:MessageView.php?update=$res&pageNow=$pageNow");
