<?php
class Student
{
    public $name;
    public $gender;
    public $age;


    public static $sumStu=0;

    const CONSTANT = 'Hello World';

    public function __construct($name, $age, $gender)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        self::$sumStu +=1;

        echo $name. '加入学校' . ', 当前有' . self::$sumStu . '个学生';

    }

    /**
     * @desc 获取学生的信息
     */
    public function getInfo()
    {
        echo "name is " . $this->name;
        echo 'age is ' . $this->age;
        echo 'gender is ' . $this->gender;
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo 'over';
    }


}

$stu3 = new Student('aass', 123, '女');
$stu3 = new Student('aass', 123, '女');



