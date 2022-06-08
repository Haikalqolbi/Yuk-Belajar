<?php
session_start();

if(!$_SESSION['id_cust']){
  header('Location: loginuser.php');
  exit(); 
}
require "connect.php";
$conn = mysqli_connect("localhost:3307", "root", "", "yb");

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
  <body>

  <?php
$id_product = $_GET["id_product"];

$select2 = mysqli_query($conn,"SELECT * FROM tabel_produk WHERE id_product = '$id_product'");
$select = mysqli_fetch_assoc($select2);

$select3 = mysqli_query($conn,"SELECT * FROM tabel_produk");
// $id_cust = $_SESSION['id_cust'];
// $display = mysqli_query($conn, "SELECT * FROM tabel_cust WHERE id_cust = '$id_cust");



?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid ">
        <a class="navbar-brand" href="home.php">Yuk Belajar</a>
            <ul class=" navbar-nav mb-2 mb-lg-0">
              <li class="nav-item px-1">
                <a class="nav-link" aria-current="page" href="#Program">Program</a>
              </li>
               <li class="nav-item px-1" >
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

    <?php 
if(isset($_POST["tambahkan"])){
  if(isset($_POST)>0){

  $id_product = $_GET['id_product'];
  $id_cust = $_SESSION['id_cust'];
  $judul_product = $_POST['judul_product'];
  $gambar = $_POST['gambar'];
  $harga = $_POST['harga'];

  $query = "INSERT INTO tabel_transaksi VALUES 
              ( 
              '',
              '$id_product',
              '$judul_product',
              '$gambar',
              '$harga',
              '$id_cust'
              )";
  mysqli_query($conn, $query);

  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Pesanan berhasil ditambahkan!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Product gagal ditambahkan!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
  }
}
?>
<!-- detail -->
<section class="p-5">
  <div class=" p-5 shadow-lg">
      <!-- Show Kosong -->
        <h1 class="fw-bold text-center mb-3">Detail Program</h1>
        <div class="text-center mb-3">
            <img src="img/<?php echo $select["gambar"]; ?>" alt="">
        </div>
        <form method="POST" action="" >

        <div class="text-center mb-3 ">
              <input type="text" name="harga" value="<?php echo $select["harga"]; ?>" hidden >
              <input type="text" name="judul_product" value="<?php echo $select["judul_product"]; ?>" hidden >
              <input type="text" name="gambar" value="<?php echo $select["gambar"]; ?>" hidden >
         
                <button href="" data-bs-toggle="modal" data-bs-target="#modaldatadiri" name="tambahkan"   class="btn btn-success w-50" type="submit" >Pesan Sekarang</button>
              </div>
            <div class="mb-3">
                <label for="judul_product" class="form-label fw-bold">Nama Product</label>
                <p><?php echo $select["judul_product"]; ?></p>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label fw-bold">Harga</label>
                <p><?php echo $select["harga"]; ?></p>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                <p><?php echo $select["deskripsi"]; ?></p>
            </div>
           
        </form>
        <!-- Show Buku close -->
  </div>
  </section>
<!-- detail buku -->
 



<!-- Product lainnya -->
<!-- Product -->
<section class="Program" id="Program">
      <div class="containerproduct p-5 text-center">
        <h2 class="fw-bold p-3 align-content-center">Program Lainnya</h2>
        <div class="row justify-content-center">
        <?php foreach($select3 as $tampil) :?>
          <div class="card col-4 m-2 p-0" style="width: 9rem; height: 18rem;">
            <img src="img/<?php echo $tampil["gambar"]; ?>" class="card-img-top" alt="...">
            <div class="p-1 ">
              <p class="m-1 p-0"><?php echo $tampil["judul_product"]; ?></p>
              <p class="m-1 fw-light">Rp<?php echo $tampil["harga"]; ?></p>
              <a href="detailproduct.php?id_product=<?php echo $tampil["id_product"]; ?>" class="btn btn-primary m-1">Lihat Detail</a>
            </div>
          </div>
          <?php endforeach; ?>

      </div>
      </section>
<!-- Product lainnya close -->

 
    
    
    
    <!-- Footer -->
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