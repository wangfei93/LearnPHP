<?php
class Teacher
{
    public $name;
    public $gender;
    public  $age;
    public $subject;

    public function __construct($name, $gender, $age , $subject)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->subject = $subject;
    }

    

    public function introduce()
    {
        return 'my name is ' . $this->name . ',  gender is ' . $this->gender . ', age is ' . $this->age . ', subject is ' . $this->subject;

    }

}


$teacher = new Teacher('wang', '男', 13, 'math');
var_dump($teacher->introduce());