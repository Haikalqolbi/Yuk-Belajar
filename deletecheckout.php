<?php
session_start();


require 'connect.php' ;

    $id_pesanan = $_GET['id_pesanan'];  
    
    $query = "DELETE FROM tabel_checkout WHERE id_pesanan = '$id_pesanan'";
    mysqli_query($conn, $query);
   
    header('Location: userprofile.php');

?>