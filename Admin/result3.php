<?php
  include("../functionAdmin.php")  ; 
  error_reporting(E_ERROR | E_PARSE);
  session_start();
  $id=$_SESSION['adminID'];
  if($id==null){
   header("location:login.php");
  
 }
 error_reporting(E_ERROR | E_PARSE);
  $studentInfo=new deptProject;
  $courseInfo=new deptProject;
 
  if(isset($_POST['search'])){
       
       $id_no = $_POST['id_no'];
       $id_session=$_POST['Student_session'];
       $id_semester=$_POST['Student_semester'];
       $semester_year=$_POST["semester_finalDate"];
       $id_dept=$_POST['Student_dept'];
       $projectAdmin=new deptProject;
       
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
              echo "alert('Dont found any data!')";  
              echo '</script>'; 
             }
             $projectAdmin=new deptProject;
             $subWiseResultInfo=new deptProject;
         $stdFormData= $projectAdmin->display_formfillinfoById($stdRegNumber, $id_semester);
         $data2=$courseInfo->displayCourseDataBYSemester( $stdFormData["session_year"], $stdFormData["semester_no"], $stdFormData["dept"]);

        
         
          $data3=$subWiseResultInfo->display_result_SubjectWise_by_id($stdRegNumber,$stdFormData["semester_no"]);

  }


//  $resultSubjectWise_Student=new deptProject;
// //   add form fill data
// if(isset($_POST['add_result_subjectwise'])){
        
//         $resultSubjectWise_Student->add_result_SubjectWise($_POST);
         
// }     

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form FillUp</title>
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
    <link href='https://fonts.googleapis.com/css?family=Delius' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <section>



        <!-- Navigation bar start  -->
        <div class="sidenav">
        <a href="homeAdmin.php"><h5>Home</h5></a>
            <a href="courses.php"><h5>Courses</h5></a>
            <a href="resultAdmin.php"><h5>Result</h5></a>
            <a href="formfill_dept.php"><h5>Form Recipt</h5></a>
            <a href="notification.php"><h5>Notice+</h5></a>

            <div style="padding-top:350px" class="ms-3">
                <a href="logout.php"><button type="button" class="btn btn-success">Log out</button></a>
            </div>
        </div>
        <div class="main ">
            <nav style="background-color: #e3f2fd" class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">CSE,Comilla University</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
                <ul class="nav justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link" href="notification.php"><i style="font-size:20px"
                                class="fa-solid fa-bell"></i></a>
                    </li>

                </ul>
            </nav>
            <!-- Navigation bar end  -->

            <br>
            <div>
                <h1 style="text-align:center;color:#351C75;font-family:Delius"><b>ADD RESULT!</b></h1>
            </div>
            <div style="" class="col-sm-6 container  mt-3 mb-3 ">
                <div class="card border-5 rounded-3">
                    <div class="card-body">
                        <form class="form" method="POST" action="">

                            <label for="exampleInputEmail1">Registration Number:</label>
                            <input class="form-control mt-3" type="search" placeholder="Enter Id Card No." name="id_no"
                                required>

                            <!--Department  -->
                            <label class="mt-3" for="exampleInputEmail1">Department:</label>
                            <select name="Student_dept" id="student_dept" class="form-select mt-3"
                                aria-label="Default select example" placeholder="Choice Your Session">
                                <option selected>Choose Department</option>
                                <option value="CSE">CSE</option>
                            </select>
                            <!-- Session -->
                            <label class="mt-3" for="exampleInputEmail1">Session:</label>
                            <select name="Student_session" id="student_session" class="form-select mt-3"
                                aria-label="Default select example" placeholder="Choice Your Session">
                                <option selected>Choose Your Session</option>
                                <option value="2017-18">2017-18</option>
                                <option value="2018-19">2018-19</option>
                                <option value="2019-20">2019-20</option>
                            </select>

                            <!--Semester  -->
                            <label class="mt-3" for="exampleInputEmail1">Semester:</label>
                            <select name="Student_semester" id="student_semester" class="form-select mt-3"
                                aria-label="Default select example">
                                <option selected>Choose Your Semester</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                            </select>
                            <!-- Semester Final Year -->


                            <br>
                            <div style="text-align:center ;">
                                <button class="btn btn-outline-primary mt-3 " type="submit"
                                    name="search">Generate</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div style="margin-left:25px" class="col-sm-12  mt-5 mb-5  container ">
                <header id="form-body1" class="container card card-body mt-5  border-3 ">


                    <div style="text-align:center"><b>Id:<?php echo  $stdRegNumber?></b>
                        <br>
                        <b>Session:<?php echo  $stdSession?></b>


                        <br>
                        <b>Semester:<?php echo  $stdFormData["semester_no"]?></b>


                    </div>


               

                    <div class="card card-body ">

                        <form method="POST" class="row g-3">
                        <?php if(empty($data3)) {?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_data" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>Course Name</th>
                                            <th>Course Credit</th>

                                            <th>Total Mark</th>
                                            <th>CGPA</th>



                                        </tr>
                                    </thead>

                                  
                                   
                                    
                                    <tbody>
                                      
                                        <?php if(isset($data2)){ ?>
                                        <?php while($course_Data=mysqli_fetch_assoc($data2)) { ?>

                                        <tr>
                                           
                                            <input name="stdreg[]" type="hidden" value="<?php  echo $stdRegNumber;?>">
                                            <input name="dept[]" type="hidden" value="<?php  echo  $stdDeptName;?>">
                                            <input name="session[]" type="hidden" value="<?php  echo   $stdSession;?>">
                                            <input name="semester[]" type="hidden"
                                                value="<?php  echo $stdFormData["semester_no"];?>">

                                            <td><input name="stdCourseName[]" type="text"
                                                    value="<?php  echo $course_Data["course_name"];?>">


                                            </td>
                                            <td><input name="stdCourseCredit[]" type="text"
                                                    value=" <?php  echo $course_Data["course_credit"];?>">
                                            </td>

                                            <td><input type="number" name="stdTmSubject[]" value=""></td>

                                            <td><input type="number" name="stdCgSubject[]" step="0.01" value="">
                                            </td>
                                           
                                            
                                          
                                            
                                            <!-- <td><button name="add_result_subjectwise" class="btn btn-outline-primary " type="submit">Submit</button></td> -->
                                        </tr>

                                      



                                        <?php } ?>
                                        <?php    }?>
                                        <?php   if(empty($data2) ) { echo    
                                           "<div style='text-align:center'><h4>Please Enter Student Roll, Session & Semester For Fill Courses Info Table</h4></div>";
                                                }
                                        ?>


                                     
                         


                                    </tbody>

                                    <tfoot>
                                        <tr>

                                            <th>Course Name</th>
                                            <th>Course Credit</th>
                                            <th>Total Mark</th>
                                            <th>CGPA</th>


                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <?php if(empty($data3)) {
                          echo '<div style="text-align:center">
                            
                                 <button id="submit" name="Submit" class="btn btn-outline-primary "
                                    type="submit">Submit</button>
                            </div>';
                             } ?>
                          
                          <?php } ?>

                          <?php if(!empty($data3)) {

                            echo '<div style="text-align:center;color:red"><b>Result was Submitted into Database!!</div>';
                          }?>
                        </form>

                    </div>


            </div>


            <!-- end -->
        </div>





    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
    <!-- <script src="../User//multiselect-dropdown.js"></script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {

            var course_name = [];
            var course_credit = [];
            var total_mark = [];
            var subject_cgpa = [];
            var std_reg = [];
            var std_dept = [];
            var std_session = [];
            var std_semester = [];
            var i = 0;
            var c = 0;
            var a = 0;
            var d = 0;
            var e = 0;
            var f = 0;
            var g = 0;
            var h = 0;

            // course_name
            $('input[name="stdCourseName[]"]').each(function(index, el) {

                course_name[i++] = $(this).val();
            });

            // course_credit

            $('input[name="stdCourseCredit[]"]').each(function(index, el) {
                course_credit[c++] = $(this).val();

            });

            //  total mark
            $('input[name="stdTmSubject[]"]').each(function(index, el) {
                total_mark[a++] = $(this).val();
            });

            //cgpa

            $('input[name="stdCgSubject[]"]').each(function(index, el) {
                subject_cgpa[d++] = $(this).val();
            });
            // reg
            $('input[name="stdreg[]"]').each(function(index, el) {
                std_reg[e++] = $(this).val();
            });
            // 
            $('input[name="dept[]"]').each(function(index, el) {
                std_dept[f++] = $(this).val();
            });
            // session
            $('input[name="session[]"]').each(function(index, el) {
                std_session[g++] = $(this).val();
            });
            // semester
            $('input[name="semester[]"]').each(function(index, el) {
                std_semester[h++] = $(this).val();
            });

            $.ajax({

                url: "insertR.php",
                type: "post",
                data: {
                    course_name: course_name,
                    course_credit: course_credit,
                    total_mark: total_mark,
                    subject_cgpa: subject_cgpa,
                    std_reg: std_reg,
                    std_dept: std_dept,
                    std_session: std_session,
                    std_semester: std_semester
                },
                success: function(response) {

                }


            })

            console.log(course_name);

        })

    })
    </script>

</body>

</html>