<?php
    include 'conn.php';
    include 'function.php';
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Treatment Form</title>
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
            $errors = [];
    $name = $description = $duration = $price = $photo= '';
        if ( isset($_POST['btnaddtreatment']) ) { 
          $name = $_POST['tname'];
          $description = $_POST['description'];
          $duration = $_POST['duration'];
          $price = $_POST['price'];
          $photo = $_FILES['photo']['name'];
          $_SESSION['add'] = "Added";
          $errors = addTreatment();
        }          
        ?>
      <section class="container-fluid row mt-5 justify-content-center">
      <div class="col-md-5">
        <br>
        <br>
        <h3 class="text-center">Add Treatment Form</h3><br>
        <form method="post" enctype="multipart/form-data" id="form">
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Staff Name</label>
            <select name="sname" id="" class="form-control">
                    <?php
                        $query="Select * from staff";
                        $go_query=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($go_query))
                        {
                          $staffid=$row['staff_id'];
                          $username=$row['username'];
                          {
                            echo "<option value={$staffid}>{$username}</option>";
                          }
                        }
                    ?>
            </select>
            </div>

            <!-- Treatment Name -->
            <div class="mb-3">
            <label for="name" class="form-label fw-bold">Treatment Name</label>
            <input type="text" name="tname" class="form-control" id="name" />
            <p class="text-danger fw-bold mt-1 error" id="nameError"><?php echo isset($errors['name']) ? $errors['name'] : ""; ?></p>
          </div>
            <!-- Treatment Name -->

            <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <input type="text" name="description" id="description" class="form-control" rows="3">
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['description']) ? $errors['description'] : ''; ?></p>
          </div>
            <!-- Description -->

            <!-- Duration -->
          <div class="mb-3">
            <label for="duration" class="form-label fw-bold">Duration</label>
            <input type="text" name="duration" id="duration" class="form-control" />
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['duration']) ? $errors['duration'] : ''; ?></p>
          </div>
            <!-- Duration -->

            <!-- Price -->
          <div class="mb-3">
            <label for="price" class="form-label fw-bold">Price</label>
            <input type="text" name="price" id="price" class="form-control" />
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['price']) ? $errors['price'] : ''; ?></p>
          </div>
            <!-- Price -->

            <!-- Photo -->
          <div class="mb-3">
            <label class="form-label fw-bold">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control fw-bold p-2">
            <p class="text-danger fw-bold mt-1 error"><?php echo isset($errors['photo']) ? $errors['photo'] : ''; ?></p>
          </div>
        <!-- Photo -->

        <!-- Add Btn -->
        <button type="submit" id="btnAdd" name="btnaddtreatment" class="btn btn-primary w-100 my-3 fw-bold">Add Treatment </button>
        <!-- Add Btn -->
          
      </form>
        <br>
      </div>  
      </section>
    </main>
    <!-- main -->
    <script>
//       const form = document.getElementById("form");
// const btn = document.getElementById("btnAdd");
// const treatmentName = document.getElementById("name");
// const description = document.getElementById("description");
// const duration = document.getElementById("duration");
// const price = document.getElementById("price");

// btn.addEventListener("click", (e) => {
//   e.preventDefault();
//   validateInputs();
// });

// const setError = (element, message) => {
//   const errorDisplay = element.parentElement.querySelector(".error");

//   errorDisplay.innerText = message;
//   element.classList.add("border-danger");
//   element.classList.remove("border-success");
// };

// const setSuccess = (element) => {
//   const errorDisplay = element.parentElement.querySelector(".error");

//   errorDisplay.innerText = "";
//   element.classList.add("border-success");
//   element.classList.remove("border-danger");
// };

// const validateInputs = () => {
//   const nameValue = treatmentName.value.trim();
//   const descriptionValue = description.value.trim();
//   const durationValue = duration.value.trim();
//   const priceValue = price.value.trim();

//   // Name
//   if (nameValue === "") {
//     setError(treatmentName, "Enter Name");
//   } else {
//     setSuccess(treatmentName);
//   }
//   // Name
//   // description
//   if (descriptionValue === "" ) {
//     setError(description, "Enter Description");
//   } else {
//     setSuccess(description);
//   }
//   // description

//   // duration
//   if (durationValue === "" ) {
//     setError(duration, "Enter Duration");
//   } else {
//     if (!Number(durationValue)) {
//       setError(duration, "Duration must be Number");
//     } else {
//       setSuccess(duration);
//     }
//   }
//   // duration

//   // price
//   if (priceValue === "") {
//     setError(price, "Enter Price");
//   } else {
//     if (!Number(priceValue)) {
//       setError(price, "Price must be Number");
//     } else {
//       setSuccess(price);
//     }
//   }
//   // price
// }
    </script>
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