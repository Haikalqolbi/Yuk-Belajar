<?php
session_start();

if(!$_SESSION['id_cust']){
  header('Location: loginuser.php');
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
$id_cust = $_SESSION["id_cust"];
$select = mysqli_query($conn,"SELECT * FROM tabel_transaksi WHERE cust_id = '$id_cust'");
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
  <!-- Tabel PO -->
  <section class="Tabel" id="PO" style="margin-top:100px">
        <div class="container tabel p-5 ">
          <table class="table table-hover  table-light">
            <thead>
                <tr>
                    <th scope="col">No</th> 
                    <th scope="col">No. Produk</th>
                    <th scope="col">Program</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Harga</th>
                    <th scope="col" class="text-center">Hapus Data</th>
                </tr>
            </thead>
            <tbody>
  <?php $total=0;?>
    <?php $i = 1; ?>
        <?php foreach($select as $tampil) :?>
                <tr>
                    <th scope="row"><?= $i;?></th>
                    <td><?php echo $tampil["product_id"]; ?></td>
                    <td><?php echo $tampil["judul_product"]; ?></td>
                    <td><img class="gambarproduct" src="img/<?php echo $tampil["gambar"]; ?>" alt=""></td>
                    <td>Rp<?php echo $tampil["harga"]; ?></td>
                    <th class="text-center" ><a href="deletebookings.php?id_transaksi=<?= $tampil['id_transaksi']; ?>" class="btn btn-danger"  >Hapus</a></th>
                </tr>
    <?php $i++; 
    $total += $tampil['harga'];
    
    ?>

          <?php endforeach; ?>
          <tr>
      <th colspan="4" class="table-active " >Total</th>
      <!-- <form action="checkout.php" method="POST"> -->
      <td colspan="1" name="total" class="table-active ">Rp<?php echo $total ?></td>
      <th colspan="1" class="table-active text-center" ><a type="submit" href="checkout.php" class="btn btn-primary"  >Checkout</a></th>
      <!-- </form> -->
    </tr>      
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