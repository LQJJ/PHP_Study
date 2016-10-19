<?php

/**
create table student(
s_id  int(8) auto_increment  not null primary key ,
s_name  varchar(8) not null,
s_age int(3) not null,
s_php int(3) not null,
s_gender varchar(2) not null
);

insert into student( s_name , s_age ,s_php,s_gender) values('打电话',22,87，'男3');
insert into student( s_name , s_age ,s_php,s_gender) select s_name , s_age ,s_php,s_gender from student;
select count(t_id) from student;
 */
class StudentClass
{

    private $id;
    private $name;
    private $age;
    private $php;
    private $gender;

    public function __construct($id,$name,$age,$php,$gender)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->php = $php;
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getPhp()
    {
        return $this->php;
    }

    /**
     * @param mixed $php
     */
    public function setPhp($php)
    {
        $this->php = $php;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }


}