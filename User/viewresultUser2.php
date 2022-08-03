<?php

   include("../functionAdmin.php")  ; 
   error_reporting(E_ERROR | E_PARSE);
   session_start();
   $id=$_SESSION['userID'];
   if($id==null){
    header("location:login.php");
   }
  
   $addResult=new deptProject;

   
        
   
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

  $resultInfoStudent= new deptProject;
   

        
         $displayresultInfoStudent= new deptProject;
     $student_result_info=$displayresultInfoStudent->display_result_StdInfo($_POST["Student_id"],$_POST["Student_semester"]);
        
     $result_Data=mysqli_fetch_assoc($student_result_info)
            
            
         
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>View Result - SB Admin</title>
    <link href="../User//style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5a1010e0a8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href='https://fonts.googleapis.com/css?family=Delius' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="sb-nav-fixed ">


    <section>
        <div class="sidenav">
            <a href="home.php">
                <h4>Home</h4>
            </a>
            <a href="idCard.php">
                <h4>Id Card</h4>
            </a>
            <a href="formfill.php">
                <h4>Form Fillup</h4>
            </a>
            <a href="viewresultUser.php">
                <h4>Result</h4>
            </a>
            <a href="about.php">
                <h4>About</h4>
            </a>

            <a href="contact.php">
                <h4>Contact</h4>
            </a>
            <div style="padding-top:200px" class="ms-4">
                <a href="logout.php"><button type="button" class="btn btn-success">Log out</button></a>
            </div>
        </div>

        <div class="main">
            <nav style="background-color: #e3f2fd" class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">CSE,Comilla University</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
                <ul class="nav justify-content-end">

                    <li class="nav-item">
                    <a class="nav-link" href="notification.php"><i style="font-size:20px" class="fa-solid fa-bell"></i></a>
                    </li>

                </ul>
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
                            <div style="background-color:#89C499" class="card-body">

                                <form class="form" method="POST" action="">

                                    <!-- Mark -->
                                    <?php   if(($result_Data["result_status"])==0)  {
                                echo
                                '<h1 style="text-align:center">No Result Found</h1>';
                                }
                                
                                else   
                                {
                                 echo '<h1 style="text-align:center"> CGPA : ';
                                 echo $result_Data["student_cgpa"];
                                 echo '</h1>';
                            
                                   

                                }?>



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