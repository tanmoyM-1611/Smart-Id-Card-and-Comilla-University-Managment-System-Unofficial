<?php
 include("../functionAdmin.php")  ;
$conn = mysqli_connect("localhost", "root", "", "dept_project");

$course_name =$_POST["course_name"];
$course_credit =$_POST["course_credit"];

$total_mark=$_POST["total_mark"];
$subject_cgpa=$_POST["subject_cgpa"];

$std_reg=$_POST["std_reg"];
$std_dept=$_POST["std_dept"];
$std_session=$_POST["std_session"];
$std_semester=$_POST["std_semester"];



foreach($course_name as $key=>$value){
$q1="INSERT INTO result_subjectwise(course_name,course_credit,total_mark,cgpa,s_reg,s_dept,s_session,s_semester) VALUE('$value','$course_credit[$key]','$total_mark[$key]','$subject_cgpa[$key]','$std_reg[$key]','$std_dept[$key]','$std_session[$key]',$std_semester[$key])";

if(mysqli_query($conn,$q1)){
   
    echo "data saved succesfully"; 
    
}

}

    
?>


<!-- $_POST['array_name'] as $name -->