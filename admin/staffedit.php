<?php
 ob_start();
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       
        main{
            background-color: rgba(255, 255, 255, 0.05);
            box-sizing: border-box;
            backdrop-filter: blur(40px);
        }
        img{
          border-radius: 200px;
        }
       
    </style>
</head>
    
  <body style="background-color:#e0e4ed;">
    <?php
      include 'header.php';
      include 'conn.php';
      include 'function.php';

      if(isset($_GET['action']) && $_GET['action']=='edit')
            {
                $staffid=$_GET['sid'];
                $query="Select * from staff where staff_id='$staffid'";
                $go_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($go_query))
            {
                $staffid=$row['staff_id'];
                $username=$row['username'];
                $email=$row['email'];
                $phone=$row['phone'];
                $role=$row['role'];
                $special=$row['speciality'];
            }
            }

      if ( isset($_POST['btnupdateStaff'])) {
        updateStaff();
      }
    ?>    
    <main class="container-fluid row mt-5 mb-3 justify-content-center">
          <div class="col-md-5">
            <br>
            <br>
            <h3 class="text-center p-2">Edit Staff Form</h3>
            <div class="row align-items-center">
            <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="" class="form-label fw-bold">User Name</label>
              <input type="text" name="uname" value="<?php echo $username?>" class="form-control fw-normal p-2" id="" aria-describedby="username">
            </div>
            <div class="mb-3">
              <label for="" class="form-label fw-bold">Email</label>
              <input type="email" name="email" value="<?php echo $email?>" class="form-control fw-normal p-2" id="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label fw-bold">Phone</label>
              <input type="text" name="phone" value="<?php echo $phone?>" class="form-control fw-normal p-2" id="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label fw-bold">role</label>
              <input type="text" name="role" value="<?php echo $role?>" class="form-control fw-normal p-2" id="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label fw-bold">Speciality</label>
              <input type="text" name="special" value="<?php echo $special?>" class="form-control fw-normal p-2" id="">
            </div>
            <br>
            <button type="submit" name="btnupdateStaff" class="btn btn-warning w-100 my-2">Update Staff</button>
          </form>
          </div> 
      </div>  
    </main>
    <script>

      function showImage(){
        const photoId = document.getElementById("photoId");
        const showImage = document.getElementById("showImage");

        showImage.setAttribute("src", photoId.value);
        showImage.setAttribute("alt", photoId.value);

      }

      function changeImage(){
        const photoId = document.getElementById("photoId");
        const changeImage = document.getElementById("changeImage");

        changeImage.innerHTML = photoId.value;
      }
      photoId.addEventListener("input", changeImage);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
 ob_end_flush();
 ?>