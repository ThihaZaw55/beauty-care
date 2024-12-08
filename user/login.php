<?php
session_start();
include '../admin/conn.php';
if(isset($_POST['btnsignin']))
{
  $name=$_POST['username'];
  $password=$_POST['password'];
  $errors=array('username'=>'','password'=>'');
  if($name=="")
  {
    $errors['username']="This field could not be empty";
  }
  if($password=="")
  {
    $errors['password']="This field could not be empty";
  }

  $hpass=md5($password);
  $query="Select * from patients";
  $go_query=mysqli_query($connection,$query);

  while($out = mysqli_fetch_array($go_query))
  {
    $db_username=$out['username'];
    $db_password=$out['password'];
    $db_role=$out['role'];

   
    if($db_username==$name && $db_password==$hpass )
    {
      $_SESSION['patient']=$name;
      header('location:home.php');
    }else
    {
      echo "<script>window.alert('Invalid username and password')</script>";
      echo "<script>window.location.href='login.php'</script>";
    }
  }
      
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- MDB Bootstrap 5 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
  <style>
    #pseye{
      text-decoration: none;
      color: black;
      padding: 5px 15px;
      position: absolute;
      top: 0;
      right: 0;
      background-color:#EBEDF1;
    }
    .hide {
      display: none;
    }
    .show {
      display: block;
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
  <br>
    <div class="container my-5">
    <h1 class="text-center my-4">Welcome to BeautyCare Clinic Center</h1>
    <br>
    <div class="row justify-content-center">
      
      <div class="col-md-6">
        <form action="" method="post">
        <div class="card" style="background-color:#ebedf1;">
          <div class="card-body">
            <h3 class="text-center mb-4">Login</h3>
            <div class="form-outline mb-4">
              <input type="text" id="form2Example1" class="form-control" name="username" />
              <label class="form-label" for="form2Example1">User Name</label>
            </div>
            <!-- Password -->
            <div class="form-outline mb-4">
              <input type="password" id="idpassword" class="form-control" name="password" aria-label="Input group example" aria-describedby="basic-addon1" />
             
              <label class="form-label" for="form2Example2">Password</label> 
              <a class="" onclick="eye()" id="pseye">
                  <i class="bi bi-eye-slash" id="eye-slash"></i>
                  <i class="bi bi-eye hide" id="eye"></i>
              </a>
            </div>
            
            <!-- Password -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form2Example3" checked />
                  <label class="form-check-label" for="form2Example3"> Remember me </label>
                </div>
              </div>
              <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>
            <button type="submit" style="background-color:#d3d6dc;" class="btn  btn-block mb-4" name="btnsignin">Sign in</button>
            <div class="text-center">
              <p>Not a member? <a href="register.php">Register</a></p>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
  <script>
    function eye() {
      var password = document.getElementById("idpassword");

      var eyeSlashIcon = document.getElementById("eye-slash");
      var eyeIcon = document.getElementById("eye");

      if (password.type === "password") {
        password.type = "text";
        eyeSlashIcon.style.display = "none";
        eyeIcon.style.display = "block";
      } else {
        password.type = "password";
        eyeSlashIcon.style.display = "block";
        eyeIcon.style.display = "none";
      }
    }
  </script>
</body>
</html>
