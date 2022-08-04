<?php
   include("../functionAdmin.php")  ; 
   
   session_start();
   $id=$_SESSION['adminID'];
   if($id==null){
    header("location:login.php");
   }


  $id=$_GET['id'];
  $status=$_GET['status'];

  $projectAdmin=new deptProject;
  $projectAdmin->verified_formdatabyhall_SHH($id,$status);
//   $q="UPDATE  formfill_up SET cou_status=$status WHERE formfill_id=$id ";
//   mysqli_query($conn,$q);
//   header('location:homeAdmincou.php');


?>