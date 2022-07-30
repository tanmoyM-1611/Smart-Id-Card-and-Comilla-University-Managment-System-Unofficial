<?php 
       
        include("../functionAdmin.php")  ;
       
        session_start();
        $id=$_SESSION['userID'];
        if($id==null){
         header("location:login.php");
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
            <a href="home.php">
                <h3>Home</h3>
            </a>
            <a href="idCard.php">
                <h3>Id Card</h3>
            </a>
            <a href="formfill.php">
                <h3>Form Fillup</h3>
            </a>
            <a href="result.php">
                <h3>Result</h3>
            </a>
            <a href="about.php">
                <h3>About</h3>
            </a>
            <!-- <a href="#">Courses</a>
  <a href="#">Faculty</a> -->
  <a href="contact.php">
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
                  
                </div>
            </nav>
            <!-- Navigation bar end  -->

            <br>
            <div>
                <h1 style="text-align:center">Search Your Result!</h1>
            </div>

            <div class="row" style="margin: 0px 20px 5px 20px">
                <div class="col-sm-6 container mt-3 mb-3">
                    <div class="card ">
                        <div class="card-body">
                            <form class="form" method="POST" action="">
                                <label for="exampleInputEmail1">Student ID:</label>
                                <input class="form-control mt-3" type="search" placeholder="Enter Id Card No."
                                    name="id_no">
                                <small id="emailHelp" class="form-text text-muted">Every student's should have unique Id
                                    no.</small>
                                <br>
                            <!-- Session -->
                                <label class="mt-3" for="exampleInputEmail1">Session:</label>
                                <!-- <input class="form-control mt-3" type="search" placeholder="Enter Session No."
                                    name="id_no"> -->
                                    <select class="form-select mt-3" aria-label="Default select example">
  <option selected>Choose Your Session</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>

<!-- Semester -->
<label class="mt-3" for="exampleInputEmail1">Semester:</label>
<select class="form-select mt-3" aria-label="Default select example">
  <option selected>Choose Your Semester</option>
  <option value="1">1st</option>
  <option value="2">2nd</option>
  <option value="3">3rd</option>
</select>
                                <small id="emailHelp" class="form-text text-muted">Every student's should have unique Id
                                    no.</small>
                                <br>
                                <button class="btn btn-outline-primary mt-3 " type="submit"
                                    name="search">Generate</button>
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