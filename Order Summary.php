<?php
session_start();
require "connect.php";
if (!isset($_SESSION["id"])) {
	header("Location: login.php");
}
?>
<style>
	.judul {
		text-align: center;
		color: white;
		font-weight: bold;
		font-size: 1.5rem;
		padding-top: 0.2rem;
	}

	body {
		box-sizing: border-box;
		overflow-x: hidden;
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #f7f8fa;
	}

	#judulFooter {
		font-family: 'patrick', cursive;
		font-size: 1.5rem;
	}

	.socmed {
		margin-right: 2%;
	}

	.socmed:hover {
		color: white;
	}
</style>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Order Summary</title>
	<script src="jquery-3.6.1.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
	<?php
	include('header.php');
	?>
	<a href="home.php" style = "margin-left : 5rem; color : rgb(143, 124, 112)" ><u>Home</u></a>
	<span> <i class="fas fa-arrow-right"></i></span>
	<a href="" >Order Summary</a>
	<p class="judul" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem;  margin-top: 1rem; ">Payment Details</p>
	<!-- <div class="card"  style="max-width: 88vw; margin-left: 6vw; margin-top: 5vh"> -->
	<div class="payment" style="margin-left: 5rem;">
		<?php
		$sql = "Select * from transaksi t JOIN detail_transaksi d ON t.id_transaksi = d.id_transaksi WHERE id_member='" . $_SESSION["id"] . "' ORDER BY t.id_transaksi DESC  ;";
		$res = mysqli_query($con, $sql);
		if (!empty($res)) {
			while ($row = mysqli_fetch_array($res)) {
				$sql2 = "Select image FROM detail_transaksi det JOIN room r ON det.id_room = r.id_room WHERE id_transaksi = '" . $row['id_transaksi'] . "' LIMIT 1;";
				$res2 = mysqli_query($con, $sql2);
				$row2 = mysqli_fetch_array($res2);
				$status = "";
				$disable = "";
				$up = "";
				if ($row['status'] == 1) {
					$status = "Paid";
					$disable = "disabled";
				} else {
					$status = "Not yet paid";
				}
				$currdate = date("Y/m/d");
				if (strtotime($row['in_date']) < strtotime($currdate)) {
					$up = "disabled";
				}
				
				// Calculate the difference between $in and today's date in seconds
				$diff = strtotime($row['in_date']) - time();

				// Convert the difference to days
				$days = round($diff / (60 * 60 * 24));
				
				if ($days > 7) {
					$up = "enabled";
				}
				else{
					$up = "disabled";
				}

				echo "<div class='card mb-3' style='width: 80vw; margin-left: 3vw;'>";
				echo "<div class='row g-0'>";
				echo "<div class='col-md-4'>";
				echo "<img src='" . $row2['image'] . "' class='img-fluid rounded-start' style = 'width:100%; height : 100%;'alt='...'>";
				echo "</div>";
				echo "<div class='col-md-8'>";
				echo "<div class='card-body'>";
				echo "<h5 class='card-title'> Transaction ID : " . $row['id_transaksi'] . "</h5>";
				echo "<p>Status &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : " . $status . "</p>";
				echo "<p>Transaction Date &nbsp&nbsp&nbsp: " . $row['tanggal_transaksi'] . "</p>";
				echo "<p>Last Edit &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: " . $row['edit'] . "</p>";
				echo "<p>Total Cost &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: Rp " . $row['total_transaksi'] . "</p>";
				echo "<p>Already paid &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : Rp " . $row['sdh_bayar'] . "</p>";
				echo "<p>Haven't paid &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : Rp " . $row['blm_bayar'] . "</p>";
				// echo "<a class='btn btn-primary btn-lg mr-3 $up' role='button' style = 'color: white' href='Upgrade.php?id_transaksi=".$row['id_transaksi']."' >Upgrade</a>&nbsp<a class='btn btn-success btn-lg $disable' style = 'color: white' role='button' href='Payment.php?id_transaksi=".$row['id_transaksi']."'>Pay Now</a>";
				if ($disable == "disabled" && $up == "disabled") {
					echo "<a class='btn btn-primary mr-3' role='button' style = 'color: white; float:right; margin-top:-0.5rem;'onclick = 'upgradeAlert2()' >Upgrade</a>&nbsp<a class='btn btn-success' style = 'color: white; float: right; margin-right: 0.5rem; margin-top:-0.5rem;' role='button' onclick = 'payAlert()' href='transactionDetail.php?id_transaksi=" . $row['id_transaksi'] . "' >Detail</a>";
				}
				else if ($disable == "disabled") {
					echo "<a class='btn btn-primary mr-3' role='button' style = 'color: white; float:right; margin-top:-0.5rem;' href='Upgrade.php?id_transaksi=" . $row['id_transaksi'] . "' >Upgrade</a>&nbsp<a class='btn btn-success' style = 'color: white; float: right; margin-right: 0.5rem; margin-top:-0.5rem;' role='button' onclick = 'payAlert()' href='transactionDetail.php?id_transaksi=" . $row['id_transaksi'] . "'>Pay Now</a>";
				}
				// } else if ($up == "disabled") {
				// 	echo "Masuk1";
				// 	echo "<a class='btn btn-primary mr-3' role='button' style = 'color: white; float:right; margin-top:-0.5rem;' >Upgrade</a>&nbsp<a class='btn btn-success' style = 'color: white; float: right; margin-right: 0.5rem; margin-top:-0.5rem;' role='button' onclick = 'payAlert3()'>Pay Now</a>";
				// } 
				else {
					echo "<a class='btn btn-primary mr-3' role='button' style = 'color: white; float:right; margin-top:-0.5rem;' href='Upgrade.php?id_transaksi=" . $row['id_transaksi'] . "' >Upgrade</a>&nbsp<a class='btn btn-success $disable' style = 'color: white; float: right; margin-right: 0.5rem; margin-top:-0.5rem;' role='button' href='transactionDetail.php?id_transaksi=" . $row['id_transaksi'] . "'>Pay Now</a>";
				}
				$status = $row['status'];
				if ($status == 0 && $row['sdh_bayar'] == 0) {
					echo "<a class='btn btn-danger mb-3' id='cancel'  href='deleteBooking.php?id=".$row['id_transaksi']."' style = 'color: white; float: right; margin-right: 0.5rem; margin-top:-0.5rem;' role='button'>Cancel Booking</a>";
				}
				else{
				echo "<a class='btn btn-danger mb-3' onclick = 'tes()' style = 'color: white; float: right; margin-right: 0.5rem; margin-top:-0.5rem;' role='button'>Cancel Booking</a>";
				}
				
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
		} else {
			echo "No data found";
		}
		?>
		<script>
			function tes(){
				alert("already paid, cannot cancel");
			}
			function upgradeAlert2() {
				alert("Check in sudah kurang dari 7 hari");
			};

			function payAlert() {
				alert("Already paid");
			};

			function payAlert2() {
				alert("Booking date has passed");
			};

			function payAlert3() {
				alert("Past transaction");
			};
		</script>
	</div>
	</div>
	</div>
	</div>
	<!-- footer -->
	<div id="footer" style="background-color:rgb(190, 172, 161); padding: 2rem; ">
		<p id="judulFooter"> Bellagio Hotel </p>
		<div class="row justify-content-around" style="margin-left : -0.5rem; ">
			<div class="col-4">
				<h4 style="margin-top : 1rem;">Contact Us</h4>
				<img src="svg/location.svg" width="5%">
				<h7 style="margin-left : 0.5rem; color: rgb(255, 255, 255)">Jalan Jawa no 21 Surabaya</h7>
				<br>
				<img src="svg/whatsapp.svg" width="5% margin-top: 1%;">
				<h7 style="margin-left : 0.5rem; color: rgb(255, 255, 255) ">+62 811329119</h7>
				<br>
				<img src="svg/email.svg" width="5% margin-top: 1%;">
				<h7 style="margin-left : 0.5rem;  color: rgb(255, 255, 255)">bellagiohotel@gmail.com</h7>
			</div>
			<div class="col-4">
				<h4 style="margin-top : 1rem;">Check in / Check out</h4>
				<h7 style="  color: rgb(255, 255, 255);">We hope you’ve enjoyed your stay. <br> Please note the check-in / out times below :
					<br>
					Check-in &nbsp;&nbsp;&nbsp;&nbsp;: 2pm
					<br>
					Check-out&nbsp;&nbsp;: 12pm
				</h7>

			</div>
			<div class="col-4">
				<h4 style="margin-top : 1rem;">Stay in Touch</h4>
				<a class="socmed" href="https://www.facebook.com/bellagiolasvegas/"><i class="fab fa-facebook fa-2x"></i></a>
				<a class="socmed" href="https://instagram.com/bellagio_hotel?igshid=NDk5N2NlZjQ="><i class="fab fa-instagram fa-2x"></i></a>
				<a class="socmed" href="https://www.youtube.com/watch?v=gPzD5OvYp04"><i class="fab fa-youtube fa-2x"></i></a>
				<a class="socmed" href="https://wa.me/0811329119"><i class="fab fa-whatsapp fa-2x"></i></a>
			</div>
		</div>

</body>

</html>