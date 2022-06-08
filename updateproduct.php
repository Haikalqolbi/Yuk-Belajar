<?php
session_start();


require 'connect.php' ;
if(isset($_POST['submit'])){

$id_product = $_POST["id_product"];
$judul_product = htmlspecialchars($_POST["judul_product"]);
$harga = htmlspecialchars($_POST["harga"]);
$deskripsi = htmlspecialchars($_POST["deskripsi"]);
$gambar = htmlspecialchars($_POST["gambar"]);

 // query insert data
 global $conn;


 $query = "UPDATE tabel_checkout SET 
            judul_product = '$judul_product',
            harga = '$harga',
            deskripsi = '$deskripsi',
            gambar = '$gambar'
            WHERE id_product = $id_product
            ";
 mysqli_query($conn, $query);
 header('Location: admin.php');
}
//  return mysqli_affected_rows($conn);    
?>