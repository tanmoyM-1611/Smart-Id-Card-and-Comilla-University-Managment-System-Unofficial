<?php 
       
       include("../functionAdmin.php")  ; 
   
       session_start();
       $id=$_SESSION['adminID'];
       if($id==null){
        header("location:login.php");
       }
       
                                      
       $projectAdmin=new deptProject;

      

       

    
    $addNotification= new deptProject;
    if(isset($_POST["enter"])){
       $addNotification->add_notification($_POST);
            // if($addNo){
            //  echo '<script type ="text/JavaScript">';  
            //  echo "alert('Notification Added Succesfully')";  
            //  echo '</script>'; 
            // }
     
            // else{
            //  echo '<script type ="text/JavaScript">';  
            //  echo "alert('Notification Donot Added Succesfully')";  
            //  echo '</script>'; 
            // }
             }
             ?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Notification</title>

    <link href="style.css" rel="stylesheet" />
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
                <h1 style="text-align:center;color:#351C75;font-family:Delius"><b>ADD MESSAGE!</b></h1>
            </div>

            <div class="row" style="margin: 0px 20px 5px 20px">
                <div class="col-sm-6 container mt-3 mb-3">
                    <div class="card border-5 rounded-3">
                        <div class="card-body">
                            <form class="form" enctype="multipart/form-data" method="POST" >

                                <div class="form-group">
                                <label class="mt-3" for="exampleInputEmail1">Session:</label>
                            <select name="dept" id="student_dept" class="form-select mt-3"
                                aria-label="Default select example" placeholder="Choice Your Session">
                                <option selected>Choose Department</option>
                                <option value="CSE">CSE</option>
                                <option value="ICT">ICT</option>
                                <option value="LAW">LAW</option>
                            </select>
                            <!-- Session -->
                            <label class="mt-3" for="exampleInputEmail1">Session:</label>
                            <select name="session" id="student_session" class="form-select mt-3"
                                aria-label="Default select example" placeholder="Choice Your Session">
                                <option selected>Choose Your Session</option>
                                <option value="2017-18">2017-18</option>
                                <option value="2018-19">2018-19</option>
                                <option value="2019-20">2019-20</option>
                            </select>
                                    <label class="mt-3" for="exampleFormControlTextarea1">Details</label>
                                    <textarea name="notification" class="form-control mt-3" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <label class="mt-3">File Upload:</label> <br>
                                    <input class="mt-3" type="file" name="file" />
                                </div>
                                <br>
                                <button class="btn btn-outline-primary mt-3 " type="submit" name="enter">Submit
                                    Notification</button>
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