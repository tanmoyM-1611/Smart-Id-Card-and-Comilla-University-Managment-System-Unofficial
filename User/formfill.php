<?php
  include("../functionAdmin.php")  ;
  
  $studentInfo=new deptProject;
 
  if(isset($_POST['search'])){

       $id_no = $_POST['id_no'];
       $data= $studentInfo->display_data_by_id_fromUser($id_no);

             if($data){    
                       
                      $stdDeptName=$data["stdDeptName"];
  $stdHallName=$data["stdHallName"];
  $stdName=$data["stdName"];
  $stdFatherName=$data["stdFatherName"];
  $stdMotherName=$data["stdMotherName"];
  $stdRegNumber=$data["stdRegNumber"];
  $stdSession=$data["stdSession"];
  $stdDOB=$data["stdDOB"];
  $stdAge=$data["stdAge"];
  $stdReligion=$data["stdReligion"];
  $stdNationality=$data["stdNationality"];
  $stdPhnNumber=$data["stdPhnNumber"];
  $stdPresentAddress=$data["stdPresentAddress"];
  $stdParmanentAddress=$data["stdParmanentAddress"];
  $std_img=$data["std_img"];
       
             }

             else{
              echo '<script type ="text/JavaScript">';  
              echo "alert('Don't found any data!')";  
              echo '</script>'; 
             }
  

  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

</head>

<body>
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
            <a href="about.php">
                <h3>About</h3>
            </a>
            <!-- <a href="#">Courses</a>
  <a href="#">Faculty</a> -->
            <a href="#">
                <h3>Contact</h3>
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
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div> -->
                </div>
            </nav>
            <!-- Navigation bar end  -->

            <br>

            <div class="col-sm-6 container  mt-3 mb-3">
                <div class="card ">
                    <div class="card-body">
                        <form class="form" method="POST" action="">
                            <label for="exampleInputEmail1">Form Fill</label>
                            <input class="form-control mt-3" type="search" placeholder="Enter Id Card No." name="id_no">
                            <small id="emailHelp" class="form-text text-muted">Every student's should have unique Id
                                no.</small>
                            <br>
                            <button class="btn btn-outline-primary mt-3 " type="submit" name="search">Generate</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 container mt-3 mb-3">
                <div id="form-body" class="container card card-body mt-3 mb-3" id="collapseExample">

                    <div class="row " style=" ">
                        <div class="col-sm-5   mt-3 mb-3">
                            <p>Attach Your Picture:</p>
                            <img style="width:170px" src="../User//upload/<?php if(isset($data)){echo $std_img; } ?>"
                                alt="" srcset="">
                        </div>

                        <div class="col-sm-4  mt-3 mb-3">
                            <img style="width:120px;padding:0px" src="../User//assets//images//coulogo3.jpg" alt=""
                                srcset="">
                            <br>
                            <h4 style="margin-left:-28px"><b>Comilla University</b> </h4>
                        </div>

                        <div class="col-sm-3  mt-3 mb-3">
                            <label for="inputDeptName" class="form-label">Department</label>
                            <input type="text" class="form-control" name="stdDeptName" id="inputDeptName"
                                value="<?php if(isset($data)){echo $stdDeptName;}?>">
                            <br>
                            <label for="inputRegistrationNumber" class="form-label">ID</label>
                            <input type="number" name="stdRegNumber" class="form-control" id="inputRegNumber"
                                value="<?php if(isset($data)){ echo $stdRegNumber;}?>">
                        </div>
                    </div>


                    <div class="col-sm-12 container  mt-3 mb-1">
                        <h3> <b> Exam Controller,</b></h3>
                        <h4>Comilla University</h4>
                        <br>
                        <p>I am applying for permission to participate in the <select id="" name="semesterNumber">
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                            </select> semester final examination of CSE department of
                            <?php if(isset($data)){ echo $stdSession;} else{echo "[please enter id on borad!]";}?>
                            academic year. If any information in this application is false then my application will be
                            rejected..</p>
                    </div>

                    <div class="card card-body">

                        <form onsubmit="return false" method="POST" enctype="multipart/form-data" class="row g-3">
                            <div class="col-md-6">
                                <label for="inputDeptName" class="form-label">Department Name</label>
                                <input type="text" class="form-control" name="stdDeptName" id="inputDeptName"
                                    value="<?php if(isset($data)){echo $stdDeptName;}?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputHallName4" class="form-label">Hall</label>
                                <input type="text" value="<?php if(isset($data)){echo $stdHallName;}?>"
                                    class="form-control" name="stdHallName" id="inputHallName4">
                            </div>
                            <!-- name -->
                            <div class="col-12">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" name="stdName" class="form-control" id="inputName"
                                    value="<?php if(isset($data)){echo $stdName;}?>" placeholder="">
                            </div>
                            <!-- Fathers Name -->
                            <div class="col-md-6">
                                <label for="inputFathersName" class="form-label">Father's Name</label>
                                <input type="text" name="stdFatherName" class="form-control"
                                    value="<?php if(isset($data)){  echo $stdFatherName;}?>" id="inputFathersName">
                            </div>

                            <!-- Mothers Name -->
                            <div class="col-md-6">
                                <label for="inputMothersName" class="form-label">Mother's Name</label>
                                <input type="text" name="stdMotherName" class="form-control" id="inputMothersName"
                                    value="<?php if(isset($data)){ echo $stdMotherName;}?>">
                            </div>

                            <!-- Registration -->
                            <div class="col-md-6">
                                <label for="inputRegistrationNumber" class="form-label">Registration Number</label>
                                <input type="number" name="stdRegNumber"
                                    value="<?php if(isset($data)){ echo $stdRegNumber;}?>" class="form-control"
                                    id="inputRegNumber">
                            </div>

                            <!-- Session -->

                            <div class="col-md-6">
                                <label for="inputSession" class="form-label">Session</label>
                                <input type="text" name="stdSession" class="form-control"
                                    value="<?php if(isset($data)){ echo $stdSession;}?>" id="inputSession"
                                    placeholder="2017-18">
                            </div>
                            <!-- img -->

                            <!-- DOB -->
                            <div class="col-md-6">
                                <label class="form-label" for="birthday">Date Of Birth:</label>
                                <br>
                                <input class="form-control" id="today" type="date" name="stdDOB"
                                    value="<?php if(isset($data)){ echo $stdDOB;}?>">
                                <br>
                            </div>

                            <!-- Age -->
                            <div class="col-md-6">
                                <label for="inputAge" class="form-label">Age</label>
                                <input type="number" name="stdAge" class="form-control" id="inputAge"
                                    value="<?php if(isset($data)){echo $stdAge;}?>">
                            </div>

                            <!-- Religion -->
                            <div class="col-md-6">
                                <label for="inputReligion" class="form-label">Religion</label>
                                <input type="text" name="stdReligion" class="form-control" id="inputReligion"
                                    value="<?php if(isset($data)){ echo $stdReligion;}?>">
                            </div>

                            <!-- Nationality -->
                            <div class="col-md-6">
                                <label for="inputNationality" class="form-label">Nationality</label>
                                <input type="text" name="stdNationality" class="form-control" id="inputNationality"
                                    value="<?php if(isset($data)){ echo $stdNationality;}?>">
                            </div>
                            <!-- Mobile -->
                            <div class="col-md-12">
                                <label for="inputNumber" class="form-label">Phone Number</label>
                                <input type="number" name="stdPhnNumber" class="form-control" id="inputRegNumber"
                                    value="<?php if(isset($data)){ echo $stdPhnNumber;}?>">
                            </div>
                            <!-- address1 -->
                            <div class="col-6">
                                <label for="inputPresentAddress" class="form-label">Present Address</label>
                                <input type="text" name="stdPresentAddress" class="form-control" id="inputAddress"
                                    value="<?php if(isset($data)){ echo $stdPresentAddress;}?>">
                            </div>
                            <!-- address2 -->
                            <div class="col-6">
                                <label for="inputParmanentAddress" class="form-label">Parmanent Address </label>
                                <input type="text" name="stdParmanentAddress" class="form-control" id="inputAddress2"
                                    value="<?php if(isset($data)){ echo $stdParmanentAddress;}?>">
                            </div>

                            <div class="col-6">
                                <label for="" class="form-label">Bank Receipt</label>
                                <input type="number" name="stdBankReceiptNumber" class="form-control" id="bankRecipt">
                            </div>

                            <div class="col-6">
                                <label for="" class="form-label">Amount </label>
                                <input type="number" name="stdAmount" class="form-control" id="bankAmount">
                            </div>

                            <div class="col-12">
                                <!-- <button type="submit" name="add_info" class="btn btn-primary">Save</button> -->

                            </div>

                            <!-- for me -->

                            <div class="  mt-2 container">
                                <h4>Your Courses:</h4>
                                <div class="">
                                    <div style="border:dotted" class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" height="150px" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Credit</th>


                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>



                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <h4>Select Your Courses</h4> -->
                                <!-- <div  class="col-12">
  <select  data-placeholder="Select Your Courses" multiple class="chosen-select" name="test" >
      <div id="example">
           <option value=""></option>
    <option>CSE1101-Computer Science and Structured Programming</option>
    <option>CSE 1102-Computer System and Structured Programming Lab</option>
    <option>CSE 1103</option>
    <option>CSE 1104</option>
    <option>CSE 1105</option>
    <option>CSE 1106</option>
    <option>CSE 1107</option>
    <option>CSE 1108</option>
    
    <option>CSE 2101</option>
    <option>CSE 2101</option>
    <option>CSE 2101</option>
    <option>CSE 2101</option>
    <option>CSE 2101</option>
    <option>CSE 2101</option>
    <option>CSE 2101</option>
    <option>CSE 2101</option>

    <option>CSE 3101</option>
    <option>CSE 3101</option>
    <option>CSE 3101</option>
    <option>CSE 3101</option>
    <option>CSE 3101</option>
    <option>CSE 3101</option>
    <option>CSE 3101</option>
    <option>CSE 3101</option>
      </div>
   
  </select>
         </div> -->

                                <div class="col-12 mt-2">
                                    <input id="course-submit" type="submit">
                                </div>
                        </form>
                    </div>

                </div>
                <div style="margin-top:210px" class="ms-auto d-flex ">
                    <div class="me-4">
                        <p></p>
                        <h2 style='font-size:12px;'>Your Signature</h2>
                    </div>
                    <div>
                        <p></p>
                        <h2 style='font-size:12px;'>Chairman Signature</h2>
                    </div>

                </div>

                <div class="row  " style="border:dotted;margin-top:30px">



                    <div class="col-sm-5   mt-3 mb-3">
                        <p>Attach Your Picture:</p>
                        <img style="width:170px" src="../User//upload/<?php if(isset($data)){echo $std_img; } ?>" alt=""
                            srcset="">
                    </div>

                    <div class="col-sm-4  mt-3 mb-3">
                        <img style="width:120px;padding:0px" src="../User//assets//images//coulogo3.jpg" alt=""
                            srcset="">
                        <br>
                        <h4 style="margin-left:-28px"><b>Comilla University</b> </h4>
                        <h4 style="margin-left:5px;"><b>Admit Card</b> </h4>
                    </div>

                    <!-- admit -->
                    <div class="card card-body">
                        <h2 class="mb-3"><b>Final examination-20____</b> </h2>
                        <form onsubmit="return false" method="POST" enctype="multipart/form-data" class="row g-3">



                            <div class="col-md-6">
                                <label for="" class="form-label">Semester No:</label>
                                <input type="number" class="form-control" name="stdSemNO" id="">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Semester Final Year:</label>
                                <input type="number" class="form-control" name="stdSemYear" id="inputDeptName">
                            </div>

                            <div class="col-md-6">
                                <label for="inputDeptName" class="form-label">Department Name</label>
                                <input type="text" class="form-control" name="stdDeptName" id="inputDeptName"
                                    value="<?php if(isset($data)){echo $stdDeptName;}?>">
                            </div>

                            <div class="col-md-6">
                                <label for="inputHallName4" class="form-label">Hall</label>
                                <input type="text" value="<?php if(isset($data)){echo $stdHallName;}?>"
                                    class="form-control" name="stdHallName" id="inputHallName4">
                            </div>


                            <div class="col-12">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" name="stdName" class="form-control" id="inputName"
                                    value="<?php if(isset($data)){echo $stdName;}?>" placeholder="">
                            </div>

                            <div class="col-md-6">
                                <label for="inputRegistrationNumber" class="form-label">Registration Number</label>
                                <input type="number" name="stdRegNumber"
                                    value="<?php if(isset($data)){ echo $stdRegNumber;}?>" class="form-control"
                                    id="inputRegNumber">
                            </div>

                            <!-- Session -->

                            <div class="col-md-6">
                                <label for="inputSession" class="form-label">Session</label>
                                <input type="text" name="stdSession" class="form-control"
                                    value="<?php if(isset($data)){ echo $stdSession;}?>" id="inputSession"
                                    placeholder="2017-18">
                            </div>

                            <div class="col-md-12">
                                <label for="inputNumber" class="form-label">Phone Number</label>
                                <input type="number" name="stdPhnNumber" class="form-control" id="inputRegNumber"
                                    value="<?php if(isset($data)){ echo $stdPhnNumber;}?>">
                            </div>

                        </form>
                    </div>

                    <div style="margin-top:20px" class="ms-auto d-flex ">
                        <div class="me-4">
                            <p></p>
                            <h2 style='font-size:12px;'>Your Signature</h2>
                        </div>
                        <div>
                            <p></p>
                            <h2 style='font-size:12px;'>Controller Of Examination's Signature</h2>
                        </div>

                    </div>

                </div>

                <button id="download" class="downloadtable btn btn-primary mt-2"> Download Id Card</button>

                <!-- end -->
            </div>

        </div>

        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
    <script src="../User//multiselect-dropdown.js"></script>
    <script>
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {

                const formBody = this.document.getElementById("form-body");

                // console.log(idBody);
                // console.log(window);
                var opt = {
                    margin: 1,
                    filename: 'myid.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }

                };
                html2pdf().from(formBody).set(opt).save();
                document.getElementById("download").style.display = "none";
                document.getElementById("course-submit").style.display = "none";

            })
    }

    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
    </script>
</body>

</html>