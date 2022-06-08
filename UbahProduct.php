
<?php
session_start();

require "connect.php";
$conn = mysqli_connect("localhost:3307", "root", "", "yb");
$id_product = $_GET["id_product"];

$select2 = mysqli_query($conn,"SELECT * FROM tabel_produk WHERE id_product = '$id_product'");
$select = mysqli_fetch_assoc($select2);



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
        .ContainerHome{
          background: #566253;
          color:white;
          
        }
        
        .containerabout{
          background: #566253;
          color:white;
        }
        .contenthome{
          height: 400px;
        }
     
        .carousel-item img{
          width: 100px;
          height: 300px;
          background-repeat: no-repeat;
          
          background-position: center center;
         

        }
    </style>
  </head>
  <body>
  <?php
  

?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid ">
        <a class="navbar-brand" href="home.php">Yuk Belajar</a>
            <ul class=" navbar-nav mb-2 mb-lg-0">
              <li class="nav-item px-1">
                <a class="nav-link" aria-current="page" href="admin.php">Program</a>
              </li>
              <li class="nav-item px-1">
                <a class="btn btn-outline-success" aria-current="page" href="TambahProduct.php">Tambah Program</a>
              </li>
                <li class="nav-item px-1 dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin#<?= $_SESSION['id_admin'] ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Admin Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item " href="logout.php">Log Out</a></li>
                  </ul>
                </li>
              </ul>
        </div>
      </nav>
    <!-- Navbar Closed -->


  <!-- content -->
<section class=" p-5">
  <div class="  p-5 shadow-lg">
      <!-- Show Kosong -->
        <h1 class="fw-bold text-center">Ubah Program</h1>
         <form method="POST" action="updateproduct.php" >
            <input type="hidden" name="id_product" id="id_product" value="<?= $select["id_product"];?>">

            <div class="text-center m-5">
                <img class=" w-50" src="img/<?= $select["gambar"]; ?>" alt="">
                <input type="text" name="gambar" value="<?= $select["gambar"];?>" hidden >

            </div>
            <hr>

            <div class="mb-3">
                <label for="judul_product" class="form-label fw-bold">Judul Program</label>
                <input type="text" class="form-control" id="judul_product" name="judul_product" placeholder="Contoh: Coursera" value="<?= $select["judul_product"];?>" >
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label fw-bold">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="*Hanya Masukan angka saja tanpa perlu karakter lainnya. Contoh: 100000" value="<?= $select["harga"];?>" >
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Contoh: Coursera adalah Program..." ><?= $select["deskripsi"];?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                
            </div>

            <div class="text-center ">
                <button class="btn btn-primary w-50" type="submit" name="submit">Ubah</button>
            </div>
        </form>
        <!-- Show Buku close -->
  </div>
  </section>
<!-- content close -->
      

 
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