<?php
ob_start();
session_start();
include '../admin/conn.php';
include 'userfunction.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
    #pseye{
      text-decoration: none;
      color: black;
      padding: 5px 15px;
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
<body style="background-color:#e0e4ed;">
<?php
    include 'header.php';
?>
  <br>
  <br>
  <br>
  <br>
    <?php
    $errors=[];
    $username=$password=$cpassword=$email=$phone=$address=$date=$gender='';
    if(isset($_POST['register']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $date=$_POST['date'];
        $gender=$_POST['gender'];
        $errors=create_accu();  

    }
    ?>
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
      <div class="row w-100 mt-5">
          
          <div id="loginForm" class="col-md-6 col-lg-5 mx-auto form-container">
          <h2 class="text-center mb-4 text-dark">Welcome to BeautyCare</h2>

          <h4 class="text-center mb-4 text-dark">Registration Form</h4>
                <form method="post">
                <div class="mb-3">
                      <label for="registerName" class="form-label">User Name</label>
                      <input type="text" class="form-control glow" id="registerName" name="username" value="<?php echo htmlspecialchars($username) ?>" >
                      <span class="text-danger"><?php echo isset($errors['username'])? $errors['username']:'' ?></span>
                  </div>
                  <div class="mb-3">
                      <label for="registerPassword" class="form-label">Password</label>
                      <div class="d-flex">
                      <input type="password" name="password" value="" class="form-control" id="idpassword" />
                        <a class="rounded-2" onclick="eye()" id="pseye">
                            <i class="bi bi-eye-slash" id="eye-slash"></i>
                            <i class="bi bi-eye hide" id="eye"></i>
                        </a>
                        </div>
                      <span class="text-danger"><?php echo isset($errors['password'])? $errors['password']:'' ?></span>
                  </div>
                  <div class="mb-3">
                      <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control glow" name="cpassword" id="registerConfirmPassword" value="<?php echo htmlspecialchars($cpassword) ?>">
                      <span class="text-danger"><?php echo isset($errors['cpassword'])? $errors['cpassword']:'' ?></span>
                  </div>
                  <div class="mb-3">
                      <label for="registerEmail" class="form-label">Email address</label>
                      <input type="email" class="form-control glow" name="email" id="registerEmail" value="<?php echo htmlspecialchars($email) ?>" placeholder="Example@email.com">
                      <span class="text-danger"><?php echo isset($errors['email'])? $errors['email']:'' ?></span>
                  </div>
                  <div class="mb-3">
                      <label for="registerPhone" class="form-label">Phone</label>
                      <input type="text" class="form-control glow" name="phone" id="registerPhone" value="<?php echo htmlspecialchars($phone) ?>" placeholder="09 123 456 789">
                      <span class="text-danger"><?php echo isset($errors['phone'])? $errors['phone']:'' ?></span>
                  </div>
                  <div class="mb-3">
                      <label for="registerDateofBirth" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control glow" name="date" id="registerDateofBirth" value="<?php echo htmlspecialchars($date) ?>">
                      <span class="text-danger"><?php echo isset($errors['date'])? $errors['date']:'' ?></span>
                  </div>
                  <div class="mb-3">
                      <label for="registerGender" class="form-label">Gender</label>
                      <select name="gender" class="form-control">
                        <option value="Male">
                            Male
                        </option>
                        <option value="Female">
                            Female
                        </option>
                        <option value="Other">
                            Other
                        </option>
                      </select>
                  </div>
                  <br>
                  <button type="submit" style="background-color:#d3d6dc;" class="btn btn-light w-100" name="register">Register</button>
                  <p class="text-center mt-1">
                      Already have an account? 
                      <a href="login.php" id="showLoginForm">Login here</a>
                  </p>
                </form>
          </div>
      </div>
    </div>
</body>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</html>
<?php
ob_end_flush();
?>