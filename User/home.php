<?php
   include("../functionAdmin.php")  ;
   session_start();
   $id=$_SESSION['userID'];
   if($id==null){
    header("location:login.php");
   }
   $addStdInfo=new deptProject;
   if(isset($_POST["add_info"])){
   $stdInfo= $addStdInfo->add_StdInfo($_POST);
       if($stdInfo){
        echo '<script type ="text/JavaScript">';  
        echo "alert('Info Added Succesfully')";  
        echo '</script>'; 
       }

       else{
        echo '<script type ="text/JavaScript">';  
        echo "alert('Info Donot Added Succesfully')";  
        echo '</script>'; 
       }
        }
       
       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User</title>
    <link href="../Admin//style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5a1010e0a8.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed ">

    <section>

        <div class="sidenav">
            <a href="home.php">
                <h3>Home</h3>
            </a>
            <a href="idCard.php">
                <h3>Id Card</h3>
            </a>
            <a href="formfill.php">
                <h3>Form Fillup</h3>
            </a>
            <a href="AdmitCard.php">
                <h3>AdmitCard</h3>
            </a>
            <a href="about.php">
                <h3>About</h3>
            </a>
            <!-- <a href="#">Courses</a>
  <a href="#">Faculty</a> -->
            <a href="#">
                <h3>Contact</h3>
            </a>
            <div style="padding-top:250px" class="ms-4">
                <a href="logout.php"><button type="button" class="btn btn-success">Log out</button></a>
            </div>
        </div>
        </div>

        <div class="main">

            <nav style="background-color: #e3f2fd" class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                
                    <a class="navbar-brand" href="#">CSE,Comilla University</a>
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    </div>
                </div>
            </nav>
            <div class="alert alert-warning mt-2 d-flex " role="alert">

                <div class="me-2 icon hidden-xs">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
                Please Fill The Form carefully.After Submission,Please Waiting For Admin Verification.Without
                Verification You Cannot Download Id Card and Admit Card.Thank You!

            </div>
            <div class="container mt-3 mb-3" id="collapseExample">
                <div class=" card card-body">

                    <form method="POST" enctype="multipart/form-data" class="row g-3">
                        <div class="col-md-6">
                            <label for="inputDeptName" class="form-label">Department Name</label>
                            <input type="text" class="form-control" name="stdDeptName" id="inputDeptName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputHallName4" class="form-label">Hall</label>
                            <input type="text" class="form-control" name="stdHallName" id="inputHallName4" required>
                        </div>
                        <!-- name -->
                        <div class="col-12">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="stdName" class="form-control" id="inputName" placeholder=""
                                required>
                        </div>
                        <!-- Fathers Name -->
                        <div class="col-md-6">
                            <label for="inputFathersName" class="form-label">Father's Name</label>
                            <input type="text" name="stdFatherName" class="form-control" id="inputFathersName" required>
                        </div>

                        <!-- Mothers Name -->
                        <div class="col-md-6">
                            <label for="inputMothersName" class="form-label">Mother's Name</label>
                            <input type="text" name="stdMotherName" class="form-control" id="inputMothersName" required>
                        </div>

                        <!-- Registration -->
                        <div class="col-md-6">
                            <label for="inputRegistrationNumber" class="form-label">Registration Number</label>
                            <input type="number" name="stdRegNumber" class="form-control" id="inputRegNumber" required>
                        </div>

                        <!-- Session -->

                        <div class="col-md-6">
                            <label for="inputSession" class="form-label">Session</label>
                            <input type="text" name="stdSession" class="form-control" id="inputSession"
                                placeholder="2017-18" required>
                        </div>
                        <!-- img -->
                        <div class="col-md-4">
                            <label class="form-label" for="image">Upload your image(82*87)</label>
                            <input class="form-control mb-2" type="file" name="std_img" required>
                        </div>
                        <!-- DOB -->
                        <div class="col-md-2">
                            <label class="form-label" for="birthday">Date Of Birth:</label>
                            <br>
                            <input class="form-control" id="today" type="date" name="stdDOB" required>
                            <br>
                        </div>

                        <!-- Age -->
                        <div class="col-md-6">
                            <label for="inputAge" class="form-label">Age</label>
                            <input type="number" name="stdAge" class="form-control" id="inputAge" required>
                        </div>

                        <!-- Religion -->
                        <div class="col-md-6">
                            <label for="inputReligion" class="form-label">Religion</label>
                            <input type="text" name="stdReligion" class="form-control" id="inputReligion" required>
                        </div>

                        <!-- Nationality -->
                        <div class="col-md-6">
                            <label for="inputNationality" class="form-label">Nationality</label>
                            <input type="text" name="stdNationality" class="form-control" id="inputNationality"
                                required>
                        </div>
                        <!-- Mobile -->
                        <div class="col-md-6">
                            <label for="inputNumber" class="form-label">Phone Number</label>
                            <input type="number" name="stdPhnNumber" class="form-control" id="inputRegNumber" required>
                        </div>
                        <!-- address1 -->
                        <div class="col-12">
                            <label for="inputPresentAddress" class="form-label">Present Address</label>
                            <input type="text" name="stdPresentAddress" class="form-control" id="inputAddress"
                                placeholder="Manikganj" required>
                        </div>
                        <!-- address2 -->
                        <div class="col-12">
                            <label for="inputParmanentAddress" class="form-label">Parmanent Address </label>
                            <input type="text" name="stdParmanentAddress" class="form-control" id="inputAddress2"
                                placeholder="Feni" required>
                        </div>
                        <div>
                            <input type="hidden" name="stdStatus" value="0">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="add_info" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#today").value = today;

    document.querySelector("#today2").valueAsDate = new Date();
    </script>
</body>

</html>