<?php
require_once 'SQLToolClass.php';
require_once 'TeacherClass.php';
/**
 * Created by PhpStorm.
 * User: caozhi
 * Date: 2016/10/16
 * Time: 10:17
 */
class TeacherTableClass
{
    public function checkUpId($id,$password){
        $sqlTool = new SQLToolClass();
        $sql = "select t_password from teacher where t_id = $id;";
        $res = $sqlTool ->SQL_DQL($sql);

        if(count($res)){
            if(md5($password) == $res[0]['t_password']){
                return 1;
            }
        }
        $sqlTool->connectClose();
        return 0;
    }
    public function getTeacherById($id){
        $sqlTool = new SQLToolClass();
        $sql = "select * from teacher where t_id = $id;";
        $res = $sqlTool ->SQL_DQL($sql);
        $sqlTool->connectClose();
        if(count($res)){

            $id = $res[0]['t_id'];
            $name = $res[0]['t_name'];
            $password = $res[0]['t_password'];
            $teacher = new Teacher($id,$name,$password);
            return $teacher;
        }

        return null;
    }
}


