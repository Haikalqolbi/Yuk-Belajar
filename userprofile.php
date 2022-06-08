<?php
session_start();

if(!$_SESSION['id_cust']){
  header('Location: loginuser.php');
  exit(); 
}
require "connect.php";

if(isset($_POST['update'])){
    updateuser($_POST);
    
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

        .warnabar{
          background-color: <?php 
            if(isset( $_COOKIE['warna'])){
            echo  $_COOKIE['warna'].";";
              
            }else{
              echo "#F8F9FA;";
            }
            ?>
        }
      .gambarproduct{
        width: 50px;
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
  <body>

  <?php
$id_cust = $_SESSION["id_cust"];


$select2 = mysqli_query($conn,"SELECT * FROM tabel_checkout WHERE cust_id = '$id_cust'");
$select = mysqli_fetch_assoc($select2);

?>
 
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid ">
        <a class="navbar-brand" href="home.php">Yuk Belajar</a>
            <ul class=" navbar-nav mb-2 mb-lg-0">
              <li class="nav-item px-1">
                <a class="nav-link" aria-current="page" href="User.php">Program</a>
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

    <!-- Status Pemesanan -->
      <section class="p-5 m-5">
          <div class="container">
              <h2 class="fw-bold text-center mb-3">User Profile</h2>
              <div class="row">
                <div class="col bg-light p-3 me-3 rounded-start rounded-3">
                    <form method="POST" action="" >
                        <h5 class="fw-bold">Informasi User</h5>
                        <hr class="text-secondary">
                        <div class="mb-3">
                            <label for="emailuser" class="form-label fw-bold">Email</label>
                            <input type="text" class="form-control" id="emailuser" name="emailuser" readonly  value="<?= $_SESSION["emailuser"];?>" >
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION["nama"]?>" >
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-bold">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"  ><?= $_SESSION["alamat"]?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="no_hp">Nomor Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $_SESSION["no_hp"]?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="password">Password</label>
                            <input type="password" class="form-control" id="passworduser" name="passworduser" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="passwordconfirm">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm">
                        </div>
                        <div class="text-center ">
                            <button class="btn btn-primary w-50" type="submit" name="update">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
                <div class="col border border-2 border-light rounded-end rounded-3 p-3">
                    <h5 class="fw-bold">
                        Status
                    </h5>
                    <hr>
                    <div class="container  py-1">
                        <table class="table border table-striped">
                            <?php $i=1; ?>
                            <tbody>
                             <?php foreach($select2 as $tampil) :?>
                                <tr>
                                    <th scope="row" ><?= $i;?></th>
                                </tr>
                                <tr>
                                    <th scope="row" >No.Pesanan</th>
                                    <td class="table-primary text-end"><?= $tampil["id_pesanan"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" >Total Harga</th>
                                    <td class="table-primary text-end" >Rp<?= $tampil["total"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" >Status Pesanan</th>
                                    <td class="table-primary text-end" ><?= $tampil["status"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="deletecheckout.php?id_pesanan=<?= $tampil["id_pesanan"]?>" class="btn btn-outline-danger">Batalkan Pesanan</a></th><div class="mb-3">
                                </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

              </div>
          </div>
      </section>
    <!-- Status Pemesanan close -->
    
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