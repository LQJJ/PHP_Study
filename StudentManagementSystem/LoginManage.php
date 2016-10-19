<?php
/**
 * Created by PhpStorm.
 * User: caozhi
 * Date: 2016/10/16
 * Time: 9:31


 */
require_once 'TeacherTableClass.php';


if(empty($_POST['t_id']) || empty($_POST['t_password'])){
    header('Location: LoginView.php?error=2');
    exit();
}

$t_id = $_POST['t_id'];
$t_password = $_POST['t_password'];

$teacherTable = new TeacherTableClass();


if($teacherTable ->checkUpId($t_id,$t_password)){
    header("Location: MainView.php?t_id=$t_id");
    exit();
}else
{
    header('Location: LoginView.php?error=1');
    exit();
}

