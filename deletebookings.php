<?php
session_start();


require 'connect.php' ;

    $id_transaksi = $_GET['id_transaksi'];  
    
    $query = "DELETE FROM tabel_transaksi WHERE id_transaksi = '$id_transaksi'";
    mysqli_query($conn, $query);
   
    header('Location: bookinguser.php');
   
    // if( hapus($id_product)>0){
    //     echo "
    //         <script>
    //             alert('data berhasil dihapus');
    //             document.location.href = 'admin.php'; 
    //         </script>
    //         ";
    // }
    // else{
    //     echo "
    //         <script>
    //             alert('data gagal dihapus');
    //             document.location.href = 'admin.php'; 
    //         </script>
    //         ";
    // }
?>