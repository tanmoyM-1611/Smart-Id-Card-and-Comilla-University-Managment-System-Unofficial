<?php
session_start();
$id=$_SESSION['userID'];
if($id){
    session_destroy();
    header("location:login.php");

}
?>