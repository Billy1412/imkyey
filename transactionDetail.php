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
    $sql = "Select in_date, out_date, nights, harga_room, amount, d.detail, tipe_room, breakfast, smoking, status FROM detail_transaksi d JOIN transaksi t ON d.id_transaksi = t.id_transaksi JOIN room r ON d.id_room = r.id_room WHERE d.id_transaksi='" . $t_id . "'";
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
            $status = $row['status'];

        }
    }
    ?>
	<a href="home.php" style = "margin-left : 5rem; color : rgb(143, 124, 112)" ><u>Home</u></a>
	<span> <i class="fas fa-arrow-right"></i></span>
	<a href="Order Summary.php" style = "color : rgb(143, 124, 112)"><u>Order Summary</u></a>
    <span> <i class="fas fa-arrow-right"></i></span>
    <a href="">Transaction Detail</a>
    <p class="judul" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem; margin-top: 1rem;">Transaction Detail</p>
    <div style="margin-left: 20vw; margin-right: 10vw;">
        <div class="mb-3 row">
            <label class="col-sm-2">Transaction Id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="t_id" value="<?php echo $t_id; ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2">Tipe Ruangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="r_type" value="<?php echo $tipe; ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2">Check In Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="in_date" value="<?php echo $in_date; ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2">Check Out Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="out_date" value="<?php echo $out_date; ?>" readonly>
                <div class="mb-3 row">
                    <p> </p>
                    <label class="col-sm-5">Total Nights: <?php echo $nights; ?></label>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2">Detail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="detail" value="<?php echo $detail; ?> " readonly>
            </div>
        </div>
        <div class="mb-3" style="margin-left: 12vw;">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="breakfast" value="1" <?php echo ($breakfast == '1') ? 'checked ' : '' ?>disabled>
                <label class="form-check-label" for="inlineCheckbox1">Breakfast</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="smoking" value="1" <?php echo ($smoking == '1') ? 'checked' : '' ?> disabled>
                <label class="form-check-label" for="inlineCheckbox2">Smoking</label>
            </div>
        </div>
        <a class='btn btn-secondary mb-3' style='color:white;  margin-left: 17%' role='button' href='Order Summary.php'>Back</a>
        <!-- <a class='btn btn-primary mb-3' style='color:white; width: 20%;' role='button' href='Payment.php?id_transaksi="<?php echo $t_id; ?>"'>Proceed to payment</a> -->
        <?php
        if($status == 0){
        echo "<a class='btn btn-primary mb-3' style='color:white; width: 20%;' role='button' href='Payment.php?id_transaksi=".$t_id."'>Proceed to payment</a>";
        }
        ?>
        </div>


</body>

</html>