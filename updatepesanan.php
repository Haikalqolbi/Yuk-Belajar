<?php
session_start();


require 'connect.php' ;
if(isset($_POST["submit"])){
      
      $id_pesanan = $_POST["id_pesanan"];
      $status = $_POST["status"];
    $query = "UPDATE tabel_checkout SET 
                status = '$status'
                WHERE id_pesanan = $id_pesanan
                ";
    mysqli_query($conn, $query);
  
    header('Location: admin.php');
  }

?>