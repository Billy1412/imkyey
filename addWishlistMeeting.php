<?php
session_start();
require "connect.php";

if (isset($_POST['addWish']))
{
    $roomType= $_POST['tipeRoom'];
    if (!empty($_POST['in2']) and !empty($_POST['out2'])){
        if(strtotime($_POST['in2']) < strtotime(date('Y/m/d')) ){
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
        else if(strtotime($_POST['in2']) > strtotime($_POST['out2']) ){
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
        else if(strtotime($_POST['out2']) < strtotime(date('Y/m/d')) ){
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
        else if(strtotime($_POST['out2']) == strtotime(date('in2')) ){
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
            $inDate = $_POST['in2'];
            $outDate = $_POST['out2'];
            $quantity = 1;
            $detail = $_POST['detail2'];
            $cekBreakfast = 0;
            $cekSmoking = 0;

            $sql = "INSERT INTO `wishlist` (`id_wishlist`, `id_member`, `detail`, `in_date`,  `id_room`, `out_date`, `quantity`, `breakfast`, `smoking`) VALUES (null, '$member', '$detail', '$inDate', '$roomType', '$outDate', $quantity, $cekBreakfast, $cekSmoking);";
            $res = mysqli_query($con, $sql);

            header("Location: rooms.php?room_id=".$roomType);
        }

    }

    else{
        if($roomType == 'R004'){
            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Pengisian Form Wishlist  Belum Lengkap');
            window.location.href = 'rooms.php?room_id=R004';
            </script>");
            }
        else if($roomType == 'R005'){
            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Pengisian Form Wishlist  Belum Lengkap');
            window.location.href = 'rooms.php?room_id=R005';
            </script>");
            }
        else if($roomType == 'R006'){
            echo("<script LANGUAGE = 'JavaScript'>
            window.alert('Pengisian Form Wishlist Belum Lengkap');
            window.location.href = 'rooms.php?room_id=R006';
            </script>");
            }
    }
}



?>