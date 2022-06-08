<?php
session_start();

require  "connect.php";

if( isset($_COOKIE['login'])) {
  if($_COOKIE['login'] == 'true' ) {
    $_SESSION['login'] = true ;
  }
}

if(isset($_POST['login'])){
  login($_POST);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Yuk Belajar</title>
    <style>
      .gambarproduct{
        width: 35px;
      }
         hr{
            border: 2px solid #0B62E0;
        }
        .logo{
            
            margin-left: 70px;
            width: 150px;
        }
        .logoflower{
          width: 40px;
        
        }
        .LogoWhite{
          width: 250px;
        }
    </style>
  </head>
  <body style="background-color: #FFF8DC;">

  

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid ">
          <a class="navbar-brand" href="home.php">Yuk Belajar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      </nav>
    <!-- Navbar Closed -->


    <?php
if(isset($_SESSION['message'])) : ?>
<div class="alert alert-danger alert-dismissible fade show " role="alert">
  <?= $_SESSION['message']; ?>
  <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label= 'Close'>
  </button>
</div>
<?php 
    unset($_SESSION['message']);
endif;
?>
<?php
if(isset($_SESSION['registered'])) : ?>
<div class="alert alert-success alert-dismissible fade show " role="alert">
  <?= $_SESSION['registered']; ?>
  <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label= 'Close'>
  </button>
</div>
<?php 
    unset($_SESSION['registered']);
endif;
?>

<!-- regis form -->
<section class="m-5 p-3">
<div class="container bg-light w-50 align-item-center p-4 shadow">
        <h5 class="fw-bold text-center">Login as Admin</h5>
        <hr>
         <form method="POST" action="" >
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input required  type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat E-Mail" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Kata Sandi</label>
                <input required class="form-control" id="password" name="password" type="password" placeholder="Kata Sandi Anda" ></input>
            </div>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="rememberme" value="rememberme" name="remember">
                    <label class="form-check-label" for="rememberme">Remember Me</label>
                </div>
            </div>
            <div class="text-center mb-3 ">
                <button class="btn btn-primary w-25" type="submit" name="login">Login</button>
            </div>
            <div class="mb-3 text-center">
                <p>Don't have an account yet?<a href="registeradmin.php"> Regsiter as admin</a></p>
            </div>
            <div class="mb-3 text-center">
                <p><a href="loginuser.php">Login</a> as User</p>
            </div>
        </form>
</div>
</section>
<!-- regis close -->
 
    
    <!-- Footer -->
    <footer class="bg-dark text-white text-center text-lg-start">
    <section class="p-3 pt-0">
              <div class="row d-flex align-items-center">
                <div class="col-md-7 col-lg-8 text-center text-md-start">
                  <div class="p-3">
                    © 2021 Copyright:
                    <a class="text-white"
                       >Muhammad Haikal Qolby_1202190096</a>
                  </div>
    </section>
    </footer>
    <!-- Footer Close -->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>