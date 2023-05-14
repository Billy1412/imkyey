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
    $roomType=$_POST['roomType'];
    if (!empty($_POST['in'])and !empty($_POST['out'])){
        $tanggalTransaksi = date("Y/m/d");
        if(strtotime($_POST['in']) < strtotime($tanggalTransaksi) ){
            if($roomType == 'R004'){
                echo("<script LANGUAGE = 'JavaScript'>
                window.alert('Invalid Date');
                window.location.href = 'rooms.php?room_id=R004';
                </script>");
                }
                else if($roomType == 'R005'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Invalid Date');
                    window.location.href = 'rooms.php?room_id=R005';
                    </script>");
                    }
                else if($roomType == 'R006'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Invalid Date');
                    window.location.href = 'rooms.php?room_id=R006';
                    </script>");
                    }
        }
        else if(strtotime($_POST['out']) < strtotime($tanggalTransaksi) ){
            if($roomType == 'R004'){
                echo("<script LANGUAGE = 'JavaScript'>
                window.alert('Invalid Date');
                window.location.href = 'rooms.php?room_id=R004';
                </script>");
                }
                else if($roomType == 'R005'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Invalid Date');
                    window.location.href = 'rooms.php?room_id=R005';
                    </script>");
                    }
                else if($roomType == 'R006'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Invalid Date');
                    window.location.href = 'rooms.php?room_id=R006';
                    </script>");
                    }
        }
        else if(strtotime($_POST['in']) > strtotime($_POST['out']) ){
            if($roomType == 'R004'){
                echo("<script LANGUAGE = 'JavaScript'>
                window.alert('Tanggal Check out lebih besar dari tanggal check in');
                window.location.href = 'rooms.php?room_id=R004';
                </script>");
                }
                else if($roomType == 'R005'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Tanggal Check out lebih besar dari tanggal check in');
                    window.location.href = 'rooms.php?room_id=R005';
                    </script>");
                    }
                else if($roomType == 'R006'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Tanggal Check out lebih besar dari tanggal check in');
                    window.location.href = 'rooms.php?room_id=R006';
                    </script>");
                    }
        }
        else if(strtotime($_POST['in']) == strtotime($_POST['out']) ){
            if($roomType == 'R004'){
                echo("<script LANGUAGE = 'JavaScript'>
                window.alert('Invalid Date');
                window.location.href = 'rooms.php?room_id=R004';
                </script>");
                }
                else if($roomType == 'R005'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Invalid Date');
                    window.location.href = 'rooms.php?room_id=R005';
                    </script>");
                    }
                else if($roomType == 'R006'){
                    echo("<script LANGUAGE = 'JavaScript'>
                    window.alert('Invalid Date');
                    window.location.href = 'rooms.php?room_id=R006';
                    </script>");
                    }
        }
        else{
        $member = $_SESSION["id"];
        $inDate = $_POST['in'];
        $outDate=$_POST['out'];
        $quantity=1;
        $detail = $_POST['detail'];
       
        $nights = dateDiffInDays($inDate, $outDate);
        $hargaBreakfast = 0;
        $hargaRoom = 0;
        $subTotal = 0;
        $amount = 0;
        $pajak = 0;
        $total = 0;
        $status = 0;
        $cekBreakfast = 0;
        $cekSmoking = 0;    
        $sdh_bayar = 0;
        $blm_bayar = 0;  
        if ($roomType == "R004"){
            $hargaRoom = 3500000;
        }
        if ($roomType == "R005"){
            $hargaRoom = 8000000;
        }
        if ($roomType == "R006"){
            $hargaRoom = 5000000;
        }
    
        $amount = $nights * $quantity * $hargaRoom;
        $subTotal = $nights * $quantity * $hargaRoom + $hargaBreakfast * $quantity * $nights;
        $pajak = $subTotal * 10 / 100;
        $total = $subTotal + $pajak;
        $blm_bayar = $total;
        $sql1="insert into transaksi values(null, '$tanggalTransaksi','$subTotal', '$pajak', '$total', '$status','$member')";
        // $query=mysqli_query($con,$sql1);
        if(mysqli_query($con, $sql1)){
        $id_transaksi= mysqli_insert_id($con);
        // $id_transaksi = "SELECT LAST_INSERT_ID()";
        $sql2="insert into detail_transaksi values(null, '$inDate','$outDate', $nights, $quantity, $hargaRoom, $amount, '$detail', '$roomType', $id_transaksi, $cekBreakfast,$cekSmoking, $sdh_bayar, $blm_bayar)";
        $query=mysqli_query($con,$sql2);
        header("Location: home.php");
        }

    }
}
    else{
        if($roomType == 'R004'){
            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Pengisian Form Booking Belum Lengkap');
            window.location.href = 'rooms.php?room_id=R004';
            </script>");
            }
            else if($roomType == 'R005'){
                echo("<script LANGUAGE = 'JavaScript'>
                window.alert('Pengisian Form Booking Belum Lengkap');
                window.location.href = 'rooms.php?room_id=R005';
                </script>");
                }
            else if($roomType == 'R006'){
                echo("<script LANGUAGE = 'JavaScript'>
                window.alert('Pengisian Form Booking Belum Lengkap');
                window.location.href = 'rooms.php?room_id=R006';
                </script>");
                }
    }
    


}
?>
