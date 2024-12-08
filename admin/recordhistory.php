<?php
session_start();
include 'conn.php';
$appointment_id=$_POST['appointmentid'];
$patientname=$_POST['pname'];
$note=$_POST['note'];

//add order tabel
$query="insert into historyrecord(appointment_id,patientname,medicalrecord)";
$query.="values('$appointment_id','$patientname','$note')";
$go_query=mysqli_query($connection,$query);
$record_id=mysqli_insert_id($connection);
header("location:history.php");
?>