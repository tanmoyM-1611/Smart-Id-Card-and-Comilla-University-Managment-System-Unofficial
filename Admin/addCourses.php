<?php 
       
       include("../functionAdmin.php")  ; 
   
       session_start();
       $id=$_SESSION['adminID'];
       if($id==null){
        header("location:login.php");
       }
       
                                      

$addCourseInfo=new deptProject;
   if(isset($_POST["add_Course"])){
   $courseInfo= $addCourseInfo->add_CourseInfo($_POST);
       if($courseInfo){
        echo '<script type ="text/JavaScript">';  
        echo "alert('Course Added Succesfully')";  
        echo '</script>'; 
       }

       else{
        echo '<script type ="text/JavaScript">';  
        echo "alert('Course Don't Added Succesfully')";  
        echo '</script>'; 
       }
        }
        
            
        

             ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <title>Id Card</title>

    <link href="../User//idCardStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="../User//style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5a1010e0a8.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>


</head>

<body class="sb-nav-fixed">
    <section>
        <?php
        // if($data){
           
        // }

        ?>

        <div class="sidenav">
        <a href="homeAdmin.php">Home</a>
            <a href="courses.php">Courses</a>
            <a href="resultAdmin.php">Result</a>
            <a href="https://cou.ac.bd/cse/facultymember">Faculty</a>

            <div style="padding-top:380px" class="ms-3">
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
            <div>
                <h1 style="text-align:center;color:#351C75;font-family:Delius"><b>ADD COURSES!</b> </h1>
            </div>

            <div class="row" style="margin: 0px 20px 5px 20px">
                <div class="col-sm-6 container mt-3 mb-3">
                    <div class="card border-5 rounded-3">
                        <div class="card-body">
                            <form class="form" method="POST" enctype="multipart/form-data" action="">

                                <label class="mt-3" for="exampleInputEmail1">Session:</label>

                                <select name="Course_session" class="form-select mt-3"
                                    aria-label="Default select example">
                                    <option selected>Choose Session</option>
                                    <option value="2017-18">2017-18</option>
                                    <option value="2019-20">2019-20</option>
                                    <option value="2021-22">2021-22</option>
                                </select>
                                <br>
                                <!-- Semester -->
                                <label class="mt-3" for="exampleInputEmail1">Semester:</label>
                                <select name="Course_semester" class="form-select mt-3"
                                    aria-label="Default select example">
                                    <option selected>Choose Semester</option>
                                    <option value="1">1st</option>
                                    <option value="2">2nd</option>
                                    <option value="3">3rd</option>
                                    <!-- <option value="4th">4th</option> -->
                                </select>
                                <br>
                                <!-- Department -->
                                <label class="mt-3" for="exampleInputEmail1">Department:</label>

                                <select name="Course_department" class="form-select mt-3"
                                    aria-label="Default select example">
                                    <option selected>Choose Department</option>
                                    <option value="CSE">CSE</option>
                                    <option value="ICT">ICT</option>
                                    <option value="LAW">LAW</option>
                                </select>

                                <br>
                                <!-- Course Name -->
                                <label for="exampleInputEmail1">Course Name:</label>
                                <input class="form-control mt-3" type="search" placeholder="Enter Course Name."
                                    name="Course_name">

                                <br>
                                <!-- Course Code -->
                                <label for="exampleInputEmail1">Course Code:</label>
                                <input class="form-control mt-3" type="search" placeholder="Enter Course Code(ex. CSE-1101)"
                                    name="Course_code">

                                <br>
                                <!-- Course Credit -->
                                <label class="mt-3" for="exampleInputEmail1">Course Credit:</label>
                                <select name="Course_credit" class="form-select mt-3"
                                    aria-label="Default select example">
                                    <option selected>Choose Course Credit</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>

                                <br>
                                <!-- Session -->
                                <div style="text-align:center">
                                    <button name="add_Course" class="btn btn-outline-primary mt-3 " type="submit"
                                    name="search">Submit</button>
                                </div>
                                
                            </form>
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


    <script>

    </script>
</body>

</html>