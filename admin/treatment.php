<?php
     include 'conn.php';
     include 'function.php';
     session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatments List</title>
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
            background-color:#e0e4ed;
        }
        main{
            background-color: transparent;
            box-sizing: border-box;
            backdrop-filter: blur(40px);
        }
        table img{
            border-radius: 200px;
        }
        #edit, #delete{
            position: absolute;
            top: 0;
            right: 0px;
            background: #eee;
            padding: 5px 8px;
            visibility: hidden;
            opacity:0;
            backdrop-filter: blur(10px);
            border-radius:10px;
            font-size:bold;
        }
        #editlink, #deletelink{
            position: relative; 
        }
         #editlink:hover #edit {
            right: -140%; 
            visibility: visible;
            opacity:1;
        }
         #deletelink:hover #delete{
            right: -190%; 
            visibility: visible;
            opacity:1;
        }
    </style>
</head>
<body style="background-color:#e0e4ed;">
    <?php
        include 'header.php';
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 class="text-center text-dark fs-4">Treatments Lists</h3>
            </div>
        </div>

        <!-- Add Treatment Message Box -->
        <?php  
            if ( isset($_SESSION['add']) ) {     
        ?>
          <div class="alert alert-warning alert-dismissible fade show" id="massage" role="alert">
            <strong>Hey!</strong> Successfully <strong class='text-warning'><?php echo $_SESSION['add']; ?></strong> Treatment
            <button type="button" onclick="hide()" class="btn-close" id="btnClose" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
            unset($_SESSION['add']);
            }
        ?>
        <!-- Add Treatment Message Box -->

        <!-- Edit Treatment Message Box -->
         <?php  
            if ( isset($_SESSION['edit']) ) { 
          
        ?>
          <div class="alert alert-info alert-dismissible fade show" id="massage" role="alert">
          <strong>Hey!</strong> Successfully <strong class='text-info'><?php echo $_SESSION['edit']; ?></strong> Treatment
            <button type="button" onclick="hide()" class="btn-close" id="btnClose" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
            unset($_SESSION['edit']);
            }
        ?>
        <!-- Edit Treatment Message Box -->

        <!-- Delete Treatment Message Box -->
        <?php
            if(isset($_GET['action']) && $_GET['action'] == 'delete'){ 
                
                delTreatment();
        ?>   
                <div class="alert alert-danger alert-dismissible fade show" id="massage" role="alert">
                    <strong>Hey!</strong> Successfully <strong class="text-danger">Delete</strong> Treatment!
                    <button type="button" onclick="hide()" class="btn-close" id="btnClose" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        ?>
        <!-- Delete Treatment Message Box -->

        <!--  Treatment Table List-->
        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning">
                        <th>Photo</th> 
                        <th>No</th>
                        <th>Doctor Name</th>
                        <th>Treatment Name</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $query="Select treatments.*,staff.* from treatments,staff where treatments.staff_id=staff.staff_id order by treatment_id desc";
                        $go_query=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($go_query))
                    
                        {
                            $treatmentid=$row['treatment_id']; 
                            $staffname=$row['username']; 
                            $treatmentname=$row['name'];
                            $speciality=$row['speciality'];
                            $description=$row['description']; 
                            $duration=$row['duration'];
                            $price=$row['price'];
                            $photo=$row['photo'];
    
                            echo "<tr>";
                            echo "<td><img src='../Photo/{$photo}' alt='$photo' width='110' height='100'></td>";
                            echo "<td>{$treatmentid}</td>";
                            echo "<td>{$staffname} ({$speciality})</td>";
                            echo "<td>{$treatmentname}</td>";
                            echo "<td>{$description}</td>";
                            echo "<td>{$duration} mins</td>";
                            echo "<td>{$price} MMK</td>";
                            echo "<td>
                                <a href='treatmentedit.php?action=edit&tid={$treatmentid}' class='btn btn-outline-info btn-sm' id='editlink'>
                                    <i class='bi bi-arrow-bar-up'></i>
                                    <span id='edit'>Edit</span>
                                </a>
                                
                                <a href='treatment.php?action=delete&tid={$treatmentid}' class='btn btn-outline-danger btn-sm' id='deletelink'>       
                                    <i class='bi bi-trash3'></i>
                                    <span class='text-dark' id='delete'>Delete</span>
                                </a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>

                <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Delete</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Model -->

            </div>
        </div>
    </main>
    <script>
        function hide(){
            const massage = document.getElementById('massage');
            massage.style.display='none';
        }
    </script>
</body>
</html>