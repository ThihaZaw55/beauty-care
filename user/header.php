<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Our Treatments</title>
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
    <style>
  header{
    font-weight:bold;
    backdrop-filter: blur(10px);
    background-color:transparent;
  }
  .social-icons a:hover{
    font-size: small;
  }
header .nav-item:hover:not(#close){
  background-color:#d4d4d4;
  padding-bottom:0;
 }
 nav .nav-item .nav-link:focus {
  color: blue;
}
.pointer{
  cursor: pointer;
}
#menu{
  display:none;
}
#sidebar{ 
  width: 250px;
  background-color: #f4f4f4;
  backdrop-filter: blur(10px);
  height:100vh;
  display: none;
  position: fixed;
  top: 0;
  left: -100%; 
  z-index: 999;
  transition: all 0.7s ease;
}
#sidebar li {
  width:100%;
}
#sidebar li:hover{
  background-color:#d4d4d4;
}
.active {
  border-bottom: 3px solid black;

 }
 @media (max-width: 990px){
  #sidebar{
    left: 0;
  }
  #menu{
    display: block
  }
 }
 @media (max-width: 400px){
  #sidebar{
    width: 100%;
    left: 0;
  }

 }
</style>
  </head>
  <body>
<header class="shadow fixed-top">
      <div class="container-fluid d-flex justify-content-evenly justify-content-md-between" id="login">
          <a class="navbar-brand d-flex flex-column justify-content-center ps-5" href="home.php">
            <img src="./images/logobc.png" alt="beautycare logo">
          </a>
      <div class="social-icons">
          <a href="http://www.facebook.com/" class="text-primary mx-2 d-none d-lg-inline"><i class="bi bi-facebook"></i></a>
          <a href="http://www.twitter.com/" class="text-dark mx-2 d-none d-lg-inline"><i class="bi bi-twitter-x"></i></a>
          <a href="http://www.instagram.com/" class="text-success mx-2 d-none d-lg-inline"><i class="bi bi-instagram"></i></a>
            <?php if(empty($_SESSION['patient'])): ?>
              <a class="btn btn-sm btn-outline-dark my-2 mx-2 d-none d-lg-inline" href="register.php">    
                <i class="bi bi-unlock-fill"></i>
              </a>
              <a class="btn btn-sm btn-outline-dark my-2 mx-2" href="login.php">    
                <i class="bi bi-key-fill"></i>
              </a>
              <?php else: ?>
                <a class="btn btn-sm btn-outline-dark my-2 mx-2" href="book.php">    
              <i class="bi bi-book"></i>
              </a>  
              <a class="btn btn-sm btn-outline-dark my-2 mx-2" href="logout.php">    
                <i class="bi bi-box-arrow-left"></i>
              </a>
              <?php endif; ?>
      </div>
    </div>
    
      <nav class="navbar navbar-expand-lg border-top border-secondary">
      <div class="container-fluid p-1">
        <!-- Side bar -->
        <div class="" id="sidebar">
          <ul class="navbar-nav ms-3 mb-2 mb-lg-0">
            <li onclick="closeHandel()" class="" id="close">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blogdisplay.php">Blog</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link"  href="treatment.php"
                >Our Treatments</a
              >
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="books.php">Booking</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="contactus.php"
                >Contact Us</a
              >
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="aboutus.php"
                >About Us</a
              >
            </li>
          </ul>
        </div>
        <!-- Side bar End-->
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item me-3">
              <a class="nav-link"  href="home.php">Home</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link"   href="blogdisplay.php">Blog</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link"  href="treatment.php"
                >Our Treatments</a
              >
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="books.php">Booking</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="contactus.php"
                >Contact Us</a
              >
            </li>
            <li class="nav-item me-3">
              <a class="nav-link"  href="aboutus.php"
                >About Us</a
              >
            </li>
          </ul>
        </div>
        <div class="" onclick="menuHandel()" id="menu">
          <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </div>
      </div>
      
    </nav>
    </header>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script>
      const menu = document.getElementById("menu");
      const sidebar = document.getElementById("sidebar");

      function menuHandel(){
        
        sidebar.style.display= "flex";
        // menu.style.display= "none";
      }
      function closeHandel(){

        sidebar.style.display= "none";
        // menu.style.display= "block";
      }

      const activePage = window.location.pathname;  // Get current page's path
      const navLinks = document.querySelectorAll("nav li a");  // Select all links in the navbar

function activeLink() {
  navLinks.forEach(link => {
    // Extract the path from the link's href
    const linkPath = new URL(link.href).pathname;
    
    // Compare the current page path with the link path
    if (linkPath === activePage) {
      link.classList.add('active');  // Add active class if it matches
    } else {
      link.classList.remove('active');  // Remove active class if it doesn't match
    }
  });
}  
  // To highlight the active link when the page loads
  window.onload = activeLink;
    </script>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

  </body>
</html>
<?php
ob_end_flush();
?>