<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>
  <style>
   .navbar-nav .nav-item a:hover{
      color: #0a50dc;
      background-color: #e6e7e8;
    }
    .active {
      background-color: #e6e7e8;
 }
  </style>
<body>
<header>
      <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid mt-2">
        <a class="navbar-brand d-flex flex-column justify-content-center ps-5" href="book_mgmt.php">
        <img src="bclogo.png" class="figure-img img-fluid rounded" alt="abcd">
        </a>
          <div
            class="collapse navbar-collapse"
            id=""
          >
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item fw-bold fs-6">
              <a class="nav-link font-monospace"  href="add.php">AddEntry</a>
               </li>
                <li class="nav-item fw-normal fs-6">
                  <a class="nav-link"  href="staff.php">Staff</a>
                </li>
                <li class="nav-item fw-normal fs-6">
                  <a class="nav-link"  href="staffdetail.php">Doctor</a>
                </li>
              <li class="nav-item fw-normal fs-6">
                <a class="nav-link"  href="patient.php">Patient</a>
              </li>
              <li class="nav-item fw-normal fs-6">
                <a class="nav-link" href="treatment.php">Treatments</a>
              </li>
              <li class="nav-item fw-normal fs-6">
                <a class="nav-link"   href="author.php"
                  >Author</a
                >
              </li>
              <li class="nav-item fw-normal fs-6">
                <a class="nav-link"  href="blog.php"
                  >Blogs</a
                >
              </li>
              <li class="nav-item fw-normal fs-6">
                <a class="nav-link"   href="book_mgmt.php"
                  >Appointments</a
                >
              </li>
              <li class="nav-item fw-normal fs-6">  
                <a class="nav-link" href="payment_mgmt.php"
                  >Payments</a
                >
              </li>
              <li class="nav-item fw-normal fs-6">
                <a class="nav-link"  href="history.php">Medical History</a>
              </li>
              <li class="nav-item fw-bold fs-6">
              <a class="nav-link text-primary font-monospace"  href="logout.php">Logout</a>
               </li>  
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <script>
      const activePage = window.location.pathname;
      const navLink = document.querySelectorAll("nav ul li a");

      navLink.forEach(link=>{
        if(link.href.includes(`${activePage}`)){
          link.classList.add("active");
        }
      });
    </script>
</body>
</html>





