<?php

/**
create table teacher(
t_id  int(8)  not null primary key unique,
t_name  varchar(8) not null,
t_password varchar(64) not null
);

insert into teacher(t_id , t_name , t_password) values(321,'曹志2',md5('321'));
 */
class Teacher
{

    private $id;
    private $name;
    private $password;


    public function __construct($id ,$name,$password)
    {
        $this ->id = $id;
        $this ->name = $name;
        $this ->password = $password;
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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }



}