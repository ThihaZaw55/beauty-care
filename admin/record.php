<?php
session_start();
include 'conn.php';
$books=mysqli_query($connection,"Select * from appointment order by appointment_id desc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link rel="stylesheet" href="sytles/treatment.css" />
</head>
<body style="background-color:#e0e4ed;">
    <?php include 'header.php'; ?>
    <br>
  <br>
  <br>
  <br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Patient Medical History Record
                        </h3>
                    </div>
                    <?php

                          if(isset($_GET['action']) && $_GET['action']=='record')
                          {
                            $recordid=$_GET['rid'];
                            $books=mysqli_query($connection,"Select * from appointment where appointment_id=$recordid order by appointment_id desc");
                            while($out=mysqli_fetch_array($books)) 
                            {
                                   
                                       
                                    $appointmentid=$out['appointment_id'];   //1
                                    $order=mysqli_query($connection,"Select payment.* ,treatments.* from payment left join treatments on payment.treatment_id=treatments.treatment_id where payment.appointment_id='$appointmentid'");
                                while($row=mysqli_fetch_assoc($order))
                                    {
                                    $treatmentid=$row['treatment_id'];      //2
                                    }
                                    $patientname=$out['patientname'];   //3

                                   
                                    //$appointmentid=$out['appointment_id'];
                                    $order=mysqli_query($connection,"   SELECT payment.*, treatments.*, staff.* 
                                     FROM payment
                                     INNER JOIN treatments ON payment.treatment_id = treatments.treatment_id
                                     LEFT JOIN staff ON treatments.staff_id = staff.staff_id
                                     WHERE payment.appointment_id = '$appointmentid'   ");
                                while($row=mysqli_fetch_assoc($order))
                                    {
                                        $doctorname=$row['username'];   //4
                                        $speciality=$row['speciality'];   // 4.1
    
                                    }

                                //$appointmentid=$out['appointment_id'];
                                $order=mysqli_query($connection,"Select payment.* ,treatments.* from payment left join treatments on payment.treatment_id=treatments.treatment_id where payment.appointment_id='$appointmentid'");
                            while($row=mysqli_fetch_assoc($order))
                                {
                                    $treatmentname=$row['name'];

                                }
                                    $appointmentid=$out['appointment_id'];// orders table id =2
                                    $order=mysqli_query($connection,"Select payment.* ,treatments.* from payment left join treatments on payment.treatment_id=treatments.treatment_id where payment.appointment_id='$appointmentid'");
                                while($row=mysqli_fetch_assoc($order))
                                    {
                                        $recorddate=$row['paymentdate'];
    
                                    }        
                            }
                          }
                            ?>       
                    <div class="card-body">
                        <form action="recordhistory.php" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Token No</label>
                                <input type="text" name="token" id="" class="form-control" value="<?php if(isset($appointmentid)){echo "BC2024-101".$appointmentid;} ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Patient Name</label>
                                <input type="text" name="pname" id="" class="form-control" value="<?php if(isset($patientname)){echo $patientname;} ?>">
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="note" id="" style="height: 100px"></textarea>
                                <label for="">Note</label>
                            </div>
                            <br>
                            <div class="mb-3 d-grid">
                                <input type="hidden" name="appointmentid" value="<?php echo $appointmentid; ?>">
                                <input type="submit" value="Submit" name="btnsubmit" class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</body>
</html>