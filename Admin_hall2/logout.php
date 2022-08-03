<?php
session_start();
$id=$_SESSION['adminID'];
if($id){
    session_destroy();
    header("location:login.php");

}
?>