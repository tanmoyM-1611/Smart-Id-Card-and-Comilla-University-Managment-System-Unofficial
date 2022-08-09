<?php
   include("../functionAdmin.php");

   $signUp=new deptProject;
    if(isset($_POST['user_signup'])){
	$sign=$signUp->user_signup($_POST); 
    if($sign){
        echo '<script type ="text/JavaScript">';  
        echo "alert('Signup Succesfully')";  
        echo '</script>'; 
       }

       else{
        echo '<script type ="text/JavaScript">';  
        echo "alert('Signup Again')";  
        echo '</script>'; 
       }
	}
	$logIn=new deptProject;
	if(isset($_POST['user_login'])){
$log=$logIn->user_login($_POST);
    if($log){
        echo '<script type ="text/JavaScript">';  
        echo "alert('Login Succesfully')";  
        echo '</script>'; 
       }

       else{
        echo '<script type ="text/JavaScript">';  
        echo "alert('Check Email & Password')";  
        echo '</script>'; 
       }
		  }
		 

?>

<!DOCTYPE html>
<html>

<head>
    <title>Log In</title>
    <link href="../User//login_style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
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
                

            </form>
        </div>

        <div class="login">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="user_email" placeholder="Email" required="">
                <input type="password" name="user_pass" placeholder="Password" required="">
                <button type="submit" name="user_login">Log in</button>
                
            </form>
        </div>
    </div>
</body>

</html>