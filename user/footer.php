<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Footer Design</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- bootstrap icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <!-- Custom Styles -->
    <style>
      .footer {
        background-color: #d3d6dc;
        color: #000000;
        padding: 40px 0 0;
      }
      
      .footer h5 {
        font-weight: bold;
      }
      .footer .social-icons a {
        color: #000000;
        margin: 0 12px;
        font-size: 20px;
      }
      .footer .social-icons a:hover {
        color: #ffcc00;
      }
      .footer .list-unstyled li a {
        color: #000000;
        text-decoration: none;
      }
      .footer .list-unstyled li a:hover {
        color: #0a50dc;
      }
      .footer .contact-info {
        font-size: 14px;
      }
      .footer .contact-info i {
        margin-right: 8px;
      }
      .footer .hover-text-danger:hover {
      color: #0a50dc !important; 
      }
    </style>
  </head>
  <body>
    <!-- Footer -->
    <footer class="footer mt-4">
      <div class="container">
        <div class="row">
          <!-- Clinic Logo and Description -->
          <div class="col-lg-4 col-md-6 mb-4">
            <a href="home.php">
            <img
              src="images/logobc.png"
              alt="Clinic Logo"
              
            />
            </a>
            <br>
            <br>
            <p>
              Providing compassionate and comprehensive healthcare services.
              Your health is our priority.
            </p>
          </div>

          <!-- Quick Links -->
          <div class="col-lg-4 col-md-6 mb-4">
            <h6 class="fs-5 mb-3">Quick Links</h6>
            <ul class="list-unstyled">
              <li class="mb-1">
                <a aria-current="page" href="home.php">Home</a>
              </li>
              <li class="mb-1">
                <a href="blogdisplay.php">Blog</a>
              </li>
              <li class="mb-1">
                <a aria-current="page" href="treatment.php">Our Treatments</a>
              </li>
              <li class="mb-1">
                <a href="books.php">Booking</a>
              </li>
              <li class="mb-1">
                <a aria-current="page" href="contactus.php">Contact Us</a>
              </li>
              <li class="mb-1">
                <a aria-current="page" href="aboutus.php">About Us</a>
              </li>
            </ul>
          </div>

          <!-- Contact Information -->
          <div class="col-lg-4 col-md-6 mb-4">
            <h6 class="fs-5 mb-3">Contact Us</h6>
            <div class="contact-info">
              <a href="https://maps.app.goo.gl/Eqe4gp9rSvVGfbb89" class="d-block fs-6 text-dark text-decoration-none hover-text-danger mb-2">
                <i class="bi bi-geo-alt-fill"></i> No.44, Pathein St, Sanchaung
                City, Yangon
              </a>
              <a href="tel:+95977269703" class="d-block fs-6 text-dark text-decoration-none hover-text-danger mb-2">
                <i class="bi bi-telephone-fill"></i> +95 9777269744
              </a>
              <a href="tel:+959894535854" class="d-block fs-6 text-decoration-none text-dark hover-text-danger mb-2">
                  <i class="bi bi-telephone-fill"></i> +95 9894535854
              </a>
              <a href="tel:+95977269703" class="d-block fs-6 text-decoration-none text-dark hover-text-danger mb-2">
                   <i class="bi bi-telephone-fill"></i> +95 9777269744
              </a>
              <a href="mailto:beauty@clinic.com" class="d-block fs-6 text-dark text-decoration-none hover-text-danger mb-2">
                <i class="bi bi-envelope-fill"></i> beauty@clinic.com</a>
            </div>
            <div class="social-icons mt-4">
              <a href="http://www.facebook.com/" class="text-dark"><i class="bi bi-facebook"></i></a>
              <a href="http://www.twitter.com/" class="text-dark"><i class="bi bi-twitter-x"></i></a>
              <a href="https://mm.linkedin.com/" class="text-dark"><i class="bi bi-linkedin"></i></a>
              <a href="http://www.instagram.com/" class="text-dark"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div  class="text-center p-2 text-dark font-monospace fs-6" style="background-color: #e0e4ed;">
        <p>
          &copy; 2024-<span id="date"></span>
          <script>
            const date = document.getElementById("date");
            date.innerHTML = new Date().getFullYear();
          </script>
          Clinic | All Rights Reserved, Designed by DWD51_Group2
        </p>
      </div>
    </footer>

    <!-- Bootstrap JS (optional, for interactive elements like modals or carousels) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons (for social media icons) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
  </body>
</html>
