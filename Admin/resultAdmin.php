<?php
   include("../functionAdmin.php")  ; 
   
   session_start();
   $id=$_SESSION['adminID'];
   if($id==null){
    header("location:login.php");
   }

   $projectAdmin=new deptProject;
   $projectAdmin2=new deptProject;
   $stdData= $projectAdmin->displayData();
   $stdData1= $projectAdmin2->display_formfillinfo();

  //  delete data
//   if(isset($_GET['status'])){
//     if($_GET['status']='delete'){
//         $delete_id=$_GET['id'];
//   $delMsg= $projectAdmin->delete_data_by_id($delete_id);
//     }
    
//   }

  

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

</head>

<body class="sb-nav-fixed ">


    <section>
        <div class="sidenav">

            <a href="homeAdmin.php"><h5>Home</h5></a>
            <a href="courses.php"><h5>Courses</h5></a>
            <a href="resultAdmin.php"><h5>Result</h5></a>
            <a href="formfill_dept.php"><h5>Form Recipt</h5></a>
            <a href="notification.php"><h5>Notice+</h5></a>

            <div style="padding-top:380px" class="ms-3">
                <a href="logout.php"><button type="button" class="btn btn-success">Log out</button></a>
            </div>
        </div>

        <div class="main">
            <nav style="background-color: #e3f2fd" class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="homeAdmin.php">Comilla University</a>
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

            <div class="container">
                <h1 class="mt-4">Result</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Students Info
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Registration Number</th>
                                        <th>Department</th>
                                        <th>Session</th>
                                        <th>Semester</th>
                                        <th>Action(Result)</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while($student=mysqli_fetch_assoc($stdData1)) { ?>

                                      <?php if  ($student["cou_status"]==1 && $student["couHall_status"]==1 && $student["couDept_status"]==1){?>
                                    <tr>
                                     
                                        <td><?php  echo $student["student_reg"];?></td>
                                        <td><?php echo $student["dept"];?></td>
                                        <td><?php echo $student["session_year"];?></td>
                                        <td><?php echo $student["semester_no"];?></td>
                                        <td>
                                        
                                            <a class="btn btn-warning mt-0"
                                                href="viewresult5.php">VIEW</a>
                                           
                                             
                                        </td>
                                    </tr>
                                      <?php }?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
            <tr>
            <th>Registration Number</th>
                                        <th>Department</th>
                                        <th>Session</th>
                                        <th>Semester</th>
                                        <th>Action(Result)</th>
            </tr>
        </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
                
              <div style="text-align:center">
                <a class="btn btn-success ms-3  mt-0"
                                                href="result3.php">ADD RESULT</a>
              </div>  

                <footer class=" ">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; TANMOY,COU Website 2022 </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </section>
    <!-- <script src="../Admin//js/scripts.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function(){  
      $('#table_data').DataTable();  
 }); 
    </script>
</body>

</html>