<?php 
       
       include("../functionAdmin.php")  ;
   session_start();
   $id=$_SESSION['userID'];
   if($id==null){
    header("location:login.php");
   }
       
       $projectAdmin=new deptProject;
       $mssgData= $projectAdmin->displayMssgData();
        
       //delete course
    //    if(isset($_GET['status'])){
    //     if($_GET['status']='deleteCourse'){
    //         $deleteCourse_id=$_GET['id'];
    //   $delMsg= $projectAdmin->deleteCourse_data_by_id($deleteCourse_id);
    //     }
        
    //   }

             ?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Courses</title>

    <link href="style.css" rel="stylesheet" />
    <link href="../Admin//style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5a1010e0a8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="sb-nav-fixed">
    <section>
        <?php
       
        ?>
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
        <!-- Navigation bar start  -->
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
            <!-- Navigation bar end  -->

            <br>
            <div class="container">
            <h1 class="mt-4"></h1>
                <div class="card border-5 rounded-3 mb-4">
                    <div class="card-header border-5 rounded-3">
                        <i class="fas fa-table mr-1"></i>
                        Courses
                    </div>
            <div class="card-body border-5 rounded-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_data" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Session</th>
                                <th>Department</th>
                                <th>Notice</th>
                                <th>File</th>
                                

                            </tr>
                        </thead>

                        <tbody>
                            <?php while($mssg=mysqli_fetch_assoc($mssgData)) { ?>
                            <tr>
                                <td><?php  echo $mssg["dept_sessions"];?></td>
                               
                                <td><?php  echo $mssg["dept"];?></td>
                                <td ><div style="color:red"><?php  echo $mssg["mssg"];?></div></td>
                                <td><a class="btn btn-success ms-0 " href="download.php?file=<?php echo $mssg['files'] ?>">Download</a><br></td>
                                

                                   
                                    
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Session</th>
                                <th>Department</th>
                                <th>Notice</th>
                                <th>File</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            </div>
           
           




        </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>


    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#table_data').DataTable();
    });
    </script>
</body>

</html>