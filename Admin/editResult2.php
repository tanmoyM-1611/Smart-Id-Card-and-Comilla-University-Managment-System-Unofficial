<?php

   include("../functionAdmin.php")  ; 
   error_reporting(E_ERROR | E_PARSE);
   session_start();
   $id=$_SESSION['adminID'];
   if($id==null){
    header("location:login.php");
   }
  
   $addResult=new deptProject;

   
   $projectAdmin = new deptProject;  
   if(isset($_POST["edit_result_info"])){
   $update_d= $projectAdmin->update_result_data($_POST);
   if($update_d){
      echo '<script type ="text/JavaScript">';  
      echo "alert('Data Update Succesfully')";  
      echo '</script>'; 
     }

     else{
      echo '<script type ="text/JavaScript">';  
      echo "alert('Data Don't Updated Succesfully')";  
      echo '</script>'; 
     }
      }
   
  //  delete data
//   if(isset($_GET['status'])){
//     if($_GET['status']='delete'){
//         $delete_id=$_GET['id'];
//   $delMsg= $projectAdmin->delete_data_by_id($delete_id);
//     }
    
//   }

          
  $student_id=$_POST["Student_id"];
  $student_session=$_POST["Student_session"];
  $student_semester=$_POST["Student_semester"];
  $student_dept=$_POST["Student_dept"];

  

        
         $displayresultInfoStudent= new deptProject;
     $student_result_info=$displayresultInfoStudent->display_result_StdInfo($_POST["Student_id"],$_POST["Student_semester"]);
        
     $result_Data=mysqli_fetch_assoc($student_result_info);

     
           
         
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Result - SB Admin</title>
    <link href="../Admin//style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5a1010e0a8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href='https://fonts.googleapis.com/css?family=Delius' rel='stylesheet'>

</head>

<body class="sb-nav-fixed ">


    <section>
        <div class="sidenav">

            <a href="homeAdmin.php">Home</a>
            <a href="courses.php">Courses</a>
            <a href="resultAdmin.php">Result</a>
            <a href="https://cou.ac.bd/cse/facultymember">Faculty</a>

            <div style="padding-top:380px" class="ms-3">
                <a href="logout.php"><button type="button" class="btn btn-success">Log out</button></a>
            </div>
        </div>

        <div class="main">
            <nav style="background-color: #e3f2fd" class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Comilla University</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                        </ul>

                        <!-- <form class="d-flex">
                            <input class="form-control me-2" type="text" id="mySearch" onkeyup="searchStudent()" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                    </div>
                </div>
            </nav>

            <div class="container-fluid ">

                <div class="mt-4 card col-sm-4 container mt-3 mb-3 border-5 rounded-3"
                    style="text-align:center;background-color:#f9f3db">
                    <div class="card-body ">
                        <h3 style="font-family:italic"><b style="font-family:Delius">Student ID :</b>

                            <?php echo $_POST["Student_id"];?></h3>
                        <h4 style="font-family:Delius">Department :
                            <?php echo $_POST["Student_dept"];?></h4>
                        <h5 style="font-family:Delius">Student Session :
                            <?php echo $_POST["Student_session"];?></h5>
                        <h5 style="font-family:Delius">Semester No :
                            <?php echo $_POST["Student_semester"]?></h5>
                    </div>

                </div>
               
                <!-- submit result -->

                <div class="row" style="margin: 0px 20px 5px 20px">
                <div class="col-sm-6 container mt-3 mb-3">
                    <div class="card border-5 rounded-3">
                        <div class="card-body">
                            
                            <form class="form" method="POST" action="">
                            
                               
                            <input name="Student_id" id="student_id" class="form-control mt-3" required type="hidden" value="<?php {echo  $_POST["Student_id"];}?>"
                                   >
                               
                                 <br>
                                <!-- Mark -->  
                               
                                <label class="mt-3" for="exampleInputEmail1">CGPA:</label>
                                <input name="u_Student_cgpa" id="student_mark" class="form-control mt-3" step="0.01" type="number" value="<?php  echo $result_Data['student_cgpa'];?>" >
                                
                               <br> 
                               
                 
                               
                                           
                               <div style="text-align:center">   <button  class="btn btn-outline-primary mt-3"   type="submit"
                                    name=" edit_result_info">Update</button></div>
                                
                                
                                
                               
                            
                            
                                  
                               
                                   

                                    
                            </form>
                        </div>
                    </div>
                </div>


            </div>





            </div>
        </div>
    </section>
    <!-- <script src="../Admin//js/scripts.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#table_data').DataTable();
    });
    </script>
    
</body>

</html>