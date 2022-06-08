<?php
session_start();
require "connect.php";

if(!$_SESSION['id_cust']){
  header('Location: loginuser.php');
  exit(); 
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
        .containerproduct{
          background: white;
        }
        
        .contenthome{
          height: 400px;
        }
     
    </style>
  </head>
  <body style = background-color:#FFF8DC>

  <?php
$select = mysqli_query($conn, "SELECT * FROM tabel_produk");

?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid ">
        <a class="navbar-brand" href="home.php">Yuk Belajar</a>
              <ul class=" navbar-nav mb-2 mb-lg-0">
              <li class="nav-item px-1">
                  <a class="nav-link" aria-current="page" href="#Program">Program</a>
              </li>
              <li class="nav-item px-1">
                  <a class="nav-link" aria-current="page" href="#ABOUTUS">About Us</a>
                </li>
                <li class="nav-item px-1">
                  <a class="nav-link" aria-current="page" href="#ABOUTUS">Contact</a>
                </li>
               <li class="nav-item px-1">
               <a href="bookinguser.php" class="link-secondary"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 10">
           <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg></a>
                </li>
                <li class="nav-item px-1 dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['nama'] ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="userprofile.php">User Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item " href="logout.php">Log Out</a></li>
                  </ul>
                </li>
              </ul>
        </div>
      </nav>
    <!-- Navbar Closed -->


    <!--  Home -->
    <section id="HOME">
    <<center><div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"style="width: 100%;height:200%;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"s></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/3.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </center>
    </section>
    <!-- Home Closed -->

    <!-- Product -->
    <section class="Program" id="Program">
      <div class="containerproduct p-5 text-center">
        <h2 class="fw-bold p-3 align-content-center">Program</h2>
        <div class="row justify-content-center">
        <?php foreach($select as $tampil) :?>
          <div class="card col-4 m-2 p-0" style="width: 9rem; height: 18rem;">
            <img src="img/<?php echo $tampil["gambar"]; ?>" class="card-img-top" alt="...">
            <div class="p-1 ">
              <p class="m-1 p-0"><?php echo $tampil["judul_product"]; ?></p>
              <p class="m-1 fw-light">Rp<?php echo $tampil["harga"]; ?></p>
              <a href="detailproduct.php?id_product=<?php echo $tampil["id_product"]; ?>" class="btn btn-primary m-1">Lihat Detail</a>
            </div>
          </div>
          <?php endforeach; ?>


          <div class="p-3 text-center">
            <button class="btn btn-outline-success " type="submit" >Lihat Lebih Banyak</button>
          </div>
      </div>
      </section>
      <!-- Product -->
    
    <!-- About Us -->
    <section class="Aboutus" id="ABOUTUS">
      <div class="containerabout">
        <div class=" container p-5 ">
          <div class="tentang-kami2 row justify-content-center align-content-center">
            <h2 class="text-center p-3 fw-bold">About Us</h2>
            <div class="col-4 p-2 ">
              <p >Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, iusto expedita. Ut, et provident. Unde assumenda mollitia nulla dignissimos, laborum labore, saepe, inventore optio quia repudiandae eius velit laboriosam deleniti!</p>
            </div>
            <div class="col-4 p-2 ">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quia, cumque maiores nihil necessitatibus, ipsa quasi possimus doloremque dignissimos a explicabo dolores laudantium deleniti! Quae, esse. Eaque perspiciatis placeat quaerat.</p>
            </div>
          </div>
        </div>
      </div>
      <section id="Contact">
      <footer class="bg-dark text-white text-center text-lg-start">
        <div class="container p-4 pb-0">
            <div class="row">
              <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                  <iframe
                  class="shadow-1-strong rounded"
                  src="https://www.youtube.com/embed/Or8w6DxTgVM" 
                  width="110%" height="275" frameborder="0" style="border:0;"
                  allowfullscreen
                ></iframe>
              </div>
              <hr class="w-100 clearfix d-md-none" />
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <div class="view view-cascade gradient-card-header peach-gradient">
                </div>
                <div class="card-body card-body-cascade text-center">
                  <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.307499347602!2d107.6294967143679!3d-6.973001670215066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sTelkom%20University!5e0!3m2!1sen!2sid!4v1634800883964!5m2!1sen!2sid"
                    width="120%" height="275" frameborder="0" style="border:0;" allowfullscreen aria-hidden="false" tabindex="0"></iframe>
                  </div>
              </div>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Contact 
              </h6>
              <p>
                Telkom University, Jl. Telekomunikasi No. 1, Terusan Buahbatu - Bojongsoang, Sukapura, Kec. Dayeuhkolot, Bandung, Jawa Barat 40257
              </p>
              <p> Telpon : 021633853
              </p>
              <p>
                Email : Yukbelajar@gmail.com
              </p>
            </div>
            <hr class="my-3">
            <section class="p-3 pt-0">
              <div class="row d-flex align-items-center">
                <div class="col-md-7 col-lg-8 text-center text-md-start">
                  <div class="p-3">
                    © 2021 Copyright:
                    <a class="text-white"
                       >Muhammad Haikal Qolby_1202190096</a>
                  </div>
          </section>
    <!-- Footer Close -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>