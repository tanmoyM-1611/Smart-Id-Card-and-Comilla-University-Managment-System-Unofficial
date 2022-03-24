<?php
   include("../functionAdmin.php")  ; 
   
//    session_start();
//    $id=$_SESSION['adminID'];
//    if($id==null){
//     header("location:login.php");
//    }

   $projectAdmin=new deptProject;
   $stdData= $projectAdmin->displayData();

  //  delete data
  if(isset($_GET['status'])){
    if($_GET['status']='verified'){
        $id=$_GET['id'];
      $data= $projectAdmin->display_data_by_id_fromAdmin($id);
      
      $stdId=$data["id"];
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
      $stdStatus=$data["stdStatus"];
           
    }
}

if(isset($_POST["verified"])){
    $projectAdmin->verified_data($_POST);
     }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link href="../Admin//style.css" rel="stylesheet" />
</head>

<body>
    <section>
        <div class="sidenav">
            <a href="template.php">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>

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

                    </div>
                </div>
            </nav>

            <div class="card card-body">

                <form action="" onsubmit="" method="POST" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputDeptName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="inputDeptName"
                            value="<?php if(isset($data)){echo $stdDeptName;}?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputHallName4" class="form-label">Hall</label>
                        <input type="text" value="<?php if(isset($data)){echo $stdHallName;}?>" class="form-control"
                            id="inputHallName4">
                    </div>
                    <!-- name -->
                    <div class="col-12">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName"
                            value="<?php if(isset($data)){echo $stdName;}?>" placeholder="">
                    </div>
                    <!-- Fathers Name -->
                    <div class="col-md-6">
                        <label for="inputFathersName" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" value="<?php if(isset($data)){  echo $stdFatherName;}?>"
                            id="inputFathersName">
                    </div>

                    <!-- Mothers Name -->
                    <div class="col-md-6">
                        <label for="inputMothersName" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="inputMothersName"
                            value="<?php if(isset($data)){ echo $stdMotherName;}?>">
                    </div>

                    <!-- Registration -->
                    <div class="col-md-6">
                        <label for="inputRegistrationNumber" class="form-label">Registration Number</label>
                        <input type="number" value="<?php if(isset($data)){ echo $stdRegNumber;}?>" class="form-control"
                            id="inputRegNumber">
                    </div>

                    <!-- Session -->

                    <div class="col-md-6">
                        <label for="inputSession" class="form-label">Session</label>
                        <input type="text" class="form-control" value="<?php if(isset($data)){ echo $stdSession;}?>"
                            id="inputSession" placeholder="2017-18">
                    </div>
                    <!-- img -->

                    <!-- DOB -->
                    <div class="col-md-6">
                        <label class="form-label" for="birthday">Date Of Birth:</label>
                        <br>
                        <input class="form-control" id="today" type="date"
                            value="<?php if(isset($data)){ echo $stdDOB;}?>">
                        <br>
                    </div>

                    <!-- Age -->
                    <div class="col-md-6">
                        <label for="inputAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="inputAge"
                            value="<?php if(isset($data)){echo $stdAge;}?>">
                    </div>

                    <!-- Religion -->
                    <div class="col-md-6">
                        <label for="inputReligion" class="form-label">Religion</label>
                        <input type="text" class="form-control" id="inputReligion"
                            value="<?php if(isset($data)){ echo $stdReligion;}?>">
                    </div>

                    <!-- Nationality -->
                    <div class="col-md-6">
                        <label for="inputNationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" id="inputNationality"
                            value="<?php if(isset($data)){ echo $stdNationality;}?>">
                    </div>
                    <!-- Mobile -->
                    <div class="col-md-12">
                        <label for="inputNumber" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="inputRegNumber"
                            value="<?php if(isset($data)){ echo $stdPhnNumber;}?>">
                    </div>
                    <!-- address1 -->
                    <div class="col-6">
                        <label for="inputPresentAddress" class="form-label">Present Address</label>
                        <input type="text" class="form-control" id="inputAddress"
                            value="<?php if(isset($data)){ echo $stdPresentAddress;}?>">
                    </div>
                    <!-- address2 -->
                    <div class="col-6">
                        <label for="inputParmanentAddress" class="form-label">Parmanent Address </label>
                        <input type="text" class="form-control" id="inputAddress2"
                            value="<?php if(isset($data)){ echo $stdParmanentAddress;}?>">
                    </div>
                    <div class="col-12">

                    </div>


                    <div class="col-12">
                        <!-- <button type="submit" name="add_info" class="btn btn-primary">Save</button> -->
                        <input type="hidden" name="std_id" value="<?php echo $stdId?>">
                        <input type="hidden" name="ustdStatus" value="1">
                    </div>
                    <div class="col-12 mt-2">
                        <!-- <input  id="verified-Button" class="form-control bg-warning" type="submit" value="Verified Information"
                            name="verified"> -->

                            <button  id="verified-Button" type="submit" name="verified" class="btn btn-primary">Verified</button> 

                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>

// document.getElementById("verified-Button").onclick = function () {
//     location.href = "www.youtube.com";
//     };
    </script>
</body>

</html>