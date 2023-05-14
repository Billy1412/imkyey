<!doctype html>
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
</style>
<html>

<head>
	<meta charset="utf-8">
	<title>Payment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- Import jquery cdn -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
	<?php
	include('header.php');
	$t_id = $_GET['id_transaksi'];
	?>
	<a href="home.php" style = "margin-left : 5rem; color : rgb(143, 124, 112)" ><u>Home</u></a>
	<span> <i class="fas fa-arrow-right"></i></span>
	<a href="Order Summary.php" style = "color : rgb(143, 124, 112)"><u>Order Summary</u></a>
    <span> <i class="fas fa-arrow-right"></i></span>
	<?php
	echo "<a href='transactionDetail.php?id_transaksi=" . $t_id . "' style='color:rgb(143, 124, 112)'><u>Transaction Detail</u></a>";
	?>
    <span> <i class="fas fa-arrow-right"></i></span>
	<a href="">Payment</a>

		<form action="pay.php" method="post">
			<!-- <p class="judul" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : -11rem; margin-right: 5rem; margin-top: 3rem; width : 125%;">Payment Details</p> -->
			<p class="judul" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem; margin-top: 1rem;">Payment</p>
			<div style="margin-left: 20vw; margin-right: 10vw;">
			<div class="mb-3 row">
				<label class="col-sm-2">Name</label>
				<div class="col-sm-10">
				<input type="hidden" name="tr_id" value="<?php echo $t_id; ?>" >
					<input type="text " class="form-control" name="name" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label class="col-sm-2">Card ID</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="card-id" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label class="col-sm-2">CVV Code</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="cvv" required>
				</div>
			</div>

			<a class="btn btn-secondary mb-3" style="color:white; margin-left: 17%" role="button" href="transactionDetail.php?id_transaksi=<?php echo $t_id; ?>">Back</a>
			<button name="pay" type="submit" class="btn btn-primary mb-3" style="width: 7%;">Pay</button>


		</form>
</body>

</html>