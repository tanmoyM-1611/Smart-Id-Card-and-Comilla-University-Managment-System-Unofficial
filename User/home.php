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
    <title>User home</title>
    <link href="../Admin//style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5a1010e0a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript">
      function lettersOnly(input){
        var regex=/[^a-zA-Z' ']/gi;
        input.value=input.value.replace(regex,"");
      }

      

    </script>

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
            <a href="viewresultUser.php">
                <h3>Result</h3>
            </a>
            <a href="about.php">
                <h3>About</h3>
            </a>

            <a href="contact.php">
                <h3>Contact</h3>
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

            <div class="alert alert-warning mt-2 d-flex " role="alert">

                <div class="me-2 icon hidden-xs">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
                Please Fill The Form Carefully.After Submission,Please Waiting For Admin Verification.Without
                Verification You Cannot Download Id Card and Admit Card.Thank You!

            </div>
            <div class="container mt-3 mb-3" id="collapseExample">
                <div class=" card card-body">

                    <form method="POST" enctype="multipart/form-data" class="row g-3">
                        <div class="col-md-6">
                            <label for="inputDeptName" class="form-label">Department Name</label>
                            <!-- <input type="text" class="form-control" name="stdDeptName" id="inputDeptName" required> -->
                            <select name="stdDeptName" id="student_dept" class="form-select"
                                aria-label="Default select example" placeholder="Choice Your Session" required>
                                <option selected>None</option>
                                <option value="CSE">CSE</option>
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputHallName4" class="form-label">Hall</label>
                            <!-- <input type="text" class="form-control" name="stdHallName" id="inputHallName4" required> -->
                            <select name="stdHallName" id="" class="form-select" aria-label="Default select example"
                                placeholder="Choice Your Hall" required>
                                <option selected>None</option>
                                <option value="BSMRH">Bangabandhu Sheikh Mujibur Rahman Hall</option>
                                <option value="SDDH">Shaheed Dhirendranath Datta Hall</option>
                                <option value="SHH">Sheikh Hasina Hall</option>
                            </select>
                        </div>
                        <!-- name -->
                        <div class="col-12">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="stdName" class="form-control" id="inputName" onkeyup="lettersOnly(this)"
                                placeholder="First Name + Last Name" required>
                        </div>
                        <!-- Fathers Name -->
                        <div class="col-md-6">
                            <label for="inputFathersName" class="form-label">Father's Name</label>
                            <input type="text" onkeyup="lettersOnly(this)" name="stdFatherName" class="form-control" id="inputFathersName" required>
                        </div>

                        <!-- Mothers Name -->
                        <div class="col-md-6">
                            <label for="inputMothersName" class="form-label">Mother's Name</label>
                            <input type="text" onkeyup="lettersOnly(this)" name="stdMotherName" class="form-control" id="inputMothersName" required>
                        </div>

                        <!-- Registration -->
                        <div class="col-md-6">
                            <label for="inputRegistrationNumber" class="form-label">Registration Number</label>
                            <input type="number" name="stdRegNumber" class="form-control" id="inputRegNumber" required>
                        </div>

                        <!-- Session -->

                        <div class="col-md-6">
                            <label for="inputSession" class="form-label">Session</label>
                            <!-- <input type="text" name="stdSession" class="form-control" id="inputSession"
                                placeholder="2017-18" required> -->
                            <select name="stdSession" id="" class="form-select " aria-label="Default select example"
                                placeholder="Choice Your Session">
                                <option selected>None</option>
                                <option value="2017-18">2017-18</option>
                                <option value="2018-19">2018-19</option>
                                <option value="2019-20">2019-20</option>
                            </select>
                        </div>

                        <!-- DOB -->
                        <div class="col-md-6">
                            <label class="form-label" for="birthday">Date Of Birth:</label>
                            <br>
                            <input class="form-control" id="today" type="date" name="stdDOB" required>
                            <br>
                        </div>

                        <!-- Age -->
                        <div class="col-md-6">
                            <label for="inputAge" class="form-label">Age</label>
                            <input  type="number" name="stdAge" class="form-control" id="inputAge" min="18" max="50" required>
                        </div>

                        <!-- Religion -->
                        <div class="col-md-6">
                            <label for="inputReligion" class="form-label">Religion</label>
                            <!-- <input type="text" name="stdReligion" class="form-control" id="inputReligion" required> -->
                            <select name="stdReligion" id="student_dept" class="form-select"
                                aria-label="Default select example" placeholder="Choice Your Religion" required>
                                <option selected>None</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Hinduism">Hinduism</option>
                                <option value="Buddhism"> Buddhism</option>
                            </select>

                        </div>

                        <!-- Nationality -->
                        <div class="col-md-6">
                            <label for="inputNationality" class="form-label">Nationality</label>
                            <!-- <input type="text" name="stdNationality" class="form-control" id="inputNationality"
                                required> -->
                            <select name="stdNationality" id="student_dept" class="form-select"
                                aria-label="Default select example" placeholder="Choice Your Religion" required>
                                <option selected>None</option>
                                <option value="Bangladeshi">Bangladeshi</option>

                            </select>
                        </div>
                        <!-- img -->
                        <div class="col-md-6">
                            <label class="form-label" for="image">Upload your image(82*87)</label>
                            <input class="form-control mb-2" type="file" name="std_img">
                        </div>
                        <!-- Mobile -->
                        <div class="col-md-6">
                            <label for="inputNumber" class="form-label">Phone Number</label>
                            <input pattern="[0-9]{11}" type="tel" name="stdPhnNumber" class="form-control" id="inputRegNumber" placeholder="Please Enter Your 11 digit Mobile Number" required>
                        </div>
                        <!-- address1 -->
                        <div class="col-12">
                            <label for="inputPresentAddress" class="form-label">Present Address</label>
                            <input onkeyup="lettersOnly(this)" type="text" name="stdPresentAddress" class="form-control" id="inputAddress"
                                placeholder="Feni" required>
                        </div>
                        <!-- address2 -->
                        <div class="col-12">
                            <label for="inputParmanentAddress" class="form-label">Parmanent Address </label>
                            <input onkeyup="lettersOnly(this)" type="text" name="stdParmanentAddress" class="form-control" id="inputAddress2"
                                placeholder="Manikganj" required>
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