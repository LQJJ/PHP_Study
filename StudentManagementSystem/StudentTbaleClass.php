<?php


require_once 'SQLToolClass.php';
require_once 'StudentClass.php';

/**
 * Created by PhpStorm.
 * User: caozhi
 * Date: 2016/10/16
 * Time: 15:32
 */
class StudentTbaleClass
{

    static public function deleteStudentById($id){
        $sqlTool = new SQLToolClass();
        $sql = "delete from student where s_id = $id;";
        $res = $sqlTool ->SQL_DDL($sql);
        $sqlTool ->connectClose();
        return $res;
    }
    /*
     *  更新用户信息
     */
    static public function updateStudent($student){
        $id = $student->getId();
        $name = $student->getName();
        $age = $student->getAge();
        $php = $student->getPhp();
        $gender = $student->getGender();

        $sqlTool = new SQLToolClass();
        $sql = "update student
                set s_id = $id,
                    s_name = '$name',
                    s_age = $age,
                    s_PHP = $php,
                    s_gender = '$gender'
                where s_id = $id;";
       $res = $sqlTool ->SQL_DDL($sql);
        $sqlTool ->connectClose();
        return $res;
    }

    static public function getStudentById($id)
    {
        $sqlTool = new SQLToolClass();
        $sql = "select * from student where s_id = $id;";
        $res = $sqlTool->SQL_DQL($sql);
        $sqlTool->connectClose();
        if (count($res)) {
            $id = $res[0]['s_id'];
            $name = $res[0]['s_name'];
            $age = $res[0]['s_age'];
            $php = $res[0]['s_PHP'];
            $gender = $res[0]['s_gender'];
            $student = new StudentClass($id, $name, $age, $php, $gender);
            return $student;
        }
        return null;
    }

    /*
     * * $pageSize 每一页的大小
     */
    static public function getPageCount($pageSize)
    {
        $sqlTool = new SQLToolClass();
        $sql = "select count(s_id) from student;";
        $res = $sqlTool->SQL_DQL($sql);
        $pageCount = 0;
        if (count($res)) {
            $pageCount = ceil($res[0]['count(s_id)'] / $pageSize);
        }
        $sqlTool->connectClose();
        return $pageCount;
    }

    static public function getTbaleHeader()
    {
        $sqlTool = new SQLToolClass();
        $sql = "select * from student limit 0,0;";
        $res = $sqlTool->SQL_DHL($sql);

        if (count($res)) {
            array_push($res, '修改用户');
            array_push($res, '删除用户');
            return $res;
        }
        $sqlTool->connectClose();
        return null;
    }
    /*
     * 获取某一页Student信息
     */
    static public function getPageStudent($pageNum, $pageSize)
    {

        $startIndex = ($pageNum - 1) * $pageSize;

        $sqlTool = new SQLToolClass();
        $sql = "select * from student limit $startIndex,$pageSize;";
        $res = $sqlTool->SQL_DQL($sql);
        $sqlTool->connectClose();
        if (count($res)) {
            return $res;
        }
        return null;
    }
}


?>

