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
                header("location:homeAdmin.php");
               
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
             return "log in succesfully";
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
       
        $query="DELETE FROM student_info WHERE id=$id";
           
        if(mysqli_query($this->conn,$query)){
        //    unlink('E:\xampp\htdocs\project-5th\User\upload/'.$delete_imgData);
        header("location:homeAdmin.php");
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
         if(!empty($update_std_img)){
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
             header("location:homeAdmin.php");
             return "info update successfully";
           
}
         }
         else{
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
         stdParmanentAddress='$ustdParmanentAddress' WHERE id=$idno";
          if(mysqli_query($this->conn,$query)){
          
            header("location:homeAdmin.php");
            return "info update successfully";
          
}
        }
    }

    //verified

    public function verified_data($data1,$data2){
        
        $idno=$data1;

        $ustdStatus=$data2;
    
        $query="UPDATE student_info SET stdStatus='$ustdStatus' WHERE id=$idno";
 
        if(mysqli_query($this->conn,$query)){
                header("location:homeAdmin.php");
           return "verified successfully";
}
    }

    // Add Course
    public function add_CourseInfo($data){
        $course_session=$data["Course_session"];
        $course_semester=$data["Course_semester"];
        $course_department=$data["Course_department"];
       
        $course_name=$data["Course_name"];
        $course_code=$data["Course_code"];
        $course_credit=$data["Course_credit"];

        $query="INSERT INTO courses(course_session,course_semester,course_department,course_name,course_code,course_credit) VALUE('$course_session','  $course_semester',' $course_department',' $course_name','$course_code',' $course_credit')";

           if(mysqli_query($this->conn,$query)){
             
               return "Course added successfully!";
  
           }
    }

    // display data for course
    public function displayCourseData(){
        $query="SELECT * FROM courses";
        if(mysqli_query($this->conn,$query)){
            $displayCourse_data=mysqli_query($this->conn,$query);
            return $displayCourse_data;
        }
    }

    // delete course
    public function deleteCourse_data_by_id($id){
       
        $query="DELETE FROM courses WHERE addCourse_id=$id";
           
        if(mysqli_query($this->conn,$query)){
        //    unlink('E:\xampp\htdocs\project-5th\User\upload/'.$delete_imgData);
        header("location:courses.php");
           return "delete course data successfully";
}
    }

    // add result student info

    public function add_result_StdInfo($data){
        $student_id=$data["Student_id"];
        $student_dept=$data["Student_dept"];
        $student_session=$data["Student_session"];
        $student_semester=$data["Student_semester"];
        $student_cgpa=$data["Student_cgpa"];
        $result_status=$data["Student_status"];
       

        $query="INSERT INTO result_info_student(student_id,student_dept,student_session,student_semester,student_cgpa,result_status) VALUE('$student_id',' $student_dept','$student_session',' $student_semester',$student_cgpa,$result_status)";

           if(mysqli_query($this->conn,$query)){
            header("location:resultAdmin.php");
               return "Result Student Info added successfully!";
              
           }
    }
        
    //display result student info
    public function display_result_StdInfo($data1,$data2){
        $query="SELECT * FROM result_info_student WHERE student_id=$data1 AND student_semester=$data2";
        if(mysqli_query($this->conn,$query)){
            $return_data2=mysqli_query($this->conn,$query);
            return $return_data2;
            
        }
    }

    // update result

    public function update_result_data($data){
        $stdId=$data["Student_id"];
        $uStudentcgpa=$data["u_Student_cgpa"];
        $query="UPDATE result_info_student SET student_cgpa='$uStudentcgpa' WHERE student_id=$stdId";
 
        if(mysqli_query($this->conn,$query)){
                header("location:resultAdmin.php");
           return "verified successfully";
      
}
        
} 


   

    public function displayCourseDataBYSemester($data1,$data2,$data3){
        $query="SELECT * FROM courses where course_session='$data1' AND course_semester=$data2 AND course_department LIKE '%$data3%'" ;
        if(mysqli_query($this->conn,$query)){
            $displayCourse_data=mysqli_query($this->conn,$query);
            return $displayCourse_data;
        }
    }

    
    // Add Notification
    public function add_notification($data){ 
        $session=$data["session"];
        $dept=$data["dept"];
        $notifications=$data["notification"];
       
        $fileName = $_FILES["file"]["name"];
        $fileTmpName = $_FILES["file"]["tmp_name"];
        
        $query = "INSERT INTO noti_fication(dept_sessions,dept,mssg,files)VALUES('$session','$dept','$notifications','$fileName')";
       
        if(mysqli_query($this->conn,$query)){
            move_uploaded_file($fileTmpName,'E:\xampp\htdocs\project-5th\User\upload_file/'.$fileName);
            return "info added successfully";

        }
    }
    // display mssg
    public function displayMssgData(){ 
        $query="SELECT * FROM noti_fication";
        if(mysqli_query($this->conn,$query)){
            $display_data=mysqli_query($this->conn,$query);
            return $display_data;
        }
    }
    // Add form fill info
    public function add_formfillinfo($data){
        // Br means bank Recipt
        $dept=$data["f_stdDept"];
        $student_reg=$data["f_stdReg"];
        $semester_no=$data["f_semester"];
        $session_year=$data["f_stdSession"];
        $hall_name=$data["f_stdHall"];
        $cou_bank=$data["fcou_stdBank"];
        $hall_bank=$data["fcouhall_stdBank"];
        $dept_bank=$data["fcoudept_stdBank"];
        $cou_status=$data["statuscou"];
        $couHall_status=$data["statuscouHall"];
        $couDept_status=$data["statuscouDept"];
        // $couBR_img=$_FILES["couBR_img"]["name"];
        // $tmp_name1=$_FILES["couBR_img"]["tmp_name"];
        // $couHallBR_img=$_FILES["couHallBR_img"]["name"];
        // $tmp_name2=$_FILES["couHallBR_img"]["tmp_name"];
        // $couDeptBR_img=$_FILES["couDeptBR_img"]["name"];
        // $tmp_name3=$_FILES["couDeptBR_img"]["tmp_name"];
        $mobile_number=$data["fstdPhnNumber"];

        $query="INSERT INTO formfill_up(dept,student_reg,semester_no,session_year,hall_name,cou_bank,hall_bank,dept_bank,cou_status,couHall_status,couDept_status,mobile_number) VALUES ('$dept','$student_reg','$semester_no','$session_year','$hall_name','$cou_bank','$hall_bank','$dept_bank', '$cou_status', '$couHall_status','$couDept_status','$mobile_number')";

           if(mysqli_query($this->conn,$query)){
            // move_uploaded_file($tmp_name1,'E:\xampp\htdocs\project-5th\User\upload2/'.$couBR_img);
            // move_uploaded_file($tmp_name2,'E:\xampp\htdocs\project-5th\User\upload2/'.$couHallBR_img);
            // move_uploaded_file($tmp_name3,'E:\xampp\htdocs\project-5th\User\upload2/'.$couDeptBR_img);
            header("location:formfill.php");
               return "student form Info added successfully!";
              
           }
    }
    // display form fillup info cou administrator
    public function display_formfillinfo(){
     
        $query="SELECT * FROM formfill_up";
        if(mysqli_query($this->conn,$query)){
            $display_data=mysqli_query($this->conn,$query);
            return $display_data;
        }

    }

   

// cou administrator
    public function display_Fromdata_by_id_fromAdmin($id_no){
        $query = "SELECT * from formfill_up where formfill_id='$id_no' ";
        if(mysqli_query($this->conn,$query)){
            $return_data2=mysqli_query($this->conn,$query);
            // return $return_data;
            $studentData2=mysqli_fetch_assoc($return_data2);
            return $studentData2;
        }
    }

     // verified by cou administration
     public function verified_formdatabycou($data1,$data2){
        
        $idno=$data1;
        $status=$data2;
        $q="UPDATE  formfill_up SET cou_status=$status WHERE formfill_id=$idno ";
            if(mysqli_query($this->conn,$q)){
                    header("location:homeAdmincou.php");
               return "verified successfully";
    }
        }

    //display_formfillinfoByHall_BHMRH
    public function display_formfillinfoByHall_BSMRH(){
     
        $query="SELECT * FROM formfill_up WHERE hall_name LIKE'%BSMRH%'" ;
        if(mysqli_query($this->conn,$query)){
            $display_data=mysqli_query($this->conn,$query);
            return $display_data;
        }

    }
     // verified by cou hall BHMRH
     public function verified_formdatabyhall_BSMRH($data1,$data2){
        
        $idno=$data1;
        $status=$data2;
        $q="UPDATE  formfill_up SET couHall_status=$status WHERE formfill_id=$idno ";
            if(mysqli_query($this->conn,$q)){
                    header("location:homeAdminhall1.php");
               return "verified successfully";
    }
        }
   
        // Hall 2
        public function display_formfillinfoByHall_SHH(){
     
            $query="SELECT * FROM formfill_up WHERE hall_name LIKE '%SHH%'" ;
            if(mysqli_query($this->conn,$query)){
                $display_data=mysqli_query($this->conn,$query);
                return $display_data;
            }
    
        }
    // Hall 2 verified
        public function verified_formdatabyhall_SHH($data1,$data2){
        
            $idno=$data1;
            $status=$data2;
            $q="UPDATE  formfill_up SET couHall_status=$status WHERE formfill_id=$idno ";
                if(mysqli_query($this->conn,$q)){
                        header("location:homeAdminhall2.php");
                   return "verified successfully";
        }
            }

            // verified by dept
            public function verified_formdatabyDept($data1,$data2){
        
                $idno=$data1;
                $status=$data2;
                $q="UPDATE  formfill_up SET couDept_status=$status WHERE formfill_id=$idno ";
                    if(mysqli_query($this->conn,$q)){
                            header("location:formfill_dept.php");
                       return "verified successfully";
            }
                }

                // display_formfillinfoById
                public function display_formfillinfoById($data1,$data2)
                {
                    $query = "SELECT * from formfill_up where student_reg=$data1 AND semester_no=$data2 ";
                    if(mysqli_query($this->conn,$query)){
                        $return_data2=mysqli_query($this->conn,$query);
                        // return $return_data;
                        $studentData2=mysqli_fetch_assoc($return_data2);
                        return $studentData2;
                    }
                }

                // public function  add_result_SubjectWise($data){
                  
                //     $std_reg=$data["reg"];
                //   $dept=$data["dept"];
                //   $std_session=$data["session"];
                //   $semester=$data["semester"];
                //   $course_name1=$data["stdCourseName"];
                //   $course_name=implode(",",$course_name1);
                //   $course_credit=$data["stdCourseCredit"];
                //   $total_mark=$data["stdTmSubject"];
                //   $cgpa=$data["stdCgSubject"];

                //   $query2="INSERT INTO result_subjectwise(std_reg,dept,std_session,semester,course_name,course_credit,total_mark,cgpa) VALUE('$std_reg','$dept','$std_session','$semester','$course_name','  $course_credit','$total_mark','$cgpa')";
                
                //   if(mysqli_query($this->conn,$query2)){
                //     header("result3.php");
                //       return "add subject wise result";
                //   }


                // }

                public function  display_result_SubjectWise_by_id($data1,$data2){
                    $query = "SELECT * from result_subjectwise where s_reg=$data1 AND s_semester=$data2 ";
                    if(mysqli_query($this->conn,$query)){
                        $return_data2=mysqli_query($this->conn,$query);
                        // return $return_data2;
                        $studentresultData2=mysqli_fetch_assoc($return_data2);
                        return $studentresultData2;
                    }
                }

                // display_result_SubjectWise_by_idforViewResult
                public function  display_result_SubjectWise_by_idforViewResult($data1,$data2){
                    $query = "SELECT * from result_subjectwise where s_reg=$data1 AND s_semester=$data2 ";
                    if(mysqli_query($this->conn,$query)){
                        $return_data2=mysqli_query($this->conn,$query);
                        return $return_data2;
                       
                    }
                }
                // display_result_SubjectWise_all_forViewResult
                public function   display_result_SubjectWise_all_forViewResult($data1,$data2,$data3){
                    $query = "SELECT * from result_subjectwise where s_session='$data1' AND s_semester='$data2' AND s_dept LIKE '%$data3%' ";
                    if(mysqli_query($this->conn,$query)){
                        $return_data2=mysqli_query($this->conn,$query);
                        return $return_data2;
                       
                    }
                }
}

       ?>





<!-- $projectAdmin=new deptProject;
          $subWiseResultInfo=new deptProject; 
       $data3=$subWiseResultInfo->display_result_SubjectWise_all_forViewResult($id_dept,$id_session,$id_semester); -->










<?php
// public function displayCourse_data_by_semester($Student_semester){
    //     $query = "SELECT * from courses where course_semester='$Student_semester' ";
    //     if(mysqli_query($this->conn,$query)){
    //         $return_data2=mysqli_query($this->conn,$query);
    //         return $return_data2;
    //         // $studentData2=mysqli_fetch_assoc($return_data2);
    //         // return $studentData2;
    //     }
    // }
    
    
    // Add result
    // public function add_Result($data){
    //     $student_id=$data["rstdREG"];
    //     $student_session=$data["rstdSESSION"];
    //     $student_semester=$data["rstdSEMESTER"];
    //     $student_department=$data["rstdDEPT"];
    //     $std_CourseName=$data["stdCourseName"];
    //     $std_CourseCredit=$data["stdCourseCredit"];
    //     $std_BeforeFinal=$data["stdBeforeFinal"];
    //     $std_SemesterFinal=$data["stdSemesterFinal"];
    //     $std_TmSubject=$data["stdTmSubject"];
    //     $std_CgSubject=$data["stdCgSubject"];
    //     $std_GrSubject=$data["stdGrSubject"];

    //     $query="INSERT INTO result_info_student(student_id,student_session,student_semester,student_department,std_CourseName,std_CourseCredit,std_BeforeFinal,std_SemesterFinal,std_TmSubject,std_CgSubject,std_GrSubject) VALUE('$student_id',' $student_session','$student_semester','$student_department',' $std_CourseName',' $std_CourseCredit','$std_BeforeFinal',' $std_SemesterFinal',' $std_TmSubject',' $std_CgSubject','$std_GrSubject')";

    //        if(mysqli_query($this->conn,$query)){
    //     header("location:resultAdmin.php");
    //            return "Result added successfully!";
               
    //        }
    // }

    // view result
    // public function display_result_data_by_id_fromAdmin($data1,$data2){
    //     $query = "SELECT * from result_info_student where student_id=$data1 AND student_semester=$data2 ";
    //     if(mysqli_query($this->conn,$query)){
    //         $return_data2=mysqli_query($this->conn,$query);
    //         return $return_data2;
           
    //     }
    // }

    //sum credit
    // public function display_totalCredit($data1,$data2){
    //     $query="SELECT SUM(std_CourseCredit) AS 'std_totalCredit' FROM result_info_student WHERE student_id='$data1' AND student_semester=$data2  ";

    //     if(mysqli_query($this->conn,$query)){
    //         $return_data2=mysqli_query($this->conn,$query);
    //         // return $return_data;
    //         $studentData2=mysqli_fetch_assoc($return_data2);
    //         return $studentData2;
    //     }
    // }
     // $catch_img="SELECT * FROM student_info WHERE id=$id";
        // $delete_std_info=mysqli_query($this->conn,$catch_img);
        // $std_infoDle=mysqli_fetch_assoc($delete_std_info);
        // $delete_imgData=$std_infoDle['std_img'];
    
    ?>