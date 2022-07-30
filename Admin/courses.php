<?php 
       
       include("../functionAdmin.php")  ; 
   
       session_start();
       $id=$_SESSION['adminID'];
       if($id==null){
        header("location:login.php");
       }
       
       $projectAdmin=new deptProject;
       $courseData= $projectAdmin->displayCourseData();
        
       //delete course
       if(isset($_GET['status'])){
        if($_GET['status']='deleteCourse'){
            $deleteCourse_id=$_GET['id'];
      $delMsg= $projectAdmin->deleteCourse_data_by_id($deleteCourse_id);
        }
        
      }

             ?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Id Card</title>

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


</head>

<body class="sb-nav-fixed">
    <section>
        <?php
       
        ?>
        <div class="sidenav">
            <a href="homeAdmin.php">
                <h3>Home</h3>
            </a>

            <a href="courses.php">
                <h3>Courses</h3>
            </a>

            <a href="resultAdmin.php">
                <h3>Result</h3>
            </a>

            <div style="padding-top:250px" class="ms-3">
                <a href="logout.php"><button type="button" class="btn btn-success">Log out</button></a>
            </div>
        </div>
        <!-- Navigation bar start  -->
        <div class="main">

            <nav style="background-color: #e3f2fd" class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">CSE,Comilla University</a>

                </div>
            </nav>
            <!-- Navigation bar end  -->

            <br>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_data" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Department</th>
                                <th>Course Name</th>
                                <th>Course Code</th>
                                <th>Credit</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php while($course=mysqli_fetch_assoc($courseData)) { ?>
                            <tr>
                                <td><?php  echo $course["course_session"];?></td>
                                <td><?php  echo $course["course_semester"];?></td>
                                <td><?php  echo $course["course_department"];?></td>
                                <td><?php  echo $course["course_name"];?></td>
                                <td><?php  echo $course["course_code"];?></td>
                                <td><?php  echo $course["course_credit"];?></td>
                                <td>

                                   
                                    <a class="btn btn-danger mt-2"
                                        href="?status=deleteCourse&&id=<?php echo $course["addCourse_id"];?>"> Delete</a>

                                 
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Department</th>
                                <th>Course Name</th>
                                <th>Course Code</th>
                                <th>Credit</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!--Add Courses -->

            <div style="text-align:center">
                <a href="addCourses.php" class="btn btn-success mt-2">Add Courses!</a>
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