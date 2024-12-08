<?php
    include 'conn.php';
    include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Lists</title>
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{
            /* background-image: linear-gradient(to left top, rgb(158, 3, 201), rgb(22, 200, 160)); */
        }
        main{
            background-color: transparent;
            box-sizing: border-box;
            backdrop-filter: blur(40px);
        }
        table img{
            border-radius: 200px;
        }
    </style>
</head>
<body style="background-color:#e0e4ed;">
<div class="container-fluid col-md-6">
    <a class="navbar-brand fw-bold font-monospace fs-2" href="#"  >Beauty Care Aesthetic Clinic Booking System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div> 
<div class="container">
            <?php
                include 'header.php';
            ?>
        <div class="container-fluid col-md-7 mt-4">
          <h3 class="text-center">Add Entry Forms</h3>
          </div>        
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card border-primary mb-3">
                    <div class="card-header border-primary text-center text-primary fw-bold font-monospace bg-primary bg-opacity-10">
                        Staff
                    </div>
                    <div class="card-body text-center">
                        <a href="addstaff.php" class="btn btn-outline-primary position-relative ">Add Data
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                <?php
                                    $total="Select * from staff";
                                    $get_total=mysqli_query($connection,$total);
                                    $num=mysqli_num_rows($get_total);
                                    echo $num;
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            <div class="card border-dark mb-3">
                    <div class="card-header border-dark text-center text-dark fw-bold font-monospace bg-dark bg-opacity-10">
                        Doctor Detail
                    </div>
                    <div class="card-body text-center">
                        <a href="addstaffdetail.php" class="btn btn-outline-dark position-relative ">Add Data
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                <?php
                                    $total="Select * from staffdetail";
                                    $get_total=mysqli_query($connection,$total);
                                    $num=mysqli_num_rows($get_total);
                                    echo $num; 
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            <div class="card border-info mb-3">
                    <div class="card-header border-info text-center text-info fw-bold font-monospace bg-info bg-opacity-10">
                        Patient
                    </div>
                    <div class="card-body text-center">
                        <a href="addpatient.php" class="btn btn-outline-info position-relative ">Add Data
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                <?php
                                    $total="Select * from patients";
                                    $get_total=mysqli_query($connection,$total);
                                    $num=mysqli_num_rows($get_total);
                                    echo $num;
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>


            

            

          
        </div>

        <div class="row mt-5 justify-content-center">

        <div class="col-md-4">
            <div class="card border-primary mb-3">
                    <div class="card-header border-primary text-center text-primary fw-bold font-monospace bg-primary bg-opacity-10">
                        treatment
                    </div>
                    <div class="card-body text-center">
                        <a href="addtreatment.php" class="btn btn-outline-primary position-relative ">Add Data
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                <?php
                                    $total="Select * from treatments";
                                    $get_total=mysqli_query($connection,$total);
                                    $num=mysqli_num_rows($get_total);
                                    echo $num;
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            <div class="card border-dark mb-3">
                    <div class="card-header border-dark text-center text-dark fw-bold font-monospace bg-dark bg-opacity-10">
                        Author
                    </div> 
                    <div class="card-body text-center">
                        <a href="addauthor.php" class="btn btn-outline-dark position-relative ">Add Data
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                <?php
                                    $total="Select * from author";
                                    $get_total=mysqli_query($connection,$total);
                                    $num=mysqli_num_rows($get_total);
                                    echo $num;
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            <div class="card border-info mb-5">
                    <div class="card-header border-info text-center text-info fw-bold font-monospace bg-info bg-opacity-10">
                        Blog
                    </div> 
                    <div class="card-body text-center">
                        <a href="addblog.php" class="btn btn-outline-info position-relative ">Add Data
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                <?php
                                    $total="Select * from blogs";
                                    $get_total=mysqli_query($connection,$total);
                                    $num=mysqli_num_rows($get_total);
                                    echo $num;
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div> 

            
        </div>
            
      
</body>
</html>