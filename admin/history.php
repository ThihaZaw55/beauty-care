<?php
     include 'conn.php';
     include 'function.php';
     $books=mysqli_query($connection,"Select * from appointment order by appointment_id desc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History List</title>
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
        if(isset($_GET['action']) && $_GET['action'] == 'delete'){
            
            delRecord();
        }
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 class="text-center text-dark fs-4">Medical History Lists</h3>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning"> 
                        <th>Token No</th>
                        <th>Treatment Voucher</th>
                        <th>Patient Name</th>
                        <th>Doctor</th>
                        <th>Treatment</th>
                        <th>Record Date</th>
                        <th>Medical Record</th>
                        <th>Action</th>
                    </tr>
                    <?php
                            while($out=mysqli_fetch_array($books)) 
                            {
                                    $show='<tr>';
                                
                                    $show.='<td>'."BC2024-101".$out['appointment_id'].'</td>';


                                    $show.='<td>';
                                    $appointmentid=$out['appointment_id'];
                                    $order=mysqli_query($connection,"Select payment.* ,treatments.* from payment left join treatments on payment.treatment_id=treatments.treatment_id where payment.appointment_id='$appointmentid'");
                                while($row=mysqli_fetch_assoc($order))
                                    {
                                        $show.='<ul><li>'."BCV24-A10".$row['treatment_id'].'</li></ul>';
    
                                    }
                                        $show.='</td>';

                                    $show.='<td>'.$out['patientname'].'</td>';


                                    $show.='<td>';
                                    $appointmentid=$out['appointment_id'];// orders table id =2
                                    $order=mysqli_query($connection,"   SELECT payment.*, treatments.*, staff.* 
                                     FROM payment
                                     INNER JOIN treatments ON payment.treatment_id = treatments.treatment_id
                                     LEFT JOIN staff ON treatments.staff_id = staff.staff_id
                                     WHERE payment.appointment_id = '$appointmentid'   ");
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

                                    $show.='<td>';
                                    $appointmentid=$out['appointment_id'];// orders table id =2
                                    $order=mysqli_query($connection,"Select payment.* ,treatments.* from payment left join treatments on payment.treatment_id=treatments.treatment_id where payment.appointment_id='$appointmentid'");
                                while($row=mysqli_fetch_assoc($order))
                                    {
                                        $show.='<ul><li>'.$row['paymentdate'].'</li></ul>';
    
                                    }
                                        $show.='</td>';


                            $show.='<td>';
                            $appointmentid=$out['appointment_id'];
                            $order=mysqli_query($connection,"Select historyrecord.* ,appointment.* from historyrecord left join appointment on historyrecord.appointment_id=appointment.appointment_id where historyrecord.appointment_id='$appointmentid'");
                            while($row=mysqli_fetch_assoc($order))
                            {
                                $show.='<ul><li>'.$row['medicalrecord'].'</li></ul>';
                                //$show.=$row['medicalrecord'];       
                            }
                                            $show.='</td>';
                                            
                                    $show.='<td>
                                        <a href="record.php?action=record&rid='.$out['appointment_id'].'" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="history.php?action=delete&rid='.$out['appointment_id'].'" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></a>
                                    </td>';
                                    
                                $show.='</tr>';
                                echo $show;       
                            }
                            ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>