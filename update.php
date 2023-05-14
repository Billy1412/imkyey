<?php
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
if(isset($_POST['update'])){
	$t_id=$_POST['t_id'];
	$room = $_POST['r_type'];
	$in = $_POST['in_date'];
	$out = $_POST['out_date'];
	$sql= "SELECT nights, breakfast, smoking, amount, id_room, in_date FROM detail_transaksi dt INNER JOIN transaksi t ON dt.id_transaksi = t.id_transaksi WHERE t.id_transaksi = '".$t_id."';";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	$breakfast=$_POST['breakfast'];
	$smoking=$_POST['smoking'];
	$tanggalEdit = date("Y/m/d");;
	$night = dateDiffInDays($in, $out);
	$prevamount = $row['amount'] *1.1;
	$roomLama = $row['id_room'];
	$sql= "SELECT harga FROM room WHERE id_room = '".$room."';";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	$harga_room = $row['harga'];
	$newamount = $harga_room;
	if($breakfast == 1){
		$newamount = $newamount + $night * 100000;
	}
	
	$details=$_POST['detail'];

	if(strtotime($in) < strtotime(time()) ){
		echo("<script LANGUAGE = 'JavaScript'>
		window.alert('Invalid Date1');
		window.location.href = 'Upgrade.php?id_transaksi=".$t_id."';
		</script>");

	}
	else if(strtotime($out) < strtotime(time()) ){
		echo("<script LANGUAGE = 'JavaScript'>
		window.alert('Invalid Date2');
		window.location.href = 'Upgrade.php?id_transaksi=".$t_id."';
		</script>");
			

	}
	else if(strtotime($in) > strtotime($out) ){
		echo("<script LANGUAGE = 'JavaScript'>
		window.alert('Tanggal Check out lebih besar dari tanggal check in');
		window.location.href = 'Upgrade.php?id_transaksi=".$t_id."';
		</script>");

	}
	else if(strtotime($in) == strtotime($out) ){
		echo("<script LANGUAGE = 'JavaScript'>
		window.alert('Invalid Date3');
		window.location.href = 'Upgrade.php?id_transaksi=".$t_id."';
		</script>");

	}else{
	
	$sql1 = "UPDATE detail_transaksi set breakfast='$breakfast', smoking='$smoking', detail ='$details',harga_room = $harga_room, id_room = '$room', amount = $newamount, in_date='$in', out_date='$out', nights = $night WHERE id_transaksi='$t_id';";
	mysqli_query($con,$sql1);
	
	$sql2 = "UPDATE transaksi set subtotal = $newamount, pajak = $newamount * 0.1, total_transaksi = $newamount * 1.1, edit = '$tanggalEdit' WHERE id_transaksi = '$t_id'";
	mysqli_query($con,$sql2);
	
	$sql3= "SELECT status FROM transaksi WHERE id_transaksi = '".$t_id."';";
	$res=mysqli_query($con,$sql3);
	$row=mysqli_fetch_array($res);

	$status = $row['status'];

	
	if($status== 1){;
		$sisa = $newamount * 1.1 - $prevamount;

		if($roomLama == $room){

		}
		else if($roomLama == 'R001' && $room == 'R002'){
			// echo("<script LANGUAGE = 'JavaScript'>
			// window.alert('masuk1') </script>");
			// echo("<script LANGUAGE = 'JavaScript'>
			// window.alert('$roomLama') </script>");
			// echo("<script LANGUAGE = 'JavaScript'>
			// window.alert('$room') </script>");
	
		}
		else if($roomLama == 'R002' && $room == 'R001'){
			// echo("<script LANGUAGE = 'JavaScript'>
			// window.alert('masuk2') </script>");
			// echo("<script LANGUAGE = 'JavaScript'>
			// window.alert('$roomLama') </script>");
			// echo("<script LANGUAGE = 'JavaScript'>
			// window.alert('$room') </script>");
		}
		else{
			$sql3 = "UPDATE transaksi set `status` = 0 WHERE id_transaksi = '$t_id'";
			mysqli_query($con,$sql3);
		}
	}
	
	else{
		$sisa = $newamount * 1.1;
	}

	$sql4 = "UPDATE detail_transaksi dt INNER JOIN transaksi t ON dt.id_transaksi = t.id_transaksi SET dt.blm_bayar = $sisa WHERE t.id_transaksi='" . $t_id . "';" ;
	mysqli_query($con, $sql4);
    echo("<script LANGUAGE = 'JavaScript'>
        window.alert('Segera bayar Rp $sisa sisanya');
        window.location.href = 'Order Summary.php';
        </script>");
}
}
?>