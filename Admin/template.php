<?php
   include("../functionAdmin.php")  ; 
   
   session_start();
   $id=$_SESSION['adminID'];
   if($id==null){
    header("location:login.php");
   }

   $projectAdmin=new deptProject;
   $stdData= $projectAdmin->displayData();

  //  delete data
  if(isset($_GET['status'])){
    if($_GET['status']='delete'){
        $delete_id=$_GET['id'];
  $delMsg= $projectAdmin->delete_data_by_id($delete_id);
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
    <title>Dashboard - SB Admin</title>
    <link href="../Admin//style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5a1010e0a8.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed ">


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

                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="container">
                <h1 class="mt-4">Dashboard</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Students Info
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Registration Number</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Session</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while($student=mysqli_fetch_assoc($stdData)) { ?>
                                    <tr>
                                        <td><?php  echo $student["stdRegNumber"];?></td>
                                        <td><?php echo $student["stdName"];?></td>
                                        <td><?php echo $student["stdDeptName"];?></td>
                                        <td><?php echo $student["stdSession"];?></td>
                                        <td><img style="height:50px"
                                                src="../User//upload/<?php echo $student["std_img"];?>" alt=""></td>

                                        <td><?php echo $student["stdStatus"];?></td>
                                        <td>

                                            <a class="btn btn-success mt-2"
                                                href="edit.php?status=edit&&id=<?php echo $student["id"];?>">Edit</a>
                                            <a class="btn btn-danger mt-2"
                                                href="?status=delete&&id=<?php echo $student["id"];?>"> Delete</a>

                                            <?php   if(($student["stdStatus"])==0)  { echo    
                                           "<a id='ver' class='btn btn-warning  mt-2'
                                                href='verified.php?status=verified&&id=$student[id]'>Verified</a>";
                                                }
                                               
                                                ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                <footer class=" ">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
    <script src="../Admin//js/scripts.js"></script>
    <script>
    </script>
</body>

</html>