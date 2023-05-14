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
	<title>Transaction Details</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
	<!-- Import jquery cdn -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	
  <!-- buat date picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
		
	</script>
</head>

<body>
<script>
  //buat date picker booking form check in
  $(function() {
    $('.checkin1').datepicker({
      format: "yyyy-mm-dd",
      language: "fr",
      changeMonth: true,
      changeYear: true
    });
  });

  //buat date picker booking form check out
  $(function() {
    $('.checkout1').datepicker({
      format: "yyyy-mm-dd",
      language: "fr",
      changeMonth: true,
      changeYear: true
    });
  });
</script>
	<?php
	include('header.php');
	$t_id = $_GET['id_transaksi'];
	$sql = "Select in_date, out_date, nights, harga_room, amount, d.detail, tipe_room, breakfast, smoking, d.id_room FROM detail_transaksi d JOIN room r ON d.id_room = r.id_room WHERE id_transaksi='" . $t_id . "'";
	$res = mysqli_query($con, $sql);
	if (!empty($res)) {
		while ($row = mysqli_fetch_array($res)) {

			$in_date = $row['in_date'];
			$out_date = $row['out_date'];
			$nights = $row['nights'];
			$harga = $row['harga_room'];
			$tipe = $row['tipe_room'];
			$amount = $row['amount'];
			$detail = $row['detail'];
			$breakfast = $row['breakfast'];
			$smoking = $row['smoking'];
			$room = $row['id_room'];
		}
	}
	$up = "";
	$currdate = date("Y/m/d");
	if (strtotime($in_date) < strtotime($currdate)) {
		$up = "disabled";
	}
	?>
	<a href="home.php" style = "margin-left : 5rem; color : rgb(143, 124, 112)" ><u>Home</u></a>
	<span> <i class="fas fa-arrow-right"></i></span>
	<a href="" >Upgrade</a>
	<p class="judul" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem; margin-button: 3rem;  margin-top: 1rem; ">Transactional Details</p>
	<div style="margin-left: 20vw; margin-right: 20vw;">
		<form action="update.php" method="post">
			<div class="mb-3 row">
				<label class="col-sm-2">Transaction Id</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="t_id" value="<?php echo $t_id; ?>" readonly>
				</div>
			</div>
			<div class="mb-3 row">
				<label class="col-sm-2">Tipe Ruangan</label>
				<div class="col-sm-10">
					<select class="form-select" aria-label="Default select example" name="r_type">
						<option value="<?php echo $room; ?>" selected><?php echo $tipe; ?></option>
						<?php
						if ($room == 'R001') {
							echo '<option value="R002">Classic Deluxe</option>
						  				<option value="R003">King Suite</option>';
						} elseif ($room == 'R002') {
							echo '<option value="R003">King Suite</option>';
						} elseif ($room == 'R004') {
							echo '<option value="R005">Fuchsia</option>
						  				<option value="R006">Cruss</option>';
						} elseif ($room == 'R006') {
							echo '<option value="R005">Cruss</option>';
						}
						?>
					</select>

				</div>
			</div>
			<?php

					echo '<div class="mb-3 row">
						<label class="col-sm-2">Check In</label>
						<div class="col-sm-10">
						<div class="input-group date checkin1">
						  <input type="text" class="form-control" name="in_date" placeholder="'.$in_date.'" value="'.$in_date.'">
						  <span class="input-group-append">
							<span class="input-group-text bg-white d-block">
							  <i class="fa fa-calendar"></i>
							</span>
						  </span>
						</div></div></div>
						';

						echo ' <div class="mb-3 row">
						<label class="col-sm-2">Check Out</label>
						<div class="col-sm-10">
						<div class="input-group date checkout1">
						  <input type="text" class="form-control" name="out_date" placeholder="'.$out_date.'" value="'.$out_date.'">
						  <span class="input-group-append">
							<span class="input-group-text bg-white d-block">
							  <i class="fa fa-calendar"></i>
							</span>
						  </span>
						</div>';

?>

				</div>
			</div>
			
			<div class="mb-3 row">
				<label class="col-sm-2">Detail</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="detail" value="<?php echo $detail; ?>">
				</div>
			</div>
			<?php
			$display = "";
			if ($room == 'R004' or $room == 'R005' or $room == 'R006') {
				$display = "display: none;";
			}
			?>
			<div class="mb-3" style="margin-left: 10vw;<?php echo $display; ?>">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="breakfast" value="1" <?php echo ($breakfast == '1') ? 'checked' : '' ?>>
					<label class="form-check-label" for="inlineCheckbox1">Breakfast</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="smoking" value="1" <?php echo ($smoking == '1') ? 'checked' : '' ?>>
					<label class="form-check-label" for="inlineCheckbox2">Smoking</label>
				</div>
			</div>
			<div class="d-grid gap-2 d-md-block" style="margin-left : 17%">
				<a class='btn btn-secondary mb-3' style='color:white' role='button' href='Order Summary.php'>Back</a>
				<button name="update" type="submit" class="btn btn-primary mb-3" <?php echo $up; ?>>Upgrade</button>

		</form>


	</div>
	</div>
</body>


</html>