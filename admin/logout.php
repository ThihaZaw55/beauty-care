<?php
session_start();
unset($_SESSION['staff']);
header('location:adminlogin.php');
?>