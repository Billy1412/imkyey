<!-- Classic Twin -->
<?php
session_start();
require "connect.php";
$tipe = $_GET['room_id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='icon' href='images/logo.png' type='images/logo.png'>

  <title>
  <?php
		require 'connect.php';
		$sql = "SELECT * FROM room WHERE id_room='".$tipe."'";
		$res= mysqli_query($con,$sql);
								
		while($row=mysqli_fetch_array($res)){
			echo "Bellagio Hotel | ",$row['tipe_room'];
		}					
		mysqli_close($con);
		?>
  </title>
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

  <style>
    #gambar {
      margin-top: 20px;
      position: relative;
    }

    #title {
      margin-top: 10px;
      font-family: 'patrick', cursive;
    }

    #gambar img {
      width: 100%;
      height: 425px;
    }

    .p2 {
      font-family: 'patrick', cursive;
    }

    .p3 {
      font-family: PlayfairDisplay, Georgia, Times New Roman, serif;
      color: #333;
    }

    #size {
      /* margin-top: 20px; */
    }

    #features {
      margin-top: 20px;
    }

    #features li {
      list-style-type: disc;
      /* font-size: 14px; */
      margin-left: 10px;
      /* font-family: PlayfairDisplay, Georgia, Times New Roman, serif; */
    }

    body {
      box-sizing: border-box;
      overflow-x: hidden;
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      /* background-color: #F2F2F7; */

    }

    hr {
      border: none;
      height: 1px;
      /* Set the hr color */
      color: #333;
      /* old IE */
      background-color: #333;
      /* Modern Browsers */
    }

    .overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      height: 100%;
      width: 100%;
      opacity: 0;
      transition: .3s ease;
      background-color: rgb(190, 172, 161);
    }

    #gambar:hover .overlay {
      opacity: 1;
    }

    .text {
      color: white;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -70%);
      text-align: center;
      font-family: PlayfairDisplay, Georgia, Times New Roman, serif;
    }

    .text h2 {
      font-family: PlayfairDisplay, Georgia, Times New Roman, serif;
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

    #judulFooter {
      font-family: 'patrick', cursive;
      font-size: 1.5rem;
    }

    .fa-heart {
      background: transparent;
      border: none;
      outline: none;
      color: red;

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
</head>

<body>
  <?php
  include('header.php');
  ?>
    

  <div class="container "style="padding-top: 10px;"> 
    <a href="home.php" style = "color: rgb(143, 124, 112);"><u>Home</u></a> > 
  
  <?php
  if($tipe == 'R001'){
    echo '<a href="" >Classic Twin</a>';
  }
  if($tipe == 'R002'){
    echo '<a href="" >Classic Deluxe</a>';
  }
  if($tipe == 'R003'){
    echo '<a href="" >King Suite</a>';
  }

  if($tipe == 'R004'){
    echo '<a href="" >Rafflesia</a>';
  }

  if($tipe == 'R005'){
    echo '<a href="" >Fuchsia</a>';
  }

  if($tipe == 'R006'){
    echo '<a href="" >Cruss</a>';
  }

  ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mx-auto">

        <div id="gambar">
          <?php
          require 'connect.php';
          $sql = "SELECT * FROM room WHERE id_room='" . $tipe . "'";
          $res = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_array($res)) {
            echo "<img src = '" . $row['image'] . "'>";
          }

          mysqli_close($con);

          ?>
          <!-- size -->
          <div class="overlay">
            <div class="text">
              <?php
              require 'connect.php';
              $sql = "SELECT * FROM room WHERE id_room='" . $tipe . "'";
              $res = mysqli_query($con, $sql);

              while ($row = mysqli_fetch_array($res)) {
                echo "<h2>" . $row['tipe_room'] . "</h2><br>";
              }

              mysqli_close($con);

              ?>
              <?php
              require 'connect.php';
              $sql = "SELECT * FROM room WHERE id_room='" . $tipe . "'";
              $res = mysqli_query($con, $sql);

              while ($row = mysqli_fetch_array($res)) {
                echo $row[4] . " m<sup>2</sup>";
              }

              mysqli_close($con);

              ?>
            </div>
          </div>
        </div>


        <div class="row justify-content-between">
          <div class="col-6">
              <div id="roomType">
              <h5 class="display-6" style="margin-top : 1.5rem;">
                <?php
                require 'connect.php';
                $sql = "SELECT * FROM room WHERE id_room='" . $tipe . "'";
                $res = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($res)) {
                  echo $row[1];
                }

                mysqli_close($con);

                ?>
              </h5>
            </div>
          </div>
          <div class="col-4">
            <div id="price" style="text-align: right;">
              <h3 class="display-6" style=" margin-top: 1rem; font-size:2rem;">
                <?php
                require 'connect.php';
                $sql = "SELECT * FROM room WHERE id_room='" . $tipe . "'";
                $res = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($res)) {
                  echo "Rp" . number_format($row[2], 0, ',', '.') . " / night";
                }

                mysqli_close($con);

                ?>
              </h5>
            </div>
            <div style="text-align: right;">
              <?php
              if (!isset($_SESSION["id"])) {
                // echo "<button type='button' class='btn btn-success disabled' data-bs-toggle='modal' data-bs-target='#exampleModal1' id ='modalButton' style = 'margin-right: 1rem;'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp Book Now</button>";
                // echo "<button type='button' class='btn btn-primary disabled' data-bs-toggle='modal' data-bs-target='#exampleModal2' id ='modalButton' style = 'float : right'><i class='fas fa-heart'></i> Add To Wishlist </button>";
                echo "<button type='button' class='btn btn-dark' style='border-radius: 0px; margin-right: 1rem;' onclick = 'login()'><i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp Book Now</button>";
                echo "<button type='button' class='btn btn-dark' style='border-radius: 0px;' onclick = 'login()'><i class='fas fa-heart'></i> Add To Wishlist</button>";

                // echo '<button type="button" class="btn btn-success"  style = "margin-right: 1rem;" onclick = "login()" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp Book Now</button>';
                // echo "<button type='button' class='btn btn-primary' style = 'float : right' onclick = 'login()'><i class='fas fa-heart'></i> Add To Wishlist </button>";
              }
              if (isset($_SESSION["id"])) {
                echo "<button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal1' id ='modalButton'  style = 'margin-right: 1rem;'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Book Now</button>";
                echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal2' id ='modalButton' style = 'margin-right: 1rem;'> <i class='fas fa-heart'></i>Add To Wishlist </button>";
              }

              ?>
              <script>
                function login() {
                  location.href = "login.php";
                }
              </script>

              <!-- <button class = "btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Book Now</button> -->

              <!-- <button class = "btn btn-primary"><i class="fa fa-list-alt" aria-hidden="true"></i> Add To Wishlist</button> -->
            </div>


          </div>
        </div>
        
        


        <hr>

        <div class="container" >
          <div class="row justify-content-around" style="margin-top: 3rem; margin-bottom: 3rem;">
            <div class="col-6">
              <div id="description">
                  <h3 class="display-6" style="font-size: 2rem;">Description</h3>
                  <h5 class="display-6" style="font-size: 1.25rem; line-height:2;">
                  <?php
                  require 'connect.php';
                  $sql = "SELECT * FROM room WHERE id_room='" . $tipe . "'";
                  $res = mysqli_query($con, $sql);

                  while ($row = mysqli_fetch_array($res)) {
                    echo $row[6];
                  }

                  mysqli_close($con);

                  ?>
                  Bellagio Hotel is a CHSE-certified hotel and has been awarded the SafeGuard Hygiene Excellence and Safety Label by Bureau Veritas.
                </h5>
                </div>
            </div>
            <div class="col-4">
              <div id="size">
                <h5 class="display-6" style="font-size: 2rem;">Room Size</h5>
                <h5 class="display-6" style="font-size: 1.25rem;">

                <?php
                require 'connect.php';
                $sql = "SELECT * FROM room WHERE id_room='" . $tipe . "'";
                $res = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($res)) {
                  echo $row[4] . " m<sup>2</sup>";
                }

                mysqli_close($con);

                ?></h5>

              </div>

              <div id="features">
                <h5 class="display-6" style="font-size: 2rem;">Features</h5>
                <h5 class="display-6" style="font-size: 1.25rem;">
                <?php
                require 'connect.php';
                $sql = "SELECT * FROM features WHERE id_room='" . $tipe . "'";
                $res = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($res)) {
                  echo "<li style = 'margin-top: 5px;'>$row[2]</li>";
                }

                mysqli_close($con);

                ?>
                </h5>
              </div>
            </div>
            <!-- <div class="col-7" style="margin-left : -0.7rem">
              
             

            </div> -->



          </div>
          <hr>


          <!-- Modal Wishlist -->
          <?php
          if ($_GET['room_id'] == 'R001' or $_GET['room_id'] == 'R002' or $_GET['room_id'] == 'R003') {
            echo '<form action = "addWishlist.php" method = "post">
			<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<input type="hidden" name="tipeRoom" value=' . $tipe . '>
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Wishlist Form</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
                    <label class="form-label"><b>Check in</b></label>  
                    <div class="input-group date checkin1" >
                          <input type="text" class="form-control" name = "in2" placeholder = "yyyy-mm-dd">
                          <span class="input-group-append">
                              <span class="input-group-text bg-white d-block">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                      </div>
					  <label class="form-label"><b>Check Out</b></label>  
                    <div class="input-group date checkout1">
                          <input type="text" class="form-control" name = "out2" placeholder = "yyyy-mm-dd">
                          <span class="input-group-append">
                              <span class="input-group-text bg-white d-block">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                    </div> <br>
                    <div class="row justify-content" >
                    <div class="col-4" style = "height: 4rem;"><b>Quantity </b>
                      <div class= "plusminus" >
                        <input type="hidden" name="quantity2" id="quantity2">
                          <br>
                          <span id="minus2" class ="spanplusminus">-</span>
                          <span id="num2" class ="spanplusminus">01</span>
                          <span id="plus2" class ="spanplusminus">+</span>
                          <script>
                            plus2 =  document.getElementById("plus2"),
                            minus2 = document.getElementById("minus2"),
                            num2 = document.getElementById("num2");
                            let b = 1;
                            document.getElementById("quantity2").value = b;
                            //Untuk menambah dan mengurangkan jumlah kamar yang akan dipesan
                            plus2.addEventListener("click", ()=>{
                              b++;
                                if(b <10){
                                  document.getElementById("quantity2").value = b;
                            // window.alert(document.getElementById("quantity").value)
                                  b = "0" + b;
                                  num2.innerText = b;
                                  }
                                else{
                                  document.getElementById("quantity2").value = b;
                                  num2.innerText = b;
                                }
                               
                              });

                            minus2.addEventListener("click", ()=>{
                              if(b > 1){
                                b--;
                                if(b<10){
                                  document.getElementById("quantity2").value = b;
                                  b = "0" + b;
                                  num2.innerText = b;
                                }
                                else{
                                  document.getElementById("quantity2").value = b;
                                  num2.innerText = b;
                                }
                              }
                            
                            });
                            

                          </script>
                           </div>
                           </div>
                           <div class="col-4">
                        </div>
                        </div>
                        <br>
                        
                      
						<div id = "request" >
                  <!-- breakfast and smoking room form -->
                  <label class="form-label"><b>Request</b></label>  
                  
                  <div class="row justify-content-center" >
                    <div class="col-4">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="value3" id="flexCheckDefault" name = "breakfast2">
                      <label class="form-check-label" for="flexCheckDefault">
                        Breakfast
                      </label>
                      </div>
                    </div>
                    <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="value4" id="flexCheckDefault1" name = "smoking2" >
                      <label class="form-check-label" for="flexCheckDefault1">
                        Smoking Room
                      </label>
                      </div>
                    </div>
                  </div>
                  <p style = "margin-top :2%;"> *Breakfast will be charge additional</p>

                  <!-- request -->
                  <div id = "request" style = "margin-top :2%; margin-bottom :2%">
                    <label class="form-label"><b>Extra Request </b></label>  
                    <input type="text" class="form-control" name = "detail2">
                  </div>
                  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary" >Add to Wishlist</button> -->
					<button class="btn btn-primary" name = "addWish"  type="sumbit" >Add to Wishlist</button>
					
				</div>
				</form>
				</div>
			</div>
			</div>
			</div>';
          } else {
            echo '<form action = "addWishlistMeeting.php" method = "post">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="hidden" name="tipeRoom" value=' . $tipe . '>
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Wishlist Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                      <label class="form-label"><b>Meeting Start Date</b></label>  
                      <div class="input-group date checkin1" >
                            <input type="text" class="form-control" name = "in2" placeholder = "yyyy-mm-dd">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div><br>
              <label class="form-label"><b>Meeting End Date</b></label>  
                      <div class="input-group date checkout1">
                            <input type="text" class="form-control" name = "out2" placeholder = "yyyy-mm-dd">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                      </div>      <br>                   
              <div id = "request" >
                    <!-- request -->
                    <div id = "request" style = "margin-top :2%; margin-bottom :2%">
                      <label class="form-label"><b>Extra Request </b></label>  
                      <input type="text" class="form-control" name = "detail2">
                    </div>
                    </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary" >Add to Wishlist</button> -->
            <button class="btn btn-primary" name = "addWish"  type="sumbit" >Add to Wishlist</button>
            
          </div>
          </form>
          </div>
        </div>
        </div>
        </div>';
          }
          ?>


          <?php
          //  Modal Booking
          if ($_GET['room_id'] == 'R001' or $_GET['room_id'] == 'R002' or $_GET['room_id'] == 'R003') {
            echo '<form action = "bookingRoom.php" method = "post">
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                  <input type="hidden" name="tipeRoom" value=' . $tipe . '>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <label class="form-label"><b>Check in</b></label>  
                    <div class="input-group date checkin1">
                          <input type="text" class="form-control" name = "in" placeholder = "yyyy-mm-dd">
                          <span class="input-group-append">
                              <span class="input-group-text bg-white d-block">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                      </div><br>
                    <label class="form-label"><b>Check Out</b></label>  
                    <div class="input-group date checkout1">
                          <input type="text" class="form-control" name = "out" placeholder = "yyyy-mm-dd">
                          <span class="input-group-append">
                              <span class="input-group-text bg-white d-block">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                    </div>
                    <br>
                    <div class="row justify-content" >
                      <div class="col-4"> <b>Quantity </b>
					  <div class= "plusminus" >
                        <input type="hidden" name="quantity" id="quantity1">
                          <br>
                          <span id="minus1" class ="spanplusminus">-</span>
                          <span id="num1" class ="spanplusminus">01</span>
                          <span id="plus1" class ="spanplusminus">+</span>
                          <script>
                            plus1 =  document.getElementById("plus1"),
                            minus1 = document.getElementById("minus1"),
                            num1 = document.getElementById("num1");
                            let a = 1;
                            document.getElementById("quantity1").value = a;
                            //Untuk menambah dan mengurangkan jumlah kamar yang akan dipesan
                            plus1.addEventListener("click", ()=>{

                              a++;
                             
                                if(a <10){
                                  document.getElementById("quantity1").value = a;
                            // window.alert(document.getElementById("quantity").value)
                                  a = "0" + a;
                                  num1.innerText = a;
                                  }
                                else{
                                  document.getElementById("quantity1").value = a;
                                  num1.innerText = a;
                                }
                               
                              });

                            minus1.addEventListener("click", ()=>{
                              if(a > 1){
                                a--;
                                if(a<10){
                                  document.getElementById("quantity1").value = a;
                                  a = "0" + a;
                                  num1.innerText = a;
                                }
                                else{
                                  document.getElementById("quantity1").value = a;
                                  num1.innerText = a;
                                }
                              }
                            
                            });
                            

                          </script>
                        </div>
                      </div>


                    </div>
                    <br>
                  <div id = "request" >
                  <!-- breakfast and smoking room form -->
                  <label class="form-label"><b>Request</b></label>  
                  
                  <div class="row justify-content-center" >
                    <div class="col-4">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="value1" id="flexCheckDefault" name = "breakfast">
                      <label class="form-check-label" for="flexCheckDefault">
                        Breakfast
                      </label>
                      </div>
                    </div>
                    <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="value2" id="flexCheckDefault1" name = "smoking" >
                      <label class="form-check-label" for="flexCheckDefault1">
                        Smoking Room
                      </label>
                      </div>
                    </div>
                  </div>
                  <p style = "margin-top :2%;"> *Breakfast will be charge additional</p>

                  <!-- request -->
                  <div id = "request" style = "margin-top :2%;">
                    <label class="form-label"><b>Extra Request </b></label>  
                    <input type="text" class="form-control" name = "detail">
                  </div>
                  </div>
                  

                  <div class="modal-footer" >
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" name = "book"  type="sumbit" >Book</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>';
          } else {
            echo '<form action = "bookingMeeting.php" method = "post">
          <input type="hidden" name="roomType" value=' . $tipe . '>
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" >
              <div class="modal-content" >
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Form</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label class="form-label"><b>Meeting Start Date</b></label>  
                  <div class="input-group date checkin1">
                        <input type="text" class="form-control" name = "in" placeholder = "yyyy-mm-dd">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div><br>
                  <label class="form-label"><b>Meeting End Date</b></label>  
                  <div class="input-group date checkout1">
                        <input type="text" class="form-control" name = "out" placeholder = "yyyy-mm-dd">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                  </div>
                  <br>

               

                <!-- request -->
                <div id = "request" style = "margin-top :2%;">
                  <label class="form-label"><b>Extra Request </b></label>  
                  <input type="text" class="form-control" name = "detail">
                </div>
                </div>
                

                <div class="modal-footer" >
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-success" name = "book"  type="sumbit" >Book</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>';
          }

          ?>
          <div class="row">
            <div class="col-sm-4 text-center">
              <h1 class="text-warning mt-4 mb-4">
                <b><span id="average_rating">0.0</span> / 5.0</b>
              </h1>
              <div class="mb-3">
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
              </div>
              <h3><span id="total_review">0</span> Review</h3>
            </div>
            <div class="col-sm-4">
              <p>
              <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
              </div>
              </p>
            </div>
            <div class="col-sm-4 text-center">
              <h3 class="mt-4 mb-3">Write Review Here</h3>
              <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
            </div>
          </div>
          <hr>

          <div class="mt-5 container" style="width: 1000px" id="review_content"></div>
        </div>


      </div>
    </div>
  </div>
  <div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Submit Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class="text-center mt-2 mb-4">
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
          </h4>
          <div class="form-group">
            <?php
            if (isset($_SESSION["id"])) {
              require 'connect.php';
              echo '<label>Transaction ID:</label>
									<select class="form-select" aria-label="Default select example" id = "t_id">';
              $sqli = "Select * from transaksi t JOIN detail_transaksi d ON t.id_transaksi = d.id_transaksi WHERE id_member='" . $_SESSION['id'] . "' AND t.id_transaksi NOT IN (SELECT id_transaksi FROM review) AND id_room = '" . $tipe . "' AND in_date < (SELECT SYSDATE());";
              $res = mysqli_query($con, $sqli);
              while ($row = mysqli_fetch_array($res)) {
                echo "<option value='" . $row['id_transaksi'] . "' id = '" . $row['id_transaksi'] . "'>" . $row['id_transaksi'] . "</option>";
              }
              echo "</select>";
              mysqli_close($con);
            }
            ?>
          </div>
          <div class="form-group">
            <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
          </div>
          <div class="form-group text-center mt-4">
            <button type="button" class="btn btn-primary" id="save_review">Submit</button>
          </div>
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
  </div>

</body>

</html>
<script>
  $(document).ready(function() {

    var rating_data = 0;

    $('#add_review').click(function() {
      <?php
      if (!isset($_SESSION["id"])) {
        // echo "alert('Please Login First!!');";
        echo "window.location.href = 'login.php';";
      } else {
        echo "$('#review_modal').modal('show');";
      }
      ?>


    });

    $(document).on('mouseenter', '.submit_star', function() {

      var rating = $(this).data('rating');

      reset_background();

      for (var count = 1; count <= rating; count++) {

        $('#submit_star_' + count).addClass('text-warning');

      }

    });

    function reset_background() {
      for (var count = 1; count <= 5; count++) {

        $('#submit_star_' + count).addClass('star-light');

        $('#submit_star_' + count).removeClass('text-warning');

      }
    }

    $(document).on('mouseleave', '.submit_star', function() {

      reset_background();

      for (var count = 1; count <= rating_data; count++) {

        $('#submit_star_' + count).removeClass('star-light');

        $('#submit_star_' + count).addClass('text-warning');
      }

    });

    $(document).on('click', '.submit_star', function() {

      rating_data = $(this).data('rating');

    });

    $('#save_review').click(function() {

      var t_id = $('#t_id').val();

      var user_review = $('#user_review').val();

      if (!t_id || user_review == '') {
        alert("Please Fill Every Field");
        return false;
      } else {
        $.ajax({
          url: "submit_rating.php",
          method: "POST",
          data: {
            rating_data: rating_data,
            t_id: t_id,
            user_review: user_review
          },
          success: function(data) {
            $('#review_modal').modal('hide');
            $('#t_id').find('option:selected').remove().end();
            load_rating_data();

            alert(data);
          }
        })
      }

    });

    load_rating_data();

    function load_rating_data() {
      var tipe_kamar = '<?php echo $tipe; ?>';
      $.ajax({
        url: "submit_rating.php",
        method: "POST",
        data: {
          action: 'load_data',
          tipe_kamar: tipe_kamar
        },
        dataType: "JSON",
        success: function(data) {
          $('#average_rating').text(data.average_rating);
          $('#total_review').text(data.total_review);

          var count_star = 0;

          $('.main_star').each(function() {
            count_star++;
            if (Math.ceil(data.average_rating) >= count_star) {
              $(this).addClass('text-warning');
              $(this).addClass('star-light');
            }
          });

          $('#total_five_star_review').text(data.five_star_review);

          $('#total_four_star_review').text(data.four_star_review);

          $('#total_three_star_review').text(data.three_star_review);

          $('#total_two_star_review').text(data.two_star_review);

          $('#total_one_star_review').text(data.one_star_review);

          $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

          $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

          $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

          $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

          $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

          if (data.review_data.length > 0) {
            var html = '';

            for (var count = 0; count < data.review_data.length; count++) {
              html += '<div class="row mb-3">';

              html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white" style = "width : 43px; height:43px" ><h3 class="text-center" style = "padding-top:0.3rem;">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

              html += '<div class="col-sm-11">';

              html += '<div class="card">';

              html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

              html += '<div class="card-body">';

              for (var star = 1; star <= 5; star++) {
                var class_name = '';

                if (data.review_data[count].rating >= star) {
                  class_name = 'text-warning';
                } else {
                  class_name = 'star-light';
                }

                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
              }

              html += '<br />';

              html += data.review_data[count].user_review;

              html += '</div>';

              html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

              html += '</div>';

              html += '</div>';

              html += '</div>';
            }

            $('#review_content').html(html);
          }
        }
      })
    }

  });
</script>