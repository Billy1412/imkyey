<?php
session_start();
require "connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jquery-3.6.1.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

  <!-- buat date picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel='icon' href='images/logo.png' type='images/logo.png'>
    <title>Bellagio Hotel | Home</title>
  </head>
<style>
  body {
    box-sizing: border-box;
    overflow-x: hidden;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #f7f8fa;
  }

  #tagline{
      /* font-family: "snell roundhand", cursive; */
      font-family: "Edwardian Script ITC", cursive;
      /* font-style: italic; */
      /* font-family : 'Lucida Sans Typewriter'; */
      /* font-weight : bold; */
      color :  #614e41;
      font-size: 3em;
      line-height: 0.5;
    }

  #judulFooter {
    font-family: 'patrick', cursive;
    font-size: 1.5rem;
  }

  .carousel-inner {
    height: 200%;
  }

  #judulKamar {
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 1.5rem;
    padding-top: 0.2rem;
  }

  #judulFasilitas {
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 1.5rem;
    padding-top: 0.2rem;
  }

  #room::before {
    content: "";
    border-top: 1px solid #404041;
  }

  #coba {
    object-fit: cover;
    transition: 0.1s
  }

  #coba:hover {
    /* cursor : pointer; */
    transform: translateY(-10px);
    transition: all ease 0.3s;
  }

  #coba:active {
    transform: scale(0.8);
  }

  #judulReview {
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 1.5rem;
    padding-top: 0.2rem;
  }

  /* review */
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

  }

  .review-box {
    width: 500px;
    box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
    background-color: white;
    padding: 1rem;
    margin: 1rem;
    cursor: pointer;
    height: auto;
    align-self: normal;
    /* biar besarnya sama */

  }

  .review p {
    font-size: 0.9rem;
    color: rgb(102, 98, 96);
  }

  .review-box:hover {
    transform: translateY(-10px);
    transition: all ease 0.3s;
  }

  /* modal box */
  .plusminus {
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

  .spanplusminus {

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

  .socmed {
    margin-right: 2%;
  }

  .socmed:hover {
    color: white;
  }
  

.carousel-control-prev, .carousel-control-next {
  width: 60px; /* set the width of the button */
  height: 60px; /* set the height of the button */
  border-radius: 50%; /* make the button circular */
  background-color: #000; /* set the background color to white */
  border: none; /* remove the border */
  outline: none; /* remove the outline */
  position: absolute; /* set the position to absolute */
  top: 50%; /* align the top of the button to the middle of the carousel */
  transform: translateY(-50%);
}
.carousel-control-prev {
  left: 1%; /* align the left edge of the button to the left edge of the carousel */
}

.carousel-control-next {
  right: 1%; /* align the right edge of the button to the right edge of the carousel */
}


</style>
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

<body>
  <?php
  include('header.php');
  ?>
  <!-- Carousel -->
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
      <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/hotelnew6.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/lobby3n.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/pool3n.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- end of carousel -->

<div id = "welcome">
<div class="row justify-content-evenly" style="color: #28221e;">
    <div class="col-4" style = "margin-top: 3%;">
    <div id = "judul" style = "font-weight: bold; font-size: 2rem;">
    Stay and Relax at <br>
    Bellagio Hotel <br>
  </div>
  <div id = "isi" style = "margin-top :3%; ">
    <p style="line-height:2;">
    It is our pleasure to welcome you by providing a complete facility and friendly service as you need while in Surabaya.<br>
    You will feel a different atmosphere by feeling like recharging yourself when entering the Bellagio Hotel Surabaya.<br>
    With the new Bellagio Hotel, that’s where you will feel very relaxed by being in the right hotel to stay overnight.
    </p>
    <!-- <br><br>class="fw-semibold" -->
    <p id="tagline" style="margin-left: 10px; margin-top: 30px;">"We make the ordinary,</p>
    <p id="tagline" style="text-align: right; margin-right: 60px">extraordinary"</p>
  
        </div>
      </div>
      <div class="col-4">
        <img src="images/relax3.jpg" style="max-width: 110%; margin-top : 2rem;
  height: auto;">
        <img src="images/team2.jpg" style="max-width: 110%;
  height: auto;">
      </div>
    </div>
  </div>
  </div>

  <!-- ROOM -->
  <div id="kamar" style="margin-top : 3rem;">
    <div id="room">
      <p id="judulKamar" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem; margin-button: 3rem;  margin-top: 3rem;">Our Rooms</p>

      <div class="container">
        <div class="row">
          <!-- <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px; margin : auto;">
          <img src="images/deluxe6n.jpg" class="card-img-top" alt="..."> -->
          <?php
          $sql = "SELECT * FROM room WHERE id_room = 'R001' ";

          // $res=mysqli_query($con,$sql);
          $res1 = mysqli_query($con, $sql);

          if (!empty($res1)) {
            while ($row = mysqli_fetch_array($res1)) {
              $data1 = isset($row['id_room']) ? $row['id_room'] : '';
              // echo("tes");
              // echo $data1;
              $counter = 1;
              echo " <div class='col-lg-4 col-md-6 my-3' onclick='detail1()'>";
              echo " <div class='card border-0 shadow' style='max-width: 350px; margin : auto;'>";
              echo " <img src='" . $row["image"] . "'class='card-img-top' alt='...'>";
              echo "<div class='card-body'>";
              echo "<h5 class='card-title'><b>" . $row["tipe_room"] . "</b></h5>";
              echo " <h6 class = 'mb-4'>Rp".number_format($row["harga"],0,',','.')."/night </h6>";
              echo "<div class = 'features mb-4'>";
              echo "<h6 class = 'mb-1'> Features</h6>";

              // $sql2 = "SELECT * FROM features INNER JOIN room on features.id_room = room.id_room WHERE room.id_room = ".$data1;
              $sql2 = "SELECT * FROM features INNER JOIN room on features.id_room = room.id_room WHERE room.id_room = 'R001'";
              $res2 = mysqli_query($con, $sql2);
              while ($row = mysqli_fetch_array($res2)) {
                echo "<span class = 'badge rounded-pill bg-light text-dark text-wrap'>" . $row["nama"] . "</span>";
              }
            }
            $sql = "SELECT * FROM room WHERE id_room = 'R001' ";

            // $res=mysqli_query($con,$sql);
            $res1 = mysqli_query($con, $sql);

            if (!empty($res1)) {
              while ($row = mysqli_fetch_array($res1)) {

                echo "</div>";
                echo "<p class='card-text'><br>" . $row["detail"] . "</p><br><br>";
                if (!isset($_SESSION["id"])) {
                  echo '<button type="button" class="btn btn-success"  style = "float: right" onclick = "login()" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp Book Now</button>';
                  // echo '<button type="button" class="btn btn-success"  style = "float: right" disabled  onclick= "detail11()"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbspBook Now</button>';
                  echo '<button type="button" class="btn btn-secondary" onclick="detail1()" style = "float: right; margin-right: 1rem;">View Details</button>';
                }
                if (isset($_SESSION["id"])) {
                  echo " <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal1' id ='modalButton' style = 'float: right'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp Book Now</button>";
                  echo '<button type="button" class="btn btn-secondary" onclick="detail1()" style = "float: right; margin-right: 1rem;" >View Details</button>';
                  // echo '<a class="btn btn-secondary" style = "float: right; margin-right: 1rem; href="wishlist.php" role="button">View Details</a>';
                }
                echo "</div>";
              }
            }
          }
          ?>
          <script>
            function detail1() {
              location.href = "rooms.php?room_id=R001";
            }

            function detail2() {
              location.href = "rooms.php?room_id=R002";
            }

            function detail3() {
              location.href = "rooms.php?room_id=R003";
            }

            function login() {
              location.href = "login.php";
            }
          </script>

          <!-- Modal Booking -->
          <form action="booking.php" method="post">
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <label class="form-label"><b>Check in</b></label>
                    <div class="input-group date checkin1">
                      <input type="text" class="form-control" name="in" placeholder="yyyy-mm-dd">
                      <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </span>

                    </div><br>
                    <label class="form-label"><b>Check Out</b></label>
                    <div class="input-group date checkout1">
                      <input type="text" class="form-control" name="out" placeholder="yyyy-mm-dd">
                      <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </span>
                    </div>
                    <br>
                    <div class="row justify-content">
                      <div class="col-4"> <b>Quantity </b>
                        <div class="plusminus">
                          <input type="hidden" name="quantity" id="quantity1">
                          <br>
                          <span id="minus1" class="spanplusminus">-</span>
                          <span id="num1" class="spanplusminus">01</span>
                          <span id="plus1" class="spanplusminus">+</span>
                          <script>
                            plus1 = document.getElementById("plus1"),
                              minus1 = document.getElementById("minus1"),
                              num1 = document.getElementById("num1");
                            let a = 1;
                            document.getElementById("quantity1").value = a;
                            //Untuk menambah dan mengurangkan jumlah kamar yang akan dipesan
                            plus1.addEventListener("click", () => {

                              a++;

                              if (a < 10) {
                                document.getElementById("quantity1").value = a;
                                // window.alert(document.getElementById("quantity").value)
                                a = "0" + a;
                                num1.innerText = a;
                              } else {
                                document.getElementById("quantity1").value = a;
                                num1.innerText = a;
                              }

                            });

                            minus1.addEventListener("click", () => {
                              if (a > 1) {
                                a--;
                                if (a < 10) {
                                  document.getElementById("quantity1").value = a;
                                  a = "0" + a;
                                  num1.innerText = a;
                                } else {
                                  document.getElementById("quantity1").value = a;
                                  num1.innerText = a;
                                }
                              }

                            });
                          </script>
                        </div>
                      </div>

                      <div class="col-4">
                        <label for="roomType"><b>Room Type :</b></label>
                        <select class="form-select" aria-label="Default select example" name="roomType" id="roomType" style="background-color:white;margin-top:3%; width: 120%;">
                          <option value="deluxe">Classic Deluxe</option>
                          <option value="twin">Classic Twin</option>
                          <option value="suite">King Suite</option>

                        </select>
                      </div>
                    </div>
                    <br>
                    <div id="request">
                      <!-- breakfast and smoking room form -->
                      <label class="form-label"><b>Request</b></label>

                      <div class="row justify-content-center">
                        <div class="col-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="value1" id="flexCheckDefault" name="breakfast">
                            <label class="form-check-label" for="flexCheckDefault">
                              Breakfast
                            </label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="value2" id="flexCheckDefault" name="smoking">
                            <label class="form-check-label" for="flexCheckDefault">
                              Smoking Room
                            </label>
                          </div>
                        </div>
                      </div>
                      <p style="margin-top :2%;"> *Breakfast will be charge additional</p>

                      <!-- request -->
                      <div id="request" style="margin-top :2%;">
                        <label class="form-label"><b>Extra Request </b></label>
                        <input type="text" class="form-control" name="detail">
                      </div>
                    </div>


                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-success" name="book" type="sumbit">Book</button>
                    </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>


  <?php
  $sql = "SELECT * FROM room WHERE id_room = 'R002' ";

  // $res=mysqli_query($con,$sql);
  $res1 = mysqli_query($con, $sql);

  if (!empty($res1)) {
    while ($row = mysqli_fetch_array($res1)) {
      $data1 = isset($row['id_room']) ? $row['id_room'] : '';
      // echo("tes");
      // echo $data1;
      $counter = 1;
      echo " <div class='col-lg-4 col-md-6 my-3' onclick='detail2()'>";
      echo " <div class='card border-0 shadow' style='max-width: 350px; margin : auto;'>";
      echo " <img src='" . $row["image"] . "'class='card-img-top' alt='...'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'><b>" . $row["tipe_room"] . "</b></h5>";
      echo " <h6 class = 'mb-4'>Rp".number_format($row["harga"],0,',','.')."/night </h6>";
      echo "<div class = 'features mb-4'>";
      echo "<h6 class = 'mb-1'> Features</h6>";
      // $sql2 = "SELECT * FROM features INNER JOIN room on features.id_room = room.id_room WHERE room.id_room = ".$data1;
      $sql2 = "SELECT * FROM features INNER JOIN room on features.id_room = room.id_room WHERE room.id_room = 'R002'";
      $res2 = mysqli_query($con, $sql2);
      while ($row = mysqli_fetch_array($res2)) {
        echo "<span class = 'badge rounded-pill bg-light text-dark text-wrap'>" . $row["nama"] . "</span>";
      }
    }

    $sql = "SELECT * FROM room WHERE id_room = 'R002' ";

    // $res=mysqli_query($con,$sql);
    $res1 = mysqli_query($con, $sql);

    if (!empty($res1)) {
      while ($row = mysqli_fetch_array($res1)) {

        echo "</div>";
        echo "<p class='card-text'><br>" . $row["detail"] . "</p><br><br>";
        if (!isset($_SESSION["id"])) {
          // echo '<button type="button" class="btn btn-success"  style = "float: right" disabled ><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp Book Now</button>';
          echo '<button type="button" class="btn btn-success"  style = "float: right" onclick = "login()" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp Book Now</button>';
          echo '<button type="button" class="btn btn-secondary" onclick="detail2()" style = "float: right; margin-right: 1rem;">View Details</button>';
        }
        if (isset($_SESSION["id"])) {
          echo " <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal2' id ='modalButton' style = 'float: right'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp Book Now</button>";
          echo '<button type="button" class="btn btn-secondary" onclick="detail2()" style = "float: right; margin-right: 1rem;">View Details</button>';
        }
        echo "</div>";
      }
    }
  }
  ?>
  <!-- Modal Booking -->
  <form action="booking.php" method="post">

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label class="form-label"><b>Check in</b></label>
            <div class="input-group date checkin1">
              <input type="text" class="form-control" name="in" placeholder="yyyy/mm/dd">
              <span class="input-group-append">
                <span class="input-group-text bg-white d-block">
                  <i class="fa fa-calendar"></i>
                </span>
              </span>

            </div><br>
            <label class="form-label"><b>Check Out</b></label>
            <div class="input-group date checkout1">
              <input type="text" class="form-control" name="out" placeholder="yyyy/mm/dd">
              <span class="input-group-append">
                <span class="input-group-text bg-white d-block">
                  <i class="fa fa-calendar"></i>
                </span>
              </span>
            </div>
            <br>
            <div class="row justify-content">
              <div class="col-4"> <b>Quantity </b>
                <div class="plusminus">
                  <input type="hidden" name="quantity" id="quantity2">
                  <br>
                  <span id="minus2" class="spanplusminus">-</span>
                  <span id="num2" class="spanplusminus">01</span>
                  <span id="plus2" class="spanplusminus">+</span>
                  <script>
                    plus2 = document.getElementById("plus2"),
                      minus2 = document.getElementById("minus2"),
                      num2 = document.getElementById("num2");
                    let b = 1;
                    document.getElementById("quantity2").value = b;
                    //Untuk menambah dan mengurangkan jumlah kamar yang akan dipesan
                    plus2.addEventListener("click", () => {
                      b++;
                      if (b < 10) {
                        document.getElementById("quantity2").value = b;
                        // window.alert(document.getElementById("quantity").value)
                        b = "0" + b;
                        num2.innerText = b;
                      } else {
                        document.getElementById("quantity2").value = b;
                        num2.innerText = b;
                      }

                    });

                    minus2.addEventListener("click", () => {
                      if (b > 1) {
                        b--;
                        if (b < 10) {
                          document.getElementById("quantity2").value = b;
                          b = "0" + b;
                          num2.innerText = b;
                        } else {
                          document.getElementById("quantity2").value = b;
                          num2.innerText = b;
                        }
                      }

                    });
                  </script>
                </div>
              </div>

              <div class="col-4">
                <label for="roomType">Room Type :</label>
                <select class="form-select" aria-label="Default select example" name="roomType" id="roomType" style="background-color:white;margin-top:3%; width: 120%;">
                  <option value="deluxe">Classic Deluxe</option>
                  <option value="twin">Classic Twin</option>
                  <option value="suite">King Suite</option>

                </select>
              </div>
            </div>
            <br>

            <div id="request">
              <!-- breakfast and smoking room form -->
              <label class="form-label"><b>Request</b></label>

              <div class="row justify-content-center">
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="value1" id="flexCheckDefault" name="breakfast">
                    <label class="form-check-label" for="flexCheckDefault">
                      Breakfast
                    </label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="value2" id="flexCheckDefault" name="smoking">
                    <label class="form-check-label" for="flexCheckDefault">
                      Smoking Room
                    </label>
                  </div>
                </div>
              </div>
              <p style="margin-top :2%;"> *Breakfast will be charge additional</p>

              <!-- request -->
              <div id="request" style="margin-top :2%;">
                <label class="form-label"><b>Extra Request </b></label>
                <input type="text" class="form-control" name="detail">
              </div>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-success" name="book" type="sumbit">Book</button>
            </div>
  </form>
  </div>

  </div>
  </div>
  </div>
  </div>
  </div>


  <?php
  // $sql= "SELECT * FROM room WHERE id_room = 'R001' OR id_room = 'R002' or id_room = 'R003' ";
  $sql = "SELECT * FROM room WHERE id_room = 'R003' ";

  // $res=mysqli_query($con,$sql);
  $res1 = mysqli_query($con, $sql);

  if (!empty($res1)) {
    while ($row = mysqli_fetch_array($res1)) {
      $data1 = isset($row['id_room']) ? $row['id_room'] : '';
      // echo("tes");
      // echo $data1
      echo " <div class='col-lg-4 col-md-6 my-3' onclick='detail3()'>";
      echo " <div class='card border-0 shadow' style='max-width: 350px; margin : auto;'>";
      echo " <img src='" . $row["image"] . "'class='card-img-top' alt='...'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'><b>" . $row["tipe_room"] . "</b></h5>";
              echo " <h6 class = 'mb-4'>Rp".number_format($row["harga"],0,',','.')."/night </h6>";
      echo "<div class = 'features mb-4'>";
      echo "<h6 class = 'mb-1'> Features</h6>";
      // $sql2 = "SELECT * FROM features INNER JOIN room on features.id_room = room.id_room WHERE room.id_room = ".$data1;
      $sql2 = "SELECT * FROM features INNER JOIN room on features.id_room = room.id_room WHERE room.id_room = 'R003'";
      $res2 = mysqli_query($con, $sql2);
      while ($row = mysqli_fetch_array($res2)) {
        echo "<span class = 'badge rounded-pill bg-light text-dark text-wrap'>" . $row["nama"] . "</span>";
      }
    }
    $sql = "SELECT * FROM room WHERE id_room = 'R003' ";

    // $res=mysqli_query($con,$sql);
    $res1 = mysqli_query($con, $sql);

    if (!empty($res1)) {
      while ($row = mysqli_fetch_array($res1)) {
        echo "</div>";
        echo "<p class='card-text'>" . $row["detail"] . "</p><br>";
        if (!isset($_SESSION["id"])) {
          echo '<button type="button" class="btn btn-success"  style = "float: right" onclick = "login()" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp Book Now</button>';
          // echo '<button type="button" class="btn btn-success"  style = "float: right" disabled ><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp Book Now</button>';
          echo '<button type="button" class="btn btn-secondary" onclick="detail3()" style = "float: right; margin-right: 1rem;">View Details</button>';
        }
        if (isset($_SESSION["id"])) {
          echo " <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal3' id ='modalButton' style = 'float: right'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp Book Now</button>";
          echo '<button type="button" class="btn btn-secondary" onclick="detail3()" style = "float: right; margin-right: 1rem;">View Details</button>';
        }
      }
    }
  }
  ?>
  <!-- Modal Booking -->
  <form action="booking.php" method="post">
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label class="form-label"><b>Check in</b></label>
            <div class="input-group date checkin1">
              <input type="text" class="form-control" name="in" placeholder="yyyy/mm/dd">
              <span class="input-group-append">
                <span class="input-group-text bg-white d-block">
                  <i class="fa fa-calendar"></i>
                </span>
              </span>

            </div><br>
            <label class="form-label"><b>Check Out</b></label>
            <div class="input-group date checkout1">
              <input type="text" class="form-control" name="out" placeholder="yyyy/mm/dd">
              <span class="input-group-append">
                <span class="input-group-text bg-white d-block">
                  <i class="fa fa-calendar"></i>
                </span>
              </span>
            </div>
            <br>
            <div class="row justify-content">
              <div class="col-4"> <b>Quantity </b>
                <div class="plusminus">
                  <input type="hidden" name="quantity" id="quantity3">
                  <br>
                  <span id="minus3" class="spanplusminus">-</span>
                  <span id="num3" class="spanplusminus">01</span>
                  <span id="plus3" class="spanplusminus">+</span>
                  <script>
                    plus3 = document.getElementById("plus3"),
                      minus3 = document.getElementById("minus3"),
                      num3 = document.getElementById("num3");
                    let c = 1;
                    document.getElementById("quantity3").value = c;
                    //Untuk menambah dan mengurangkan jumlah kamar yang akan dipesan
                    plus3.addEventListener("click", () => {

                      c++;
                      if (c < 10) {
                        document.getElementById("quantity3").value = c;
                        // window.alert(document.getElementById("quantity").value)
                        c = "0" + c;
                        num3.innerText = c;
                      } else {
                        document.getElementById("quantity3").value = c;
                        num3.innerText = c;
                      }

                    });

                    minus3.addEventListener("click", () => {
                      if (c > 1) {
                        c--;
                        if (c < 10) {
                          document.getElementById("quantity3").value = c;
                          c = "0" + c;
                          num3.innerText = c;
                        } else {
                          document.getElementById("quantity3").value = c;
                          num3.innerText = c;
                        }
                      }

                    });
                  </script>
                </div>
              </div>

              <div class="col-4">
                <label for="roomType">Room Type :</label>
                <select class="form-select" aria-label="Default select example" name="roomType" id="roomType" style="background-color:white;margin-top:3%; width: 120%;">
                  <option value="deluxe">Classic Deluxe</option>
                  <option value="twin">Classic Twin</option>
                  <option value="suite">King Suite</option>

                </select>
              </div>
            </div>
            <br>
            <div id="request">
              <!-- breakfast and smoking room form -->
              <label class="form-label"><b>Request</b></label>

              <div class="row justify-content-center">
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="value1" id="flexCheckDefault" name="breakfast">
                    <label class="form-check-label" for="flexCheckDefault">
                      Breakfast
                    </label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="value2" id="flexCheckDefault" name="smoking">
                    <label class="form-check-label" for="flexCheckDefault">
                      Smoking Room
                    </label>
                  </div>
                </div>
              </div>
              <p style="margin-top :2%;"> *Breakfast will be charge additional</p>

              <!-- request -->
              <div id="request" style="margin-top :2%;">
                <label class="form-label"><b>Extra Request </b></label>
                <input type="text" class="form-control" name="detail">
              </div>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-success" name="book" type="sumbit">Book</button>
            </div>
  </form>
  </div>
  </div>

  </div>
  </div>
  </div>
  </div>


  </div>
  </div>
  </div>





  <!-- <div class="col-lg-12 text-center">
        <a href = "#" class = "btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> More Details >>> </a>
      </div> -->
  </div>
  </div>

  <!-- Facility -->
  <div id="facility">
    <p id="judulFasilitas" style="background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem; margin-button: 3rem;  margin-top: 3rem;">Facilities</p>
    <div class="container">
      <div class="row justify-content-evenly">
        <!-- <div id = "coba"> -->
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img id="image1" src="svg/wifi.svg" width="50%" onclick="changeImage()">
          <h5 id="wifi" style="margin-top: 1rem">Free Wifi</h5>
          <script>
            function changeImage() {
              let displayImage = document.getElementById('image1');
              var text = document.getElementById("wifi");
              if (displayImage.src.match('svg/wifi.svg')) {
                displayImage.src = 'fasilitas/wifi.jpg'
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/wifi.svg'
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/parking.svg" width="40%" onclick="changeImage2()" id="image2">
          <h5 id="parking" style="margin-top: 0.5rem">Free Parking</h5>
          <script>
            function changeImage2() {
              let displayImage = document.getElementById('image2');
              var text = document.getElementById("parking");
              if (displayImage.src.match('svg/parking.svg')) {
                displayImage.src = 'fasilitas/parking2.jpg'
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/parking.svg'
                displayImage.width = "70";
                text.style.display = "block";
              }
            }
          </script>

        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/swimmingpool.svg" width="50%" onclick="changeImage3()" id="image3">
          <h5 id="pool" style="margin-top: 0.7rem">Swimming Pool</h5>
          <script>
            function changeImage3() {
              let displayImage = document.getElementById('image3');
              var text = document.getElementById("pool");
              if (displayImage.src.match('svg/swimmingpool.svg')) {
                displayImage.src = 'images/pool2.jpg'
                // displayImage.src = 'fasilitas/pool2fasil2.jpg'
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/swimmingpool.svg'
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/gym.svg" width="50%" onclick="changeImage4()" id="image4">
          <h5 id="gym" style="margin-top: 1.3rem">Gym</h5>
          <script>
            function changeImage4() {
              let displayImage = document.getElementById('image4');
              var text = document.getElementById("gym");
              if (displayImage.src.match('svg/gym.svg')) {
                displayImage.src = 'fasilitas/gym.jpg';
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/gym.svg';
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/playground.png" width="50%" onclick="changeImage5()" id="image5">
          <h5 id="playground" style="margin-top: 0.7rem">Playground</h5>
          <script>
            function changeImage5() {
              let displayImage = document.getElementById('image5');
              var text = document.getElementById("playground");
              if (displayImage.src.match('svg/playground.png')) {
                displayImage.src = 'fasilitas/playground1.jpg';
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/playground.png';
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-evenly">
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/laundry2.png" width="55%" onclick="changeImage6()" id="image6">
          <h5 id="laundry">Laundry Service</h5>
          <script>
            function changeImage6() {
              let displayImage = document.getElementById('image6');
              var text = document.getElementById("laundry");
              if (displayImage.src.match('svg/laundry2.png')) {
                displayImage.src = 'fasilitas/laundry.jpg';
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/laundry2.png';
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>

        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/spa.svg" width="50%" onclick="changeImage7()" id="image7">
          <h5 id="spa" style="margin-top: 1rem">Spa</h5>
          <script>
            function changeImage7() {
              let displayImage = document.getElementById('image7');
              var text = document.getElementById("spa");
              if (displayImage.src.match('svg/spa.svg')) {
                displayImage.src = 'fasilitas/spa.jpg';
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/spa.svg';
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/resto.svg" width="50%" onclick="changeImage8()" id="image8">
          <h5 id="restaurant" style="margin-top: 0.6rem">Restaurant</h5>
          <script>
            function changeImage8() {
              let displayImage = document.getElementById('image8');
              var text = document.getElementById("restaurant");
              if (displayImage.src.match('svg/resto.svg')) {
                displayImage.src = 'fasilitas/dining2.jpeg';
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/resto.svg';
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/bar.svg" width="55%" onclick="changeImage9()" id="image9" style="margin-top: 0.5rem">
          <h5 id="bar" style="margin-top: 0.6rem">Bar</h5>
          <script>
            function changeImage9() {
              let displayImage = document.getElementById('image9');
              var text = document.getElementById("bar");
              if (displayImage.src.match('svg/bar.svg')) {
                displayImage.src = 'fasilitas/bar.jpg';
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/bar.svg';
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3" id="coba">
          <img src="svg/airport.svg" width="55%" onclick="changeImage10()" id="image10" style="margin-top: 0.5rem">
          <h5 id="shuttle" style="margin-top: 0.7rem">Airport Shuttle</h5>
          <script>
            function changeImage10() {
              let displayImage = document.getElementById('image10');
              var text = document.getElementById("shuttle");
              if (displayImage.src.match('svg/airport.svg')) {
                displayImage.src = 'fasilitas/shuttle.jpg';
                displayImage.width = "160";
                text.style.display = "none";
              } else {
                displayImage.src = 'svg/airport.svg';
                displayImage.width = "100";
                text.style.display = "block";
              }
            }
          </script>
        </div>
      </div>
    </div>


<!-- Review -->
<div id = "review">
   <p id ="judulReview" style = "background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem; margin-button: 3rem;  margin-top: 3rem;" >Review</p>
   <div class = "review-box-container">
    <?php

      $sql= "SELECT * FROM review INNER JOIN transaksi ON review.id_transaksi = transaksi.id_transaksi INNER JOIN member ON transaksi.id_member = member.id_member ORDER BY review.id_review DESC LIMIT 4";
      $res=mysqli_query($con,$sql);
     if(!empty($res))
     {
      while($row=mysqli_fetch_array($res))
      {
        echo "<div class = 'review-box'>";
        echo "<div class = 'box-top'>";
        echo "<div class = 'profile'>";
        echo "<span><strong>".$row["nama"]."</strong></span>";

        // buat tipe kamar
        $sql1= "SELECT * FROM review INNER JOIN transaksi ON review.id_transaksi = transaksi.id_transaksi INNER JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi INNER JOIN room ON detail_transaksi.id_room = room.id_room WHERE review.id_transaksi=$row[id_transaksi]";
        $res1=mysqli_query($con,$sql1);
        if(!empty($res1))
        {        
          while($row2=mysqli_fetch_array($res1))
        {
          echo "<br><h8> Room Type : ".$row2["tipe_room"]."</h8>";
        }
        
        }
        echo "<br><h8>".$row["tanggal_review"]."</h8>";
        
        echo "<div class = 'star' style = 'margin-bottom : -1rem';> ";
        echo "<ul class = 'list-inline'>";

        $start = 1;
        while($start <=5){
        if($row['user_rating'] < $start){
          echo '<li class = "list-inline-item" style = "color: rgb(237, 207, 11)"><i class="far fa-star"></i></li>';
        }
        else{
          echo '<li class = "list-inline-item" style = "color: rgb(237, 207, 11)"><i class="fas fa-star"></i></li>';
        }
        $start++;
      }
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class = 'review'>";
        echo " <p>".$row["detail"]."</p>";
        echo "</div>";
        echo "</div>";
      }
    }
    ?>
</div>

<br>
<!-- footer -->
        <div><?php include "footer.php";?></div>

      </div>






</body>

</html>