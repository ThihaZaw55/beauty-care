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
            background: white;
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
            top: -110%; 
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
            
            delStaff();
        }
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 class="text-center text-dark fs-4">Staff Lists</h3>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning"> 
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Speciality</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $query = "Select * from staff order by staff_id desc";
                        $go_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_array($go_query)){
                            $staffid=$row['staff_id'];  
                            $username=$row['username'];
                            $email=$row['email']; 
                            $phone=$row['phone']; 
                            $role=$row['role'];
                            $special=$row['speciality'];

                            echo "<tr>";
                            echo "<td>{$staffid}</td>";
                            echo "<td>{$username}</td>";
                            echo "<td>{$email}</td>";
                            echo "<td>{$phone}</td>";
                            echo "<td>{$role}</td>";
                            echo "<td>{$special}</td>";
                            echo "<td>
                            
                                <a href='staffedit.php?action=edit&sid={$staffid}' id='editlink' class='btn btn-outline-info btn-sm'>
                                <i class='bi bi-arrow-bar-up'></i>
                                    <span class='text-dark' id='edit'>Edit</span>
                                </a>
                                <a href='staff.php?action=delete&sid={$staffid}' id='deletelink' class='btn btn-outline-danger btn-sm'>
                                <i class='bi bi-trash3'></i>
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