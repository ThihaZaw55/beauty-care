<?php
    include 'conn.php';
    include 'function.php';
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Patient Form</title>
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
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
    </style>
  </head>
  <body style="background-color:#e0e4ed;">
    <?php
      include 'header.php';
    ?>
    <main>
    <?php  
            if(isset($_POST['btnaddpatient']))
            {
                
                addPatient();
            }  
        ?>
      <section class="container-fluid row mt-5 justify-content-center">
      <div class="col-md-5">
        <br>
        <br>
        <h3 class="text-center">Add Patient Form</h3><br>
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="" class="form-label fw-bold">User Name</label>
            <input type="text" name="uname" class="form-control" id="" />
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Password</label>
            <input type="password" name="pword" class="form-control" id="" />
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Email</label>
            <input type="email" name="email"  placeholder="username@gmail.com" class="form-control" id="" />
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Phone</label>
            <input type="text" name="phone" class="form-control" id="" />
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Date of Birth</label>
            <input type="date" name="date" placeholder="yyyy-mm-dd" class="form-control" id="" />
          </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Gender</label>
            <!-- <input type="text" name="gender" class="form-control" id="" /> -->
            <select name="role" class="form-control" id="">
              <option value="Doctor">Male</option>
              <option value="Doctor">Female</option>
             </select>
          </div>
        <button type="submit" name="btnaddpatient" class="btn btn-info w-100 my-3 fw-bold">Add Patient</button>
        </form>
        <br>
          </div> 
      </section>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php
  ob_end_flush();
?>