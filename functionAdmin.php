<?php
   class deptProject{
       private $conn;

       public function __construct(){
           #database host,user,pass,name
           $dbhost="localhost";
           $dbuser="root";
           $dbpass="";
           $dbname="dept_project";

           $this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

           if(!$this->conn){
               die("Database failed");
           }
       }
       public function admin_login($data){

              
           $admin_email=$data['admin_email'];
           $admin_pass=md5($data['admin_pass']);

           $query="SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";

           if(mysqli_query($this->conn,$query)){
               $admin_info=mysqli_query($this->conn,$query);

               if($admin_info){
                header("location:template.php");
               
                $admin_data=mysqli_fetch_assoc($admin_info);
                 session_start();
                $_SESSION['adminID']=$admin_data['id'];
                $_SESSION['admin_name']=$admin_data['admin_name'];
               }

               else{
                   return "error";
               }

              
           }
       
       }
       public function user_signup($data){
        $user_name=$data["user_name"];
        $user_email=$data["user_email"];
        $user_pass=md5($data["user_pass"]);
        
        

        $query="INSERT INTO users_login(username,user_email,user_pass) VALUE('  $user_name','$user_email','$user_pass')";

        if(mysqli_query($this->conn,$query)){
           
            return "user info added successfully";
        }
       }
       public function user_login($data){

              
        $user_email=$data['user_email'];
        $user_pass=md5($data['user_pass']);

        $query="SELECT * FROM users_login WHERE user_email='$user_email' && user_pass='$user_pass'";

        if(mysqli_query($this->conn,$query)){
            $user_login_info=mysqli_query($this->conn,$query);

            if($user_login_info){
             header("location:home.php");
            
             $user_login_data=mysqli_fetch_assoc($user_login_info);
              session_start();
             $_SESSION['userID']=$user_login_data['id'];
             $_SESSION['user_name']=$user_login_data['username'];
            }

            else{
                return "error";
            }

           
        }
    
    }
    public function add_StdInfo($data){
        $stdDeptName=$data["stdDeptName"];
        $stdHallName=$data["stdHallName"];
        $stdName=$data["stdName"];
        $stdFatherName=$data["stdFatherName"];
        $stdMotherName=$data["stdMotherName"];
        $stdRegNumber=$data["stdRegNumber"];
        $stdSession=$data["stdSession"];
        $stdDOB=$data["stdDOB"];
        $stdAge=$data["stdAge"];
        $stdPhnNumber=$data["stdPhnNumber"];
        $stdReligion=$data["stdReligion"];
        $stdNationality=$data["stdNationality"];
        $stdPresentAddress=$data["stdPresentAddress"];
        $stdParmanentAddress=$data["stdParmanentAddress"];
        $std_img=$_FILES["std_img"]["name"];
        $tmp_name=$_FILES["std_img"]["tmp_name"];

        $query="INSERT INTO student_info(stdDeptName,stdHallName,stdName,std_img,stdFatherName,stdMotherName,stdRegNumber,stdSession,stdDOB,stdAge,stdReligion,stdNationality,stdPhnNumber,stdPresentAddress,stdParmanentAddress) VALUE('$stdDeptName',' $stdHallName','$stdName','$std_img','$stdFatherName','$stdMotherName', $stdRegNumber,'$stdSession','$stdDOB', $stdAge,'$stdReligion','$stdNationality','$stdPhnNumber','$stdPresentAddress','$stdParmanentAddress')";

           if(mysqli_query($this->conn,$query)){
               move_uploaded_file($tmp_name,'upload/'.$std_img);
               return "info added successfully";
              
               
           }
    }

    // public function display_data(){
    //     $query="SELECT * FROM student_info";
    //     if(mysqli_query($this->conn,$query)){
    //         $return_data=mysqli_query($this->conn,$query);
    //         return $return_data;
    //     }
    // }

    public function display_data_by_id($id_no){
        $query = "SELECT * from student_info where stdRegNumber='$id_no' ";
        if(mysqli_query($this->conn,$query)){
            $return_data=mysqli_query($this->conn,$query);
            // return $return_data;
            $studentData=mysqli_fetch_assoc($return_data);
            return $studentData;
        }
    }

    }
       ?>