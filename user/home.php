<?php 
session_start();
include '../admin/conn.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 3;
$offset = ($page - 1) * $limit;

// Fetch products with pagination
$query = "Select staffdetail.*,staff.* from staffdetail,staff where staffdetail.staff_id=staff.staff_id LIMIT ? OFFSET ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ii", $limit, $offset);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Get total number of products
$total_query = "SELECT COUNT(*) as total FROM staffdetail";
$total_result = mysqli_query($connection, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_products = $total_row['total'];
$total_pages = ceil($total_products / $limit);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home Page</title>
    <link rel="stylesheet" href="sytles/treatment.css">
    <!--<link rel="stylesheet" href="sytles/treatment.css" />-->
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- bootstrap icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <?php
    include 'header.php';
  ?>
  <body style="background-color:#e0e4ed;">
  
  <br>
  <br>
  <br>
  <br>
    <!-- main -->
    <main>
      <section class="container my-5" id="hero">
        <h2 class='text-center' style="color:#000000">Beauty Care Aesthetic Clinic</h2> 
      </section>
      <article class="container-md mt-2 mx-auto"></article>
      <section class="container">
      <div class="row mt-4">

<?php while ($doctor = mysqli_fetch_assoc($result)): ?>
    <div class="col-lg-4 mb-4">
        
            <div class="card border-dark border-0 " >
              <div class="card-img-top"style="height: 480px" >
              <img src="../photo/<?php echo htmlspecialchars($doctor['photo']); ?>" style="height: 480px" alt='<?php echo $doctor['photo'] ?>' class="card-img-top"/>
              </div>
                <div class="card-body text-left" style="background-color:#ebedf1;">
                    <h3 style="font-size:24px;"><?php echo htmlspecialchars($doctor['username']); ?>&nbsp;<span style="font-size:18px;">(<?php echo htmlspecialchars($doctor['speciality']); ?>)</span></h3>
                    <br>
                    <p style="font-size:17px;"><strong>Professional Credentials</strong></p>
                    <p><?php echo htmlspecialchars($doctor['professional1']); ?></p>
                    <p><?php echo htmlspecialchars($doctor['professional2']); ?></p>
                    <p><?php echo htmlspecialchars($doctor['professional3']); ?></p>
                    <p style="font-size:17px;"><strong>Certification Affiliations</strong></p>
                    <p><?php echo htmlspecialchars($doctor['certification1']); ?></p>
                    <p><?php echo htmlspecialchars($doctor['certification2']); ?></p>
                    <p><?php echo htmlspecialchars($doctor['certification3']); ?></p>
                    <p style="font-size:17px;"><strong>Experience Year</strong></p>
                    <p><?php echo htmlspecialchars($doctor['experience_year']); ?> years experience</p>
                </div>
            </div>
        
    </div>
<?php endwhile; ?>
</div>
        
        </div>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mt-5">
            <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
                <a href="?page=<?php echo $page - 1; ?>" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php if($page === $i) echo 'active'; ?>">
                    <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
                <a href="?page=<?php echo $page + 1; ?>" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
        <!-- Pagination -->
      </section>
    </main>
    <!-- main -->
     <!-- Footer -->
    <?php
     include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>  
  </body>
</html>