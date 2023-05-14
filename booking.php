<?php
session_start();
require "connect.php";

function dateDiffInDays($date1, $date2) 
{
    // Untuk hitung perbedaan hari
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    //return jumlah nights
    return abs(round($diff / 86400));
}


if (isset($_POST['book']))
{
    if (!empty($_POST['in'])and !empty($_POST['out']) and !empty($_POST['roomType']) and !empty($_POST['roomType'])){
        $tanggalTransaksi = date("Y/m/d");
        if(strtotime($_POST['in']) < strtotime($tanggalTransaksi) ){

            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Invalid Date');
            window.location.href = 'home.php';
            </script>");
        }
        else if(strtotime($_POST['out']) < strtotime($tanggalTransaksi) ){
            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Invalid Date');
            window.location.href = 'home.php';
            </script>");
        }
        else if(strtotime($_POST['in']) > strtotime($_POST['out']) ){
            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Tanggal Check out lebih besar dari tanggal check in');
            window.location.href = 'home.php';
            </script>");
        }
        else if(strtotime($_POST['in']) == strtotime($_POST['out']) ){
            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Invalid Date');
            window.location.href = 'home.php';
            </script>");
        }
        else{
        $member = $_SESSION["id"];
        $inDate = $_POST['in'];
        $outDate=$_POST['out'];
        $quantity=$_POST['quantity'];
        $roomType=$_POST['roomType'];
        $detail = $_POST['detail'];
       
        $nights = dateDiffInDays($inDate, $outDate);
        $hargaBreakfast = 0;
        $hargaRoom = 0;
        $subTotal = 0;
        $amount = 0;
        $pajak = 0;
        $total = 0;
        $status = 0;
        $cekBreakfast = -1;
        $cekSmoking = -1;    
        if(isset($_POST['breakfast'])){
            $cekBreakfast = 1;
            $hargaBreakfast = 100000;
        }
        else{
            $cekBreakfast = 0;
        }
        if(isset($_POST['smoking'])){
            $cekSmoking = 1;
        }
        else {
            $cekSmoking = 0;
        }
        if ($roomType == "deluxe"){
            $roomType ="R002";
            $hargaRoom = 500000;
        }
        if ($roomType == "twin"){
            $roomType ="R001";
            $hargaRoom = 500000;
        }
        if ($roomType == "suite"){
            $roomType ="R003";
            $hargaRoom = 1100000;
        }
    
        $amount = $nights * $quantity * $hargaRoom;
        $subTotal = $nights * $quantity * $hargaRoom + $hargaBreakfast * $quantity * $nights;
        $pajak = $subTotal * 10 / 100;
        $total = $subTotal + $pajak;
        $sql1="insert into transaksi values(null, '$tanggalTransaksi','$subTotal', '$pajak', '$total', '$status','$member')";
        // $query=mysqli_query($con,$sql1);
        if(mysqli_query($con, $sql1)){
        $id_transaksi= mysqli_insert_id($con);
        // $id_transaksi = "SELECT LAST_INSERT_ID()";
        $sql2="insert into detail_transaksi values(null, '$inDate','$outDate', $nights, $quantity, $hargaRoom, $amount, '$detail', '$roomType', $id_transaksi, $cekBreakfast,$cekSmoking)";
        $query=mysqli_query($con,$sql2);
        header("Location: home.php");
        }

    }
}
    else{
        echo("<script LANGUAGE = 'JavaScript'>
        window.alert('Pengisian Booking Belum Lengkap');
        window.location.href = 'home.php';
        </script>");
    }
    


}
?>
