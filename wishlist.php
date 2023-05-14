<?php
session_start();
require "connect.php";
if (!isset($_SESSION["id"])) {
  header("location: login.php");
}

function dateDiffInDays($date1, $date2)
{
  // Untuk hitung perbedaan hari
  $diff = strtotime($date2) - strtotime($date1);

  // 1 day = 24 hours
  // 24 * 60 * 60 = 86400 seconds
  //return jumlah nights
  return abs(round($diff / 86400));
}

if (isset($_POST['buttonWishlist'])) {
  $idWishlist = $_POST['idWishlist'];
  $sql2 = "SELECT * FROM wishlist WHERE id_wishlist='" . $idWishlist . "'";
  $res2 = mysqli_query($con, $sql2);
  while ($row = mysqli_fetch_array($res2)) {
    $tipe = $row['id_room'];
    $inDate = $row['in_date'];
    $outDate = $row['out_date'];
    $breakfast = $row['breakfast'];
    $smoking = $row['smoking'];
    $quantity = $row['quantity'];
  }
  $member = $_SESSION["id"];
  $tanggalTransaksi = date("Y/m/d");
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
  if ($breakfast == 1) {
    $cekBreakfast = 1;
    $hargaBreakfast = 100000;
  } else {
    $cekBreakfast = 0;
  }
  if ($breakfast == 1) {
    $cekSmoking = 1;
  } else {
    $cekSmoking = 0;
  }
  if ($tipe == "R001") {
    $hargaRoom = 500000;
  }
  if ($tipe == "R002") {
    $hargaRoom = 500000;
  }
  if ($tipe == "R003") {
    $hargaRoom = 1100000;
  }
  if ($tipe == "R004") {
    $hargaRoom = 5000000;
  }
  if ($tipe == "R005") {
    $hargaRoom = 8000000;
  }
  if ($tipe == "R006") {
    $hargaRoom = 3500000;
  }

  $amount = $nights * $quantity * $hargaRoom;
  $subTotal = $nights * $quantity * $hargaRoom + $hargaBreakfast * $quantity * $nights;
  $pajak = $subTotal * 10 / 100;
  $total = $subTotal + $pajak;
  $sql1 = "insert into transaksi values(null, '$tanggalTransaksi','$subTotal', '$pajak', '$total', '$status','$member')";
  // $sql1="insert into transaksi values(null, '2023/01/23','5000', '1000', '200', '1','M002')";
  if (mysqli_query($con, $sql1)) {
    $id_transaksi = mysqli_insert_id($con);
    $sql3 = "insert into detail_transaksi values(null, '$inDate','$outDate', $nights, $quantity, $hargaRoom, $amount, '$detail', '$tipe', $id_transaksi, $cekBreakfast,$cekSmoking)";
    $query = mysqli_query($con, $sql3);
    $sql4 = "DELETE FROM wishlist WHERE id_wishlist='" . $idWishlist . "'";
    $query = mysqli_query($con, $sql4);
    header("Location: home.php");
  }
  exit();
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wishlist</title>
  <script src="jquery-3.6.1.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.0/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- buat date picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<style>
  body {
    box-sizing: border-box;
    overflow-x: hidden;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;


  }

  #judulWishlist {
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 1.5rem;
  }

  .box-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
  }

  .review-box-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
    height: 100%;

  }

  .review-box {
    width: 500px;
    box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
    background-color: white;
    padding: 1rem;
    margin: 1rem;
    cursor: pointer;

  }

  .review p {
    font-size: 0.9rem;
    color: rgb(102, 98, 96);
  }

  .review-box:hover {
    transform: translateY(-10px);
    transition: all ease 0.3s;
  }

  .book {
    /* margin-left : 28rem; */
    float: right;
    margin-bottom: 1rem;
  }

  .deleteButton {
    margin-left: 1rem;
    float: right;
    margin-bottom: 1rem;
  }

  /* modal box */
  #plusminus {
    margin-top: 3%;
    height: 60%;
    width: 60%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #0D33EE;
    color: white;
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);

  }

  #spanplusminus {

    width: 35%;
    text-align: center;
    font-size: 110%;
    cursor: pointer;
    user-select: none;
  }

  a:link {
    text-decoration: none;
    color: black;
  }


  a:visited {
    text-decoration: none;
    color: black;
  }


  a:hover {
    text-decoration: none;
    color: black;
  }


  a:active {
    text-decoration: none;
    color: black;
  }

  .fa-heart {
    background: transparent;
    border: none;
    outline: none;
    color: red;
    margin-left: 1rem;
    float: right;
    margin-bottom: 1rem;
    font: 20%;
  }

  .fa-heart:hover {
    color: rgb(238, 125, 125);
  }

  .foto {
    /* height:15rem; */
    height: 100%;
  }

  .socmed {
    margin-right: 2%;
  }

  .socmed:hover {
    color: white;
  }

  #judulFooter {
    font-family: 'patrick', cursive;
    font-size: 1.5rem;
  }
</style>
<script>
  //buat date picker booking form check in
  $(function() {
    $('#checkin1').datepicker({
      format: "yyyy/mm/dd",
      language: "fr",
      changeMonth: true,
      changeYear: true
    });
  });

  //buat date picker booking form check out
  $(function() {
    $('#checkout1').datepicker({
      format: "yyyy/mm/dd",
      language: "fr",
      changeMonth: true,
      changeYear: true
    });
  });
</script>

<body>
  <?php include('header.php') ?>
  <a href="home.php" style = "margin-left : 5rem; color : rgb(143, 124, 112)" ><u>Home</u></a>
	<span> <i class="fas fa-arrow-right"></i></span>
	<a href="" >Wishlist</a>
  <div id="wishlist">
    <p id="judulWishlist" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem;  margin-top: 1rem; padding-top: 0.2rem;">Wishlist</p>
    <div class="review-box-container">
      <?php
      $sql = "SELECT * FROM wishlist INNER JOIN room on wishlist.id_room = room.id_room WHERE wishlist.id_member = '{$_SESSION['id']}' ORDER BY wishlist.in_date DESC";
      $res = mysqli_query($con, $sql);
      if (!empty($res)) {
        while ($row = mysqli_fetch_array($res)) {
          if (strtotime($row["in_date"]) < strtotime(date("Y/m/d"))) {
            // echo "<div class='card mb-3' style='width:60vw; height : 100%; opacity: 0.6; '>";
            echo "<div class='card mb-3' style='width:80vw; height : 100%; opacity: 0.6;'>";
            echo " <div class='row g-0'>";
            echo "<div class='col-md-4'>";
            echo "<img src='" . $row['image'] . "'class='img-fluid rounded-start foto'>";
            echo "</div>";
            echo "<div class='col-md-8'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row["tipe_room"] . "</h5>";
            echo "<div class = 'review' style = 'margin-top:2rem; margin-right :-2rem'>";
            echo "  <div class='row justify-content-start'>
            <div class='col-4'>
            <p class='card-text'> Check In &nbsp=  " . $row["in_date"] . "</p>
            </div>
            <div class='col-4'>
            <p class='card-text'> Check Out &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp= " . $row["out_date"] . "</p>
            </div>
          </div>";
            echo "  <div class='row justify-content-start'>
            <div class='col-4'>";
            if ($row["breakfast"] == 1) {
              echo "<p class='card-text'> Breakfast = Yes </p> </div>";
            }
            if ($row["breakfast"] == 0) {
              echo "<p class='card-text'> Breakfast = No </p> </div>";
            }
            echo "  <div class='col-4'>";
            if ($row["smoking"] == 1) {
              echo " <p class='card-text'> Smoking Room = Yes </p> </div>";
            }
            if ($row["smoking"] == 0) {
              echo "<p class='card-text'> Smoking Room = No </p> </div>";
            }
            echo "</div>";
            echo "<p class='card-text'> Quantity &nbsp= &nbsp" . $row['quantity'] . "</p> ";
            echo "<a href='deleteWishlist.php?id=" . $row['id_wishlist'] . "'><i class='fas fa-heart fa-2x' style = 'margin-right:2rem;'></i></a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          } else {
            // echo "<div class='card mb-3' style='width:60vw; height : 100%; '>";
            echo "<div class='card mb-3' style='width:80vw; height : 100%;'>";
            echo " <div class='row g-0'>";
            echo "<div class='col-md-4'>";
            echo "<img src='" . $row['image'] . "'class='img-fluid rounded-start foto'>";
            echo "</div>";
            echo "<div class='col-md-8'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row["tipe_room"] . "</h5>";
            echo "<div class = 'review' style = 'margin-top:1rem; margin-right :-2rem' >";
            echo "  <div class='row justify-content-start'>
            <div class='col-4'>
            <p class='card-text'> Check In &nbsp= " . $row["in_date"] . "</p>
            </div>
            <div class='col-4'>
            <p class='card-text'> Check Out &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp= " . $row["out_date"] . "</p>
            </div>
          </div>";
            echo "  <div class='row justify-content-start'>
            <div class='col-4'>";
            if ($row["breakfast"] == 1) {
              echo "<p class='card-text'> Breakfast = Yes </p> </div>";
            }
            if ($row["breakfast"] == 0) {
              echo "<p class='card-text'> Breakfast = No </p> </div>";
            }
            echo "  <div class='col-4'>";
            if ($row["smoking"] == 1) {
              echo " <p class='card-text'> Smoking Room = Yes </p> </div>";
            }
            if ($row["smoking"] == 0) {
              echo "<p class='card-text'> Smoking Room = No </p> </div>";
            }

            echo "</div>";
            echo "<p class='card-text'> Quantity &nbsp= &nbsp" . $row['quantity'] . "</p> ";
            echo "<a href='deleteWishlist.php?id=" . $row['id_wishlist'] . "'><i class='fas fa-heart fa-2x' style = 'margin-right:2rem;'></i></a>";
            echo "<button type='button' class='btn btn-success book' ide='$row[0]' name = 'book' > <i class='fa fa-shopping-cart' aria-hidden='true'></i> &nbspBook Now</button>";

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        }
      }

      ?>
    </div>
    <!-- footer -->
    <div id="footer" style="background-color:rgb(190, 172, 161); padding: 2rem;">
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


      <script>
        $(".book").click(function() {
          var yes = confirm("Are you sure?");
          console.log(yes);
          if (yes) {
            var v_id = $(this).attr('ide');
            // alert(v_id);
            $.ajax({
              url: "wishlist.php",
              type: "POST",
              async: true,
              data: {
                buttonWishlist: 1,
                idWishlist: v_id
              },
              success: function(result) {
                alert("Booking Success");
              }
            });
          }
        });
      </script>



</body>

</html>