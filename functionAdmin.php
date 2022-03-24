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

       //admin login
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
               return $admin_info;

              
           }
       
       }

    //    user signup
       public function user_signup($data){
        $user_name=$data["user_name"];
        $user_email=$data["user_email"];
        $user_pass=md5($data["user_pass"]);
        
        

        $query="INSERT INTO users_login(username,user_email,user_pass) VALUE('  $user_name','$user_email','$user_pass')";

        if(mysqli_query($this->conn,$query)){
           
            return "user info added successfully";
        }
       }
       //user login
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
    //add info
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
        $stdStatus=$data["stdStatus"];
        $std_img=$_FILES["std_img"]["name"];
        $tmp_name=$_FILES["std_img"]["tmp_name"];

        $query="INSERT INTO student_info(stdDeptName,stdHallName,stdName,std_img,stdFatherName,stdMotherName,stdRegNumber,stdSession,stdDOB,stdAge,stdReligion,stdNationality,stdPhnNumber,stdPresentAddress,stdParmanentAddress,stdStatus) VALUE('$stdDeptName',' $stdHallName','$stdName','$std_img','$stdFatherName','$stdMotherName', $stdRegNumber,'$stdSession','$stdDOB', $stdAge,'$stdReligion','$stdNationality','$stdPhnNumber','$stdPresentAddress','$stdParmanentAddress','$stdStatus')";

           if(mysqli_query($this->conn,$query)){
               move_uploaded_file($tmp_name,'upload/'.$std_img);
               return "info added successfully";
  
           }
    }
      
// display data
    public function displayData(){
        $query="SELECT * FROM student_info";
        if(mysqli_query($this->conn,$query)){
            $display_data=mysqli_query($this->conn,$query);
            return $display_data;
        }
    }

    //display data by id
    public function display_data_by_id_fromUser($id_no){
        $query = "SELECT * from student_info where stdRegNumber='$id_no' AND stdStatus=1";
        if(mysqli_query($this->conn,$query)){
            $return_data=mysqli_query($this->conn,$query);
            // return $return_data;
            $studentData=mysqli_fetch_assoc($return_data);
            return $studentData;
        }
    }

    // delete data by id

    public function delete_data_by_id($id){
        // $catch_img="SELECT * FROM student_info WHERE id=$id";
        // $delete_std_info=mysqli_query($this->conn,$catch_img);
        // $std_infoDle=mysqli_fetch_assoc($delete_std_info);
        // $delete_imgData=$std_infoDle['std_img'];
        $query="DELETE FROM student_info WHERE id=$id";
           
        if(mysqli_query($this->conn,$query)){
        //    unlink('E:\xampp\htdocs\project-5th\User\upload/'.$delete_imgData);
        header("location:template.php");
           return "delete data successfully";
}
    }

    // display data by id form admin
    public function display_data_by_id_fromAdmin($id_no){
        $query = "SELECT * from student_info where id='$id_no' ";
        if(mysqli_query($this->conn,$query)){
            $return_data2=mysqli_query($this->conn,$query);
            // return $return_data;
            $studentData2=mysqli_fetch_assoc($return_data2);
            return $studentData2;
        }
    }

    //update data
    public function update_data($data){
        $ustdDeptName=$data["ustdDeptName"];
        $ustdHallName=$data["ustdHallName"];
        $ustdName=$data["ustdName"];
        $ustdFatherName=$data["ustdFatherName"];
        $ustdMotherName=$data["ustdMotherName"];
        $ustdRegNumber=$data["ustdRegNumber"];
        $ustdSession=$data["ustdSession"];
        $ustdDOB=$data["ustdDOB"];
        $ustdAge=$data["ustdAge"];
        $ustdReligion=$data["ustdReligion"];
        $ustdNationality=$data["ustdNationality"];
        $ustdPhnNumber=$data["ustdPhnNumber"];
        $ustdPresentAddress=$data["ustdPresentAddress"];
        $ustdParmanentAddress=$data["ustdParmanentAddress"];
        // $ustd_img=$data["ustd_img"];
        
        $update_std_img=$_FILES["ustd_img"]["name"];
        $tmp_name=$_FILES["ustd_img"]["tmp_name"];
        $idno=$data['std_id'];
        
        $tmp_name=$_FILES["ustd_img"]["tmp_name"];

        $query="UPDATE student_info SET 
         stdDeptName='$ustdDeptName',
         stdHallName='$ustdHallName',
         stdName='$ustdName',
         stdFatherName='$ustdFatherName',
         stdMotherName='$ustdMotherName',
         stdRegNumber='$ustdRegNumber',
         stdSession='$ustdSession',
         stdDOB='$ustdDOB',
         stdAge='$ustdAge',
         stdPhnNumber='$ustdPhnNumber',
         stdReligion='$ustdReligion',
         stdNationality='$ustdNationality',
         stdPresentAddress='$ustdPresentAddress',
         stdParmanentAddress='$ustdParmanentAddress',
        
         std_img='$update_std_img' WHERE id=$idno";
       

        if(mysqli_query($this->conn,$query)){
             move_uploaded_file($tmp_name,'E:\xampp\htdocs\project-5th\User\upload/'.$update_std_img);
           return "info update successfully";
}
    }

    //verified

    public function verified_data($data){
        
        $idno=$data['std_id'];

        $ustdStatus=$data["ustdStatus"];
    
        $query="UPDATE student_info SET stdStatus='$ustdStatus' WHERE id=$idno";
 
        if(mysqli_query($this->conn,$query)){
                header("location:template.php");
           return "verified successfully";
}
    }

    }
       ?>