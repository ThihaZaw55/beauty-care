<?php
    session_start();
    include 'conn.php';
    include 'function.php';
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Staff Form</title>
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: Georgia, serif, Arial, sans-serif;
 
}
main{
     background-color: transparent;
     box-sizing: border-box;
      backdrop-filter: blur(40px);
}
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
  <body style="background-color:#e0e4ed;">
    <?php
      include 'header.php';
    ?>
    <main>
    <?php  
      $errors = [];
      $username = $password = $email = $phone = $role=$speciality= '';
            if(isset($_POST['btnaddstaff']))
            {
              // $username=$_POST['uname'];
              // $password=$_POST['pword'];
              // $email=$_POST['email'];
              // $phone=$_POST['phone'];
              // $role=$_POST['role'];
              // $speciality=$_POST['special'];
              $errors = addStaff();

            }  
        ?>
      <section class="container-fluid row mt-5 justify-content-center">
        <div class="col-md-5">
        <br>
        <br>
        <h3 class="text-center">Add Staff Form</h3><br>
        <?php
          if( isset($errors['error']) ) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" id="massage" role="alert">
            <!-- <strong>Hey!</strong> Successfully <strong class='text-warning'><?php echo $_SESSION['add']; ?></strong> Treatment -->
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['error']) ? $errors['error'] : ""; ?></p>
            <!-- <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['success']) ? $errors['success'] : ""; ?></p> -->
            <button type="button" onclick="hide()" class="btn-close" id="btnClose" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php  
        }
        ?>
        <?php
          if( isset($errors['success']) ) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" id="massage" role="alert">
            <!-- <strong>Hey!</strong> Successfully <strong class='text-warning'><?php echo $_SESSION['add']; ?></strong> Treatment -->
            <!-- <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['error']) ? $errors['error'] : ""; ?></p> -->
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['success']) ? $errors['success'] : ""; ?></p>
            <button type="button" onclick="hide()" class="btn-close" id="btnClose" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php  
        }
        ?>
        
        <form method="post" onsubmit="return validatePassword()">
          <div class="mb-3">
            <label for="" class="form-label fw-bold">User Name</label>
            <input type="text" name="uname" class="form-control" id="idusername"/>
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Password</label>
            <div class="d-flex">
                <input type="password" name="pword" value="" class="form-control" id="idpassword" />
                    <a class="rounded-2" onclick="eye()" id="pseye">
                      <i class="bi bi-eye-slash" id="eye-slash"></i>
                      <i class="bi bi-eye hide" id="eye"></i>
                    </a>
            </div>
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['pword']) ? $errors['pword'] : ""; ?></p>
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Email</label>
            <input type="email" name="email"  placeholder="username@gmail.com" class="form-control" id="idemail" />
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['email']) ? $errors['email'] : ""; ?></p>
            
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Phone</label>
            <input type="text" name="phone" class="form-control" id="idphone"/>
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['phone']) ? $errors['phone'] : ""; ?></p>
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Role</label>
             <select name="role" class="form-control" id="">
              <option value="Doctor">Admin</option>
              <option value="Doctor">Doctor</option>
              <option value="Doctor">Therapist</option>
              <option value="Doctor">Clinic Man</option>
              <option value="Doctor">Consultant</option>
              <option value="Doctor">Nurse</option>
              <option value="Doctor">Laser Tech</option>
              <option value="Doctor">Surgical a</option>
              <option value="Doctor">Skin Rejuv</option>
              <option value="Doctor">Laser Hair</option>
              <option value="Doctor">Cosmetic Sale</option>
             </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Speciality</label>
            <select name="special" class="form-control" id="">
              <option value="Doctor">Admin</option>
              <option value="Doctor">Dermatology</option>
              <option value="Doctor">Massage Therapy</option>
              <option value="Doctor">Patient relations</option>
              <option value="Doctor">Make informed decisions</option>
              <option value="Doctor">Surgical aesthetic</option>
              <option value="Doctor">Assistance</option>
              <option value="Doctor">Cosmetic Surgery</option>
              <option value="Doctor">Skin resurfacing</option>
              <option value="Doctor">Acne Scar Reduction</option>
              <option value="Doctor">Plastic Surgeon</option>
              <option value="Doctor">Laser Specialist</option>
              <option value="Doctor">Cosmetic Dermatologist</option>
             </select>
          </div>
        <button type="submit" name="btnaddstaff" class="btn btn-primary w-100 my-3 fw-bold">Add Staff</button>
        </form>
        <br>
          </div>
      </section>
    </main>
    <!-- main -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script>
      // Password Eye
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

    // Password Validate
    function validatePassword() {
      var username = document.getElementById("idusername").value;
      var password = document.getElementById("idpassword").value;
      var email = document.getElementById("idemail").value;
      var phone = document.getElementById("idphone").value;

      if(username == ""){
        alert("Enter Username");
        return false;
      }
      else if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
      }
      else if (email == "") {
        alert("Please Enter Email");
        return false;
      }
      else if (phone == "" && phone.length < 10) {
        alert("Enter Phone Number must be 9");
        return false;
      }
      return true;
}

// Hide Message
function hide(){
            const massage = document.getElementById('massage');
            massage.style.display='none';
        }
  </script>
  </body>
</html>
<?php
  ob_end_flush();
?>