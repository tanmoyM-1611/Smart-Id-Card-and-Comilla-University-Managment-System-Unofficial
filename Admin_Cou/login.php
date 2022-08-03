<?php
    include("../functionAdmin.php");
    $logIn=new deptProject;
    if(isset($_POST['admin_logIn'])){
      
 $logIn->admin_login($_POST);
    }

    session_start();
    $id=$_SESSION['adminID'];
    if($id){
     header("location:homeAdmin.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Log in Admin</title>
    <link href="./login_style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->

</head>

<body>

    <div class="background">

        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="POST">
        <h3>Admin Panel</h3>

        <label for="username">Username</label>
        <input name=admin_email type="text" placeholder="Email or Phone" id="username">

        <label for="password">Password</label>
        <input name="admin_pass" type="password" placeholder="Password" id="password">

        <input class="button" type="submit" value="Login" name="admin_logIn">
        <!-- <button>Log In</button> -->
       
    </form>
</body>

</html>