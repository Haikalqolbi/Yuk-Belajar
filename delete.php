<?php
session_start();


require 'connect.php' ;

    $id_product = $_GET['id_product'];  
    
    $query = "DELETE FROM tabel_produk WHERE id_product = '$id_product'";
    mysqli_query($conn, $query);
   
    header('Location: admin.php');
   
?>