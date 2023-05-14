<?php
require "connect.php";
$transaction_id=$_GET['id'];
// echo("<script LANGUAGE = 'JavaScript'> window.alert('$transaction_id') </script>");
mysqli_query($con,"delete from detail_transaksi where id_transaksi='$transaction_id'");
mysqli_query($con,"delete from transaksi where id_transaksi='$transaction_id'");
echo("<script LANGUAGE = 'JavaScript'>
        window.alert('Booking canceled');
        window.location.href = 'Order Summary.php';
        </script>");
?>