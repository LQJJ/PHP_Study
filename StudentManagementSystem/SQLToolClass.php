<?php

/**
 * Created by PhpStorm.
 * User: caozhi
 * Date: 2016/10/16
 * Time: 10:27
 */
class SQLToolClass
{
    private $host = '127.0.0.1';
    private $userName = 'root';
    private $passWord = 'root';
    private $dataBase = 'student_manage_system';
    private $connect;
    public function __construct()
    {
       $this->connect = mysql_connect($this->host,$this->userName,$this->passWord) or die(mysql_error());
        mysql_select_db($this->dataBase,$this->connect) or die(mysql_error());
        mysql_query('set names utf8',$this ->connect) or die(mysql_error());
    }
    public function SQL_DDL($sql){
       $b = mysql_query($sql,$this->connect) or die(mysql_error());
        if(!$b){
            return 0;
        }else
        {
          $count = mysql_affected_rows($this->connect);
            if($count){
                return 1;
            }else{
                return 2;
            }

        }

    }
    public function SQL_DQL($sql){
        $res = mysql_query($sql,$this->connect) or die(mysql_error());

            $resArray =  Array();
            while($rows = mysql_fetch_assoc($res)){
                $resArray[] = $rows;
            }
            mysql_free_result($res);
            return $resArray;

    }
    public function SQL_DHL($sql){

        $res = mysql_query($sql,$this->connect) or die(mysql_error());
        $col = mysql_num_fields($res);
        $resArray = Array();
        for($i=0; $i < $col; $i++){
            $resArray[] = mysql_field_name($res,$i);
        }
        mysql_free_result($res);
        return $resArray;

    }
    public function connectClose(){
        mysql_close($this->connect);
    }
}