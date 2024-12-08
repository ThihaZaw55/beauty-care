<?php
     include 'conn.php';
     $books=mysqli_query($connection,"Select * from appointment order by appointment_id desc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
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
    </style>
</head>
<body style="background-color:#e0e4ed;">
    <?php
        include 'header.php';
    ?>
    <br>
    <br>
    <br>
    <main class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 class="text-center text-dark fs-4">Appointment Detail Lists</h3>
            </div>
        </div>

        <!-- Search -->
         
         <div class="row">
            <div class="col-md-3">
                <form action="" method="post">
                    <!-- <input name="search" type="text" class="form-control" placeholder="Search Doctor Name..."/>
                    <button name="btnsearch" class="btn btn-info">Search</button>
                    <button name="btnshow" class="btn btn-info">show All</button> -->

                </form>
            </div>
            
            </div>

         </div>
        <!-- Search -->

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning"> 
                        <th>Token No</th>
                        <th>Patient Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Doctor Name</th>
                        <th>Types</th>
                        <th>Booking Date</th>
                        <th>Appointment Date</th>
                        <th></th>
                        <th>Cancel Date</th>
                        <th></th>
                    </tr>
                    <?php
                      
                        
                        // Search
                       

                        
                        while($out=mysqli_fetch_array($books)) 
                        {
                            $check=$out['status'];
                            if($check>0)
                            {
                                $show='<tr class="mark">';
                            }
                            else
                            {
                                $show='<tr>';
                            }
                                $show.='<td>'."BC2024-101".$out['appointment_id'].'</td>';
                                $show.='<td>'.$out['patientname'].'</td>';
                                $show.='<td>'.$out['email'].'</td>';
                                $show.='<td>'.$out['phone'].'</td>';
                                $show.='<td>'.$out['date_of_birth'].'</td>';
                                $show.='<td>'.$out['gender'].'</td>';

                                $show.='<td>';
                                $appointmentid=$out['appointment_id'];// orders table id =2
                                $order=mysqli_query($connection,"SELECT payment.*, treatments.*, staff.* 
                                 FROM payment
                                 INNER JOIN treatments ON payment.treatment_id = treatments.treatment_id
                                 LEFT JOIN staff ON treatments.staff_id = staff.staff_id
                                 WHERE payment.appointment_id = '$appointmentid'");
                            while($row=mysqli_fetch_assoc($order))
                                {
                                    $show.='<ul><li>'.$row['username'].'('.$row['speciality'].')'.'</li></ul>';

                                }
                                $show.='</td>';
                                $show.='<td>';
                            $appointmentid=$out['appointment_id'];// orders table id =2
                            $order=mysqli_query($connection,"Select payment.* ,treatments.* from payment left join treatments on payment.treatment_id=treatments.treatment_id where payment.appointment_id='$appointmentid'");
                        while($row=mysqli_fetch_assoc($order))
                            {
                                $show.='<ul><li>'.$row['name'].'</li></ul>';
                            }
                                $show.='</td>';
                            $show.='<td>'.$out['bookingdate'].'</td>';

                            $chesec=$out['status'];// 0 or 1

                            if($chesec>0)
                            {
                                $show.='<td>'.$out['appointmentdate'].'</td>';
                            }
                            else
                            {
                                $show.='<td>ToAppointment</td>';
                            }
                            if($out['status'])//0 
                            {
                               $show.='<td><a href="status.php?id='.$out['appointment_id'].'&status=0" class="btn btn-outline-danger btn-sm"><i class="bi bi-x"></i></a></td>';  
                            }
                            else // 1
                            {
                                $show.='<td><a href="status.php?id='.$out['appointment_id'].'&status=1" class="btn btn-outline-primary btn-sm"><i class="bi bi-book"></i></a></td>';
                            }
                            $chesec=$out['status'];// 0 or 1
                            if($chesec>1)
                            {
                                $show.='<td>'. date('Y/M/d').'</td>';
                            }
                            else
                            {
                                $show.='<td>ToCancel</td>';
                            }
                            if($out['status'])
                            {
                               $show.='<td><a href="status.php?caid='.$out['appointment_id'].'&status=0" class="btn btn-outline-danger btn-sm"><i class="bi bi-x"></i></a></td>';  
                            }
                            else 
                            {
                                $show.='<td><a href="status.php?caid='.$out['appointment_id'].'&status=2" class="btn btn-outline-danger btn-sm"><i class="bi bi-x"></i></a></td>';
                            }

                            $show.='</tr>';
                            echo $show;       
                        }   
                        //  and ap.appointmentdate = curdate()
                        // if(isset($_POST['btnsearch']))
                        // {
                        //     $search = $_POST['search'];

                        //     $result = mysqli_query($connection,"select * from appointment ap inner join patients pat ON ap.patient_id = pat.patient_id  and  pat.username like '%Thiha%';");
                            
                        //     // $result = mysqli_query($connection,"SELECT payment.*, treatments.*, staff.* 
                        //     //      FROM payment
                        //     //      INNER JOIN treatments ON payment.treatment_id = treatments.treatment_id
                        //     //      LEFT JOIN staff ON treatments.staff_id = staff.staff_id
                        //     //      WHERE staff.username = 'Dr.Sophia Davis(Aesthetic Physician)'");
                        //     if($result){
                               
                        //         if(mysqli_num_rows($result) > 0) {
                        //             while($out = mysqli_fetch_array($result)){
                        //                 echo "<tr>
                        //                         <td>BC2024-101".$out['appointment_id']."</td>
                        //                         <td>".$out['patientname']."</td>
                        //                         <td>".$out['email']."</td>
                        //                         <td>".$out['phone']."</td>
                        //                         <td>".$out['date_of_birth']."</td>
                        //                         <td>".$out['gender']."</td>
                        //                         <td>".$search."</td>
                        //                     </tr>";
                        //             }

                        //         }else {
                        //             echo "<h1>Data Not Fount</h1>";
                        //         }
                        //     }
                        // }
                    
                            ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>