<?php
   include("../functionAdmin.php");

   $signUp=new deptProject;
    if(isset($_POST['user_signup'])){
	$signUp->user_signup($_POST); 
	}
	$logIn=new deptProject;
	if(isset($_POST['user_login'])){
	$logIn->user_login($_POST);
		  }
		 

?>

<!DOCTYPE html>
<html>

<head>
    <title>Log In</title>
    <link href="../User//login_style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <?php
              
			
                
              ?>
    <div class="main">

        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="user_name" placeholder="User name" required="">
                <input type="email" name="user_email" placeholder="Email" required="">
                <input type="password" name="user_pass" placeholder="Password" required="">

                <button type="submit" name="user_signup">Sign up</button>
                <!-- <input class="buttond" type="submit" value="Sign up" name="user_signup">  -->

            </form>
        </div>

        <div class="login">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="user_email" placeholder="Email" required="">
                <input type="password" name="user_pass" placeholder="Password" required="">
                <button type="submit" name="user_login">Log in</button>
                <!-- <input class="" type="submit" value="Log in" name="user_login"> -->
            </form>
        </div>
    </div>
</body>

</html>