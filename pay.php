<?php
require "connect.php";
if (isset($_POST['pay'])) {
	$t_id = $_POST['tr_id'];
	$name = $_POST['name'];
	$id = $_POST['card-id'];
	$cvv = $_POST['cvv'];

	$sql1 = "SELECT * FROM detail_transaksi dt INNER JOIN transaksi t ON dt.id_transaksi = t.id_transaksi WHERE id_transaksi= $t_id";
	$sql = "SELECT * FROM `kartu_kredit` WHERE `id_kartu` LIKE '" . $id . "' AND `nama` LIKE '" . $name . "' AND `cvv` = " . $cvv;
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($res);
	if (!empty($row)) {
		$tanggalTransaksi = date("Y/m/d");
		if (strtotime($row["expired_date"]) < strtotime($tanggalTransaksi)) {
			echo ("<script LANGUAGE = 'JavaScript'>
			window.alert('Payment Failed, card already expired');
			window.location.href = 'Order Summary.php';
			</script>");
		} else {
			$sql = "UPDATE transaksi set status = 1 WHERE id_transaksi='" . $t_id . "';";
			mysqli_query($con, $sql);
			$sql2 = "UPDATE detail_transaksi dt INNER JOIN transaksi t ON dt.id_transaksi = t.id_transaksi SET dt.sdh_bayar = t.total_transaksi WHERE t.id_transaksi='" . $t_id . "';" ;
			mysqli_query($con, $sql2);
			$sql3 = "UPDATE detail_transaksi dt INNER JOIN transaksi t ON dt.id_transaksi = t.id_transaksi SET dt.blm_bayar = 0 WHERE t.id_transaksi='" . $t_id . "';" ;
			mysqli_query($con, $sql3);
			echo ("<script LANGUAGE = 'JavaScript'>
        window.alert('Payment Success');
        window.location.href = 'Order Summary.php';
        </script>");
		}
	} else {
		echo ("<script LANGUAGE = 'JavaScript'>
        window.alert('Payment Failed');
        window.location.href = 'Order Summary.php';
        </script>");
	}
}
