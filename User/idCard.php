<?php 
       
        include("../functionAdmin.php")  ;
        $studentInfo=new deptProject;
        $html = '';
        if(isset($_POST['search'])){

             $id_no = $_POST['id_no'];
             $data= $studentInfo->display_data_by_id_fromUser($id_no);

            
           if($data){
 
            
             $html="<div class='card' style='width:350px; padding:0;' >";
     
               $html.="";
                       
                             
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
        
                          
                             
                             $html.="
                                        <!-- second id card  -->
                                        <div id='idBody' class='container' style='text-align:left; border:2px dotted black;'>
                                              <div class='header'>
                                             
                                              </div>
                                  
                                              <div class='container-2'>
                                                  <div class='box-1'>
                                                  <img src='upload/$std_img'>
                                                  </div>
                                                  <div class='box-2'>
                                                      <h2>$stdName</h2>
                                                      <p>$stdHallName</p>
                                                      
                                                  </div>

                                                  <div class='box-bar'>
                                                      <svg id='barcode'></svg>
                                                  </div>


                                                  <div class='box-3'>
                                                      <img src='assets/images/coulogo3.jpg'alt=''>
                                                       
                                                      
                                                  </div>
                                              </div>
                                  
                                              <div class='container-3'>
                                                  <div class='info-1'>
                                                      <div class='id'>
                                                          <h4>ID No</h4>
                                                          <p>$stdRegNumber</p>
                                                      </div>
                                  
                                                      <div class='phone'>
                                                          <h4>Phone</h4>
                                                          <p>$stdPhnNumber</p>
                                                      </div>
                                  
                                                  </div>
                                                  <div class='info-2'>
                                                      <div class='dept'>
                                                          <h4>Department</h4>
                                                          <p>$stdDeptName</p>
                                                      </div>
                                                      <div class='session'>
                                                          <h4>Session</h4>
                                                          <p>$stdSession</p>
                                                      </div>
                                                  </div>
                                                  <div class='info-3'>
                                                      <div class='dob'>
                                                          <h4>Date Of Birth</h4>
                                                          <p>$stdDOB </p>
                                                          

                                                      </div>
                                                      <div class='address'>
                                                      <h4>Address</h4>
                                                      <p> $stdParmanentAddress</p>
                                                  </div>
                                                      
                                                  </div>
                                                  
                                                  <div class='info-4'>
                                                      <div class='sign'>
                                                          <br>
                                                          <h5>$stdName</h5>
                                                          <p style='font-size:12px;'>Your Signature</p>
                                                      </div>

                                                      
                                                      
                                                  </div>
                                                  <!-- id card end -->
                                                 
                                        ";

                                      


           }
           else{
            echo '<script type ="text/JavaScript">';  
            echo "alert('Don't found any data!')";  
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

    <style>
    body {
        font-family: 'arial';
    }

    .lavkush img {

        border-radius: 8px;
        border: 2px solid blue;
    }

    span {

        font-family: 'Orbitron', sans-serif;
        font-size: 16px;
    }

    hr.new2 {
        border-top: 1px dashed black;
        width: 350px;
        text-align: left;
        align-items: left;
    }

    /* second id card  */
    p {
        font-size: 13px;
        margin-top: -5px;
    }

    .container {
        width: 80vh;
        height: 45vh;
        margin: auto;
        background-color: white;
        box-shadow: 0 1px 10px rgb(146 161 176 / 50%);
        overflow: hidden;
        border-radius: 10px;
    }

    .header {
        /* border: 2px solid black; */
        width: 73vh;
        height: 14vh;
        margin: 10px auto;
        background-color: white;
        /* box-shadow: 0 1px 10px rgb(146 161 176 / 50%); */
        /* border-radius: 10px; */
        background-image: url(assets/images/cou.PNG );
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
    }

    .header h1 {
        color: rgb(27, 27, 49);
        text-align: right;
        margin-right: 20px;
        margin-top: 15px;
    }

    .header p {
        color: rgb(157, 51, 0);
        text-align: right;
        margin-right: 22px;
        margin-top: -10px;
    }

    .container-2 {
        /* border: 2px solid red; */
        width: 73vh;
        height: 10vh;
        margin: 0px auto;
        margin-top: -20px;
        display: flex;
    }

    .box-1 {
        border: 4px solid black;
        width: 90px;
        height: 95px;
        margin: -30px 25px;
        border-radius: 3px;
    }

    .box-1 img {

        width: 82px;
        height: 87px;


    }

    .box-2 {
        /* border: 2px solid purple; */
        width: 33vh;
        height: 8vh;
        margin: 7px 0px;
        padding: 7px 7px 0px 0px;
        text-align: left;
        font-family: 'Poppins', sans-serif;

    }

    .box-2 h2 {
        font-weight: bold;
        font-size: 1.2rem;
        margin-top: -5px;
        color: rgb(27, 27, 49);
        ;
    }

    .box-2 p {
        font-size: 1rem;
        margin-top: -5px;
        color: rgb(27, 27, 49);
    }

    .box-bar {
        width: 20vh;
        height: 20vh;

        padding-top: 11px;
    }

    .box-bar svg {
        width: 16vh;

    }

    .box-3 {
        /* border: 2px solid rgb(21, 255, 0); */
        width: 20vh;
        height: 20vh;
        margin: 8px 35px 8px 40px;
        padding-top: 11px;
    }

    .box-3 img {
        width: 12vh;
    }

    .container-3 {
        /* border: 2px solid rgb(111, 2, 161); */
        width: 73vh;
        height: 12vh;
        margin: 0px auto;
        margin-top: 10px;
        display: flex;
        font-family: 'Shippori Antique B1', sans-serif;
        font-size: 0.7rem;
    }

    .info-1 {
        /* border: 1px solid rgb(255, 38, 0); */
        width: 17vh;
        height: 12vh;
    }

    .id {
        /* border: 1px solid rgb(2, 92, 17); */
        width: 17vh;
        height: 5vh;
    }

    .id h4 {
        color: rgb(179, 116, 0);
        font-size: 15px;
    }

    .phone {
        /* border: 1px solid rgb(0, 46, 105); */
        width: 17vh;
        height: 5vh;
        margin: 8px 0px 0px 0px;
    }

    .phone h4 {
        color: rgb(179, 116, 0);
        font-size: 15px;
    }

    .info-2 {
        /* border: 1px solid rgb(4, 0, 59); */
        width: 17vh;
        height: 12vh;
    }

    .dept {
        /* border: 1px solid rgb(2, 92, 17); */
        width: 17vh;
        height: 5vh;
    }

    .dept h4 {
        color: rgb(179, 116, 0);
        font-size: 15px;
    }

    .session {
        /* border: 1px solid rgb(0, 46, 105); */
        width: 17vh;
        height: 5vh;
        margin: 8px 0px 0px 0px;
    }

    .session h4 {
        color: rgb(179, 116, 0);
        font-size: 15px;
    }

    .info-3 {
        /* border: 1px solid rgb(255, 38, 0); */
        width: 17vh;
        height: 12vh;
    }

    .dob {
        /* border: 1px solid rgb(2, 92, 17); */
        width: 22vh;
        height: 5vh;
    }

    .dob h4 {
        color: rgb(179, 116, 0);
        font-size: 15px;
    }

    .phone {
        /* border: 1px solid rgb(0, 46, 105); */
        width: 17vh;
        height: 5vh;
        margin: 8px 0px 0px 0px;
    }

    .info-4 {
        /* border: 2px solid rgb(255, 38, 0); */
        width: 22vh;
        height: 12vh;
        margin: 0px 0px 0px 0px;
        font-size: 15px;
    }

    .phone h4 {
        color: rgb(179, 116, 0);
        font-size: 15px;
    }

    .address {
        /* border: 1px solid rgb(0, 46, 105); */
        width: 17vh;
        height: 5vh;
        margin: 8px 0px 0px 0px;
    }

    .address h4 {
        color: rgb(179, 116, 0);
        font-size: 15px;
    }

    .sign {
        /* border: 1px solid rgb(0, 46, 105); */
        width: 17vh;
        height: 5vh;
        margin: 41px 0px 0px 20px;
        text-align: center;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <section>
        <?php
        // if($data){
           
        // }

        ?>
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

            <div class="row" style="margin: 0px 20px 5px 20px">
                <div class="col-sm-6 conatiner mt-3 mb-3">
                    <div class="card ">
                        <div class="card-body">
                            <form class="form" method="POST" action="">
                                <label for="exampleInputEmail1">Student Id Card No</label>
                                <input class="form-control mt-3" type="search" placeholder="Enter Id Card No."
                                    name="id_no">
                                <small id="emailHelp" class="form-text text-muted">Every student's should have unique Id
                                    no.</small>
                                <br>
                                <button class="btn btn-outline-primary mt-3 " type="submit"
                                    name="search">Generate</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6  mt-3 mb-3">

                    <div class="card">
                        <div class="card-header">
                            Here is your Id Card
                        </div>
                        <div class="card-body" id="mycard">
                            <?php echo $html ?>
                        </div>
                    </div>



                    <button id="download" class="downloadtable btn btn-primary mt-2"> Download Id Card</button>

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
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {
                const idBody = this.document.getElementById("idBody");
                console.log(idBody);
                console.log(window);
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
                html2pdf().from(idBody).set(opt).save();

            })
    }


    JsBarcode("#barcode", "<?php echo $stdRegNumber?>", {
        format: "",
        lineColor: "#000000",
        width: 2,
        height: 20,
        displayValue: true
    });
    </script>
</body>

</html>