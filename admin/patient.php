<?php
     include 'conn.php';
     include 'function.php';
     ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
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
            top: -140%; 
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
        if(isset($_GET['action']) && $_GET['action'] == 'delete'){
            
            delPatient();
        }
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 class="text-center text-dark fs-4">Patient Lists</h3>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-9">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning"> 
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $query = "Select * from patients order by patient_id desc";
                        $go_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_array($go_query)){
                            $patientid=$row['patient_id'];  
                            $username=$row['username'];
                            $email=$row['email']; 
                            $phone=$row['phone']; 
                            $date=$row['date_of_birth'];
                            $gender=$row['gender'];

                            echo "<tr>";
                            echo "<td>{$patientid}</td>";
                            echo "<td>{$username}</td>";
                            echo "<td>{$email}</td>";
                            echo "<td>{$phone}</td>";
                            echo "<td>{$date}</td>";
                            echo "<td>{$gender}</td>";
                            echo "<td>
                            
                                <a href='patientedit.php?action=edit&pid={$patientid}' id='editlink' class='btn btn-outline-info btn-sm'>
                                <i class='bi bi-arrow-bar-up'></i>
                                <span id='edit'>Edit</span>
                                </a>
                                <a href='patient.php?action=delete&pid={$patientid}'id='deletelink' class='btn btn-outline-danger btn-sm'><i class='bi bi-trash3'></i>
                                    <span class='text-dark' id='delete'>Delete</span>

                                </a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </main>
</body>
</html>
<?php
  ob_end_flush();
?>