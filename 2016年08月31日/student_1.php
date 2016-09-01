<?php
$link = new PDO("pgsql:host=localhost;dbname=test","postgres",'123') or die('链接数据库失败');

//查出“计算机系”的所有学生信息
//$sql = "select student.name as student_name , student.gender as student_gender, student.jiguan as student_jiguan from student left join college on student.college_id = college.id
//where college.name = '计算机系'
//";

//查出“张仕传”所在的院系信息
//$sql = "select college.name as college_name , college.address as college_address, address, college.phone as college_phone from student left join college on student.college_id = college.id
//where student.name = '张仕传'
//";

//查出在“行政楼”办公的院系名称
//$sql = "select * from college where address = '行政楼'";
//查出男生女生各多少人
//$sql = "select gender ,count(*) from student GROUP BY gender";
//查出人数最多的院系信息
//$sql = "select  college.name,student.college_id, count(*) as con from student left join college on student.college_id = college.id  GROUP BY college.name,student.college_id order by con desc limit 1
//
//" ;
//查出人数最多的院系的男女生各多少人
//$sql = "select  college.name,student.gender, count(*) as con from student left join college on student.college_id = college.id where student.gender = '女'  GROUP BY college.name,student.gender order by con desc limit 1" ;
//$sql = "select  college.name,student.gender, count(*) as con from student left join college on student.college_id = college.id where student.gender = '男'  GROUP BY college.name,student.gender order by con desc limit 1" ;



//查出跟“王飞”同籍贯的所有人
//$sql = "select  name from student where jiguan=(select jiguan from student where name='王飞')";

//查出有“河北”人就读的院系信息
//$sql = "select  college.name,college.address, college.phone  from student ,college  where college.id=student.college_id and student.jiguan like '河北%'";

//查出跟“河北女生”同院系的所有学生的信息
//$sql = "select  student.name,student.gender, student.jiguan  from student ,college
//where college.id=student.college_id and college.name in
//	(select  college.name  from student ,college
//	 where college.id=student.college_id and student.gender = '女' and student.jiguan like '河北%')";

$res =  $link->query($sql);
$arr = [];
while($row = $res->fetch()){
    $arr[] = $row;
}
echo '<pre>';
print_r($arr);