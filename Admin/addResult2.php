<?php

   include("../functionAdmin.php")  ; 
   
   session_start();
   $id=$_SESSION['adminID'];
   if($id==null){
    header("location:login.php");
   }
  
   $addResult=new deptProject;
if(isset($_POST["add_result"])){
    $resultInfo= $addResult->add_Result($_POST);
        if($resultInfo){
         echo '<script type ="text/JavaScript">';  
         echo "alert('result Added Succesfully')";  
         echo '</script>'; 
        }
 
        else{
         echo '<script type ="text/JavaScript">';  
         echo "alert('result Don't Added Succesfully')";  
         echo '</script>'; 
        }
       
           
   
       
         }
   
        
   $projectAdmin=new deptProject;
   $courseData= $projectAdmin->displayCourseDataBYSemester($_POST["Student_session"],$_POST["Student_semester"],$_POST["Student_dept"]);
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

         
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Result - SB Admin</title>
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

            <div style="padding-top:420px" class="ms-4">
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
                            <?php echo $_POST["Student_semester"];?></h5>
                    </div>

                </div>
                <form method="POST" action="">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        
                                        <th>Course Name</th>
                                        <th>Course Credit</th>
                                        <th>Before Final Mark</th>
                                        <th>Semester Final Mark</th>
                                        <th>Total Mark</th>
                                        <th>CGPA</th>
                                        <th>Grade</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php while($course_Data=mysqli_fetch_assoc($courseData)) { ?>

                                    <tr>
                                        
                                         <input  name="rstdREG" type="hidden"
                                                value="<?php  echo $_POST["Student_id"];?>">
                                         <input name="rstdDEPT" type="hidden"
                                                value="<?php  echo $_POST["Student_dept"];?>"> 
                                        <input name="rstdSESSION" type="hidden"
                                                value="<?php  echo $_POST["Student_session"];?>">
                                         <input name="rstdSEMESTER" type="hidden"
                                                value="<?php  echo $_POST["Student_semester"];?>">

                                        <td><input name="stdCourseName" type="text"
                                                value="<?php  echo $course_Data["course_name"];?>">

                                        </td>
                                        <td><input name="stdCourseCredit" type="text"
                                                value="<?php  echo $course_Data["course_credit"];?>"></td>
                                        <td><input type="number" name="stdBeforeFinal"></td>
                                        <td><input type="number" name="stdSemesterFinal"></td>
                                        <td><input type="number" name="stdTmSubject"></td>
                                        <td><input type="number" name="stdCgSubject" step="0.01"></td>
                                        <td><input type="text" name="stdGrSubject"></td>
                                        <td><button name="add_result" class="btn btn-outline-primary " type="submit">Submit</button></td>
                                    </tr>





                                    <?php } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                       
                                        <th>Course Name</th>
                                        <th>Course Credit</th>
                                        <th>Before Final Mark</th>
                                        <th>Semester Final Mark</th>
                                        <th>Total Mark</th>
                                        <th>CGPA</th>
                                        <th>Grade</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    

                </form>
                <!-- submit result -->






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