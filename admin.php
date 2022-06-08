<?php
session_start();

if(!$_SESSION['id_admin']){
  header('Location: loginadmin.php');
  exit(); 
}
require "connect.php";
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
$select = mysqli_query($conn , "SELECT * FROM tabel_produk");

$select2 = mysqli_query($conn , "SELECT * FROM tabel_checkout");

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

    <?php

if(isset($_SESSION['message'])) : ?>
  <div class="alert alert-success alert-dismissible fade show " role="alert">
    <?= $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label= 'Close'>
    </button>
  </div>
  <?php 
      unset($_SESSION['message']);
  endif;
?>
      <!-- Tabel Produk -->
      <section class="Tabel" id="PO" style="margin-top: 100px;">
        <div class="containertabel p-5 ">
          

          <table class="table table-hover  table-light">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Ubah Data</th>
                    <th scope="col">Hapus Data</th>
                </tr>
            </thead>
            <tbody>
    <?php $i = 1; ?>
        <?php foreach($select as $tampil) :?>
                <tr>
                    <th scope="row"><?= $i;?></th>
                    <td><?php echo $tampil["judul_product"]; ?></td>
                    <td>Rp<?php echo $tampil["harga"]; ?></td>
                    <td><?php echo $tampil["deskripsi"]; ?></td>
                    <td><img class="gambarproduct" src="img/<?php echo $tampil["gambar"]; ?>" alt=""></td>
                    <td ><a href="UbahProduct.php?id_product=<?= $tampil['id_product']; ?>" class="btn btn-primary">Ubah</a></td>
                    <th ><a href="delete.php?id_product=<?= $tampil['id_product']; ?>" class="btn btn-danger"  >Hapus</a></th>
                </tr>
    <?php $i++; ?>

          <?php endforeach; ?>
                
            </tbody>
        </table>
        </div>
      </section>
      <!-- Tabel Produk Close -->
 
        <!-- Tabel PO -->
        <section class="Tabel" id="PO">
        <div class="containertabel p-5 ">
          <h2 class="text-center fw-bold p-3">Tabel Purchase Order</h2>
          <table class="table table-hover  table-light">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Pesanan</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Bukti Transfer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Cancel</th>
                </tr>
            </thead>
            <tbody>
    <?php $i = 1; ?>
        <?php foreach($select2 as $tampil) :?>
                <tr>
                    <th scope="row"><?= $i;?></th>
                    <td ><?= $tampil["id_pesanan"] ?></td>
                    <td ><?php echo $tampil["emailuser"]; ?></td>
                    <td><?php echo $tampil["nama"]; ?></td>
                    <td><?php echo $tampil["alamat"]; ?></td>
                    <td><?php echo $tampil["no_hp"]; ?></td>
                    <td><img class="gambarproduct" src="upload/<?php echo $tampil["gambar"]; ?>" alt=""></td>
                    <td > <form action="updatepesanan.php" method="POST"><div class="d-flex">
                            <div class="me-3">
                            <?= $tampil["status"] ?>
                              <select class="form-control" id="status" name="status">
                                    <option selected>Pilih</option>
                                    <option value="Dikonfirmasi">Dikonfirmasi</option>
                                    <option value="Selesai">Selesai</option>
                              </select>
                            </div>
                            <div> <input type="text" name="id_pesanan" value=" <?= $tampil["id_pesanan"]?>" hidden> 
                            <button name="submit" type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                          </div></form> </td>
                    <th ><a href="deletecheckoutadmin.php?id_pesanan=<?= $tampil['id_pesanan']; ?>" class="btn btn-danger"  >Batalkan</a></th>
                </tr>
    <?php $i++; ?>

          <?php endforeach; ?>
                
            </tbody>
        </table>
        </div>
      </section>
      <!-- Tabel PO Close -->
    
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