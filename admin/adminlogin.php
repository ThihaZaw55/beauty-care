<?php
include 'conn.php';
include 'function.php';

if(isset($_POST['btnlogin']))
{
    adminLogin();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#e0e4ed;">
    <!-- Login 8 - Bootstrap Brain Component -->
<section class="bg-light p-3 p-md-4 p-xl-5">
  <div class="container"> 
    <div class="row justify-content-center">
      <div class="col-12 col-xxl-11"> 
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0">
          <h2 class="text-center mt-4 mb-0">Beautycare Aesthethic Clinic</h2>
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="bc.jpg" alt="Welcome back you've been missed!">   
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5">
                        <div class="text-center mb-4">
                          <a href="">
                            
                          </a>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <!-- <div class="d-flex gap-3 flex-column">
                        <a href="#!" class="btn btn-lg btn-outline-dark">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                          </svg>
                          <span class="ms-2 fs-6">Log in with Google</span>
                        </a>
                      </div> -->
                      
                      <h2 class="text-center mt-4 mb-5">Admin Login</h2>
                    </div>
                  </div>
                  <form  method="post">
                    <div class="row gy-3 overflow-hidden">
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="username" placeholder="Username" required>
                          <label for="username" class="form-label">User Name</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                          <label for="password" class="form-label">Password</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                          <label class="form-check-label text-secondary" for="remember_me">
                            Keep me logged in
                          </label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <input class="btn btn-dark btn-lg" type="submit" name="btnlogin" value="Log in now">
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                        <!-- <a href="#!" class="link-secondary text-decoration-none">Create new account</a> -->
                        <!-- <a href="#!" class="link-secondary text-decoration-none">Forgot password</a> -->
                         <p class='text-center'>Beautycare's <i class="text-info">admin</i> only can be login.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>